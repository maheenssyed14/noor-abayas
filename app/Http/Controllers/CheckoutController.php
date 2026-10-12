<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $cart = $request->session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $products = Product::whereIn('id', array_keys($cart))
            ->get()
            ->keyBy('id');

        $items = [];
        $total = 0;

        foreach ($cart as $id => $details) {
            $product = $products->get($id);

            if (!$product) {
                continue;
            }

            $quantity = (int) ($details['quantity'] ?? 1);
            $subtotal = (float) $product->price * $quantity;

            $items[] = [
                'name' => $product->name,
                'price' => (float) $product->price,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
            ];

            $total += $subtotal;
        }

        if (empty($items)) {
            return redirect()->route('cart.index')
                ->with('error', 'No available products were found.');
        }

        return view('checkout', compact('items', 'total'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:2000'],
            'city' => ['required', 'string', 'max:255'],
            'payment_method' => ['required', 'in:cod'],
        ]);

        $cart = $request->session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $order = DB::transaction(function () use ($cart, $validated) {
            $orderItems = [];
            $subtotal = 0;

            foreach ($cart as $id => $details) {
                $product = Product::whereKey($id)
                    ->lockForUpdate()
                    ->first();

                if (!$product) {
                    throw ValidationException::withMessages([
                        'cart' => 'A product in your cart is no longer available.',
                    ]);
                }

                $quantity = (int) ($details['quantity'] ?? 1);

                if ($quantity < 1 || $quantity > $product->stock) {
                    throw ValidationException::withMessages([
                        'cart' => 'Insufficient stock for ' . $product->name . '. Please update your cart.',
                    ]);
                }

                $price = (float) $product->price;
                $itemSubtotal = $price * $quantity;
                $subtotal += $itemSubtotal;

                $orderItems[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $itemSubtotal,
                ];
            }

            $deliveryCharges = 0;

            $order = Order::create([
                'order_number' => 'NOOR-' . Str::upper(Str::random(10)),
                'customer_name' => $validated['customer_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'payment_method' => $validated['payment_method'],
                'status' => 'pending',
                'subtotal' => $subtotal,
                'delivery_charges' => $deliveryCharges,
                'total' => $subtotal + $deliveryCharges,
            ]);

            foreach ($orderItems as $item) {
                $order->items()->create([
                    'product_id' => $item['product']->id,
                    'product_name' => $item['product']->name,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal'],
                ]);

                $item['product']->decrement('stock', $item['quantity']);
            }

            return $order;
        });

        $request->session()->forget('cart');

        return redirect()->route('checkout.success', $order->id);
    }

    public function success(Order $order): View
    {
        return view('checkout-success', compact('order'));
    }
}

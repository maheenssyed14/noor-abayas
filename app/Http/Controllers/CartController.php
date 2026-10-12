<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $cart = $request->session()->get('cart', []);
        $productIds = array_keys($cart);

        $products = Product::whereIn('id', $productIds)
            ->get()
            ->keyBy('id');

        $items = [];
        $total = 0;

        foreach ($cart as $id => $details) {
            $product = $products->get($id);

            // Skip products that have been deleted.
            if (!$product) {
                continue;
            }

            $quantity = (int) ($details['quantity'] ?? 1);
            $subtotal = (float) $product->price * $quantity;

            $items[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float) $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
                'stock' => (int) $product->stock,
                'subtotal' => $subtotal,
            ];

            $total += $subtotal;
        }

        return view('cart', [
            'cart' => $items,
            'total' => $total,
        ]);
    }

    public function add(Request $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        $cart = $request->session()->get('cart', []);
        $currentQuantity = (int) ($cart[$id]['quantity'] ?? 0);

        if ($product->stock < 1) {
            return redirect()->back()
                ->with('error', 'Sorry, this product is out of stock.');
        }

        if ($currentQuantity >= $product->stock) {
            return redirect()->back()
                ->with('error', 'You cannot add more than the available stock.');
        }

        $cart[$id] = [
            'quantity' => $currentQuantity + 1,
        ];

        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Product added to your cart!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $cart = $request->session()->get('cart', []);

        if (!isset($cart[$id])) {
            return redirect()->route('cart.index')
                ->with('error', 'This product is not in your cart.');
        }

        $product = Product::findOrFail($id);
        $quantity = (int) $request->input('quantity');

        if ($quantity > $product->stock) {
            return redirect()->route('cart.index')
                ->with('error', 'Only ' . $product->stock . ' item(s) are currently in stock.');
        }

        $cart[$id] = ['quantity' => $quantity];

        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Cart quantity updated!');
    }

    public function remove(Request $request, int $id): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);

        unset($cart[$id]);

        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Product removed from your cart.');
    }
}

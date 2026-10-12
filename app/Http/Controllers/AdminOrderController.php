<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('items')
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }
    
public function updateStatus(\Illuminate\Http\Request $request, Order $order)
{
    $validated = $request->validate([
        'status' => [
            'required',
            'in:pending,confirmed,processing,shipped,delivered,cancelled',
        ],
    ]);

    $order->update([
        'status' => $validated['status'],
    ]);

    return redirect()
        ->route('admin.orders.index')
        ->with('success', 'Order status updated successfully.');
}

public function show(Order $order): View
{
    $order->load('items');

    return view('admin.orders.show', compact('order'));
}

}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $totalProducts = Product::count();

        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'pending')->count();

        $totalSales = Order::whereIn('status', [
            'confirmed',
            'processing',
            'shipped',
            'delivered',
        ])->sum('total');

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'pendingOrders',
            'totalSales'
        ));
    }
}

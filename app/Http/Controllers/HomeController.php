<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::all();

        return view('home', compact('products'));
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);

        return view('product', [
            'product' => $product,
            'id' => $id,
        ]);
    }
}

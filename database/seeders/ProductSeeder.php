<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Classic Black Abaya',
                'description' => 'Elegant black abaya for everyday wear.',
                'price' => 3500,
                'image' => null,
                'category' => 'Classic',
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Elegant Beige Abaya',
                'description' => 'A minimal beige abaya for a refined look.',
                'price' => 4200,
                'image' => null,
                'category' => 'Elegant',
                'stock' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium Open Abaya',
                'description' => 'A versatile open abaya with a premium feel.',
                'price' => 5000,
                'image' => null,
                'category' => 'Premium',
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

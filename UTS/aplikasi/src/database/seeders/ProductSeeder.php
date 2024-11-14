<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Nike Air Max 90',
            'description' => 'Nike Air Max 90 is a popular sneaker model.',
            'price' => 1500000,
            'stock' => 100,
            'category' => 'Sneakers',
            'brand' => 'Nike',
            'image_url' => 'nike-air-max-90.jpg',
        ]);

        Product::create([
            'name' => 'Adidas Ultra Boost',
            'description' => 'Adidas Ultra Boost is known for its comfort and style.',
            'price' => 1800000,
            'stock' => 120,
            'category' => 'Running Shoes',
            'brand' => 'Adidas',
            'image_url' => 'adidas-ultra-boost.jpg',
        ]);
    }
}

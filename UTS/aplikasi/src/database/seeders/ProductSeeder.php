<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Sneakers Adidas UltraBoost',
            'description' => 'Comfortable running shoes from Adidas',
            'price' => 150.00,
            'stock' => 20,
            'category' => 'Sneakers',
            'brand' => 'Adidas',
            'image_url' => 'url-to-image',
        ]);
    }
}

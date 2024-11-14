<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil order dan produk yang sudah ada
        $order = Order::first(); // Pastikan order sudah ada
        $product = Product::first(); // Pastikan produk sudah ada

        // Membuat order_item
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 2,
            'price' => $product->price,
        ]);
    }
}

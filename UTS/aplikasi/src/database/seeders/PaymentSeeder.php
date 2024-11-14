<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Order;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil order yang sudah ada
        $order = Order::first(); // Pastikan ada setidaknya satu order di tabel

        // Membuat payment untuk order yang ada
        Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total_amount,
            'method' => 'credit_card', // contoh metode pembayaran
            'status' => 'completed', // contoh status pembayaran
            'payment_date' => now(),
        ]);
    }
}

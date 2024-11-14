<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user yang sudah ada
        $user = User::first(); // Pastikan user sudah ada

        // Membuat order
        Order::create([
            'user_id' => $user->id,
            'total_amount' => 500.00,
            'status' => 'pending',
            'order_date' => Carbon::now(),
        ]);
    }
}

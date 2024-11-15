<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Customer;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil customer berdasarkan email atau ID yang pasti ada
        $customer1 = Customer::where('email', 'john.doe@example.com')->first();
        $customer2 = Customer::where('email', 'jane.doe@example.com')->first();

        // Pastikan customer ditemukan sebelum membuat transaksi
        if ($customer1) {
            Transaction::create([
                'customer_id' => $customer1->id,
                'date' => '2024-11-15',
                'amount' => 1500.00,
                'description' => 'Payment for service.',
            ]);
        }

        if ($customer2) {
            Transaction::create([
                'customer_id' => $customer2->id,
                'date' => '2024-11-16',
                'amount' => 200.00,
                'description' => 'Payment for product.',
            ]);
        }
    }
}

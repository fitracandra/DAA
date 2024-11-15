<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Transaction;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan customer pertama ada
        $customer1 = Customer::firstOrCreate(
            ['email' => 'john.doe@example.com'], // Pastikan email unik
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'phone_number' => '1234567890',
                'status' => 'active'
            ]
        );

        // Pastikan customer kedua ada
        $customer2 = Customer::firstOrCreate(
            ['email' => 'jane.doe@example.com'], // Pastikan email unik
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'phone_number' => '9876543210',
                'status' => 'active'
            ]
        );

        // Buat transaksi untuk customer pertama
        Transaction::create([
            'customer_id' => $customer1->id, // Menggunakan id customer yang sudah ada
            'date' => '2024-11-15',
            'amount' => 1500.00,
            'description' => 'Payment for service.',
        ]);

        // Buat transaksi untuk customer kedua
        Transaction::create([
            'customer_id' => $customer2->id, // Menggunakan id customer yang sudah ada
            'date' => '2024-11-16',
            'amount' => 200.00,
            'description' => 'Payment for product.',
        ]);
    }
}

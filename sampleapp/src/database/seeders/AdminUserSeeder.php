<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@admin.com'], // Mencari berdasarkan email
            [
                'name' => 'Admin',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // Gantilah dengan password yang diinginkan
            ]
        );
    }
}

<?php

namespace Database\Seeders; // Pastikan menggunakan namespace ini

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::firstOrCreate(['name' => 'siswa']);
        Role::firstOrCreate(['name' => 'guru']);
        Role::firstOrCreate(['name' => 'administrator']);
    }
}

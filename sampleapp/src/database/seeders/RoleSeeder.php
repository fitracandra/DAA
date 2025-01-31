<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends seeder
{
    public function run()
    {
        Role::firstOrCreate(['name' => 'siswa']);
        Role::firstOrCreate(['name' => 'guru']);
        Role::firstOrCreate(['name' => 'administrator']);
        Role::firstOrCreate(['name' => 'super_admin']);
    }
}


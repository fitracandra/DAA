<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat role-role yang diperlukan
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $siswaRole = Role::firstOrCreate(['name' => 'siswa']);
        $guruRole = Role::firstOrCreate(['name' => 'guru']);
        $administratorRole = Role::firstOrCreate(['name' => 'administrator']);

        // Membuat beberapa permissions jika diperlukan
        // Anda bisa menambahkan permission sesuai kebutuhan
        // $permission = Permission::firstOrCreate(['name' => 'view dashboard']);

        // Membuat user admin dan memberikan role 'super_admin'
        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'], // Mencari berdasarkan email
            [
                'name' => 'Admin',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // Gantilah dengan password yang diinginkan
            ]
        );
        
        // Memberikan role super_admin kepada user admin
        $user->assignRole('super_admin');

        // Membuat user siswa dan memberikan role 'siswa'
        $siswaUser = User::firstOrCreate(
            ['email' => 'siswa@siswa.com'],
            [
                'name' => 'Siswa User',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]
        );
        $siswaUser->assignRole('siswa');

        // Membuat user guru dan memberikan role 'guru'
        $guruUser = User::firstOrCreate(
            ['email' => 'guru@guru.com'],
            [
                'name' => 'Guru User',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]
        );
        $guruUser->assignRole('guru');

        // Membuat user administrator dan memberikan role 'administrator'
        $adminUser = User::firstOrCreate(
            ['email' => 'administrator@admin.com'],
            [
                'name' => 'Administrator User',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]
        );
        $adminUser->assignRole('administrator');
    }
}

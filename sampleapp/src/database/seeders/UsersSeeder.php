<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['username' => 'siswa1', 'password' => bcrypt('password'), 'role' => 'siswa'],
            ['username' => 'guru1', 'password' => bcrypt('password'), 'role' => 'guru'],
            ['username' => 'admin1', 'password' => bcrypt('password'), 'role' => 'administrator'],
        ]);
    }
}

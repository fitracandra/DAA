<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menambahkan middleware untuk memastikan hanya super_admin yang bisa mengakses
    public function __construct()
    {
        $this->middleware('role:super_admin'); // Ganti dengan role yang sesuai
    }

    // Menampilkan halaman dashboard admin
    public function index()
    {
        return view('admin.dashboard'); // Ganti dengan nama view yang sesuai
    }

    // Misalnya, menampilkan data pengguna yang terdaftar
    public function showUsers()
    {
        $users = \App\Models\User::all(); // Ambil semua data pengguna
        return view('admin.users', compact('users')); // Kirim data ke view
    }

    // Menambahkan metode lain untuk halaman admin jika diperlukan
}

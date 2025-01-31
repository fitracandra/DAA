<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        $roles = Role::all(); // Mengambil semua role
        return view('user.create', compact('roles'));
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|exists:roles,name', // Validasi role
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Menetapkan role yang dipilih
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dibuat!');
    }

    // Menampilkan form untuk mengedit pengguna
    public function edit(User $user)
    {
        $roles = Role::all(); // Mengambil semua role
        return view('user.edit', compact('user', 'roles'));
    }

    // Memperbarui pengguna
    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        // Memperbarui pengguna
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        // Menetapkan role yang baru
        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui!');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        $user = User::all();
        return view('user.index', ['user' => $user]);
    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('user.create');
    }



    public function store (Request $request)
    {
        //Validasi Input
        $ValidateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'usertype' => 'required|in:user,admin',
        ]);

        //Buat user baru
        $user = User::create([
            'name' => $ValidateDataData['name'],
            'email' => $ValidateDataData['email'],
            'password' => Hash::make($validatedData['password']),
            'usertype' => $ValidateDataData['usertype'],
        ]);

        // Tampilkan pesan sukses atau redirect ke halaman lain
        return redirect()->route('user.index')->with('success', 'User berhasil dibuat!');

    }

    // Menampilkan form edit user
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    // Memperbarui data user
    public function update(Request $request, User $user)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'usertype' => 'required|in:user,admin',
        ]);

        // Update data user
        $user->update($validatedData);
        
        // Tampilkan pesan sukses atau redirect ke halaman lain
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    // Menghapus user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        $data = User::all();
        return view('user.dataUser', compact('data'));
    }

    // Menampilkan form tambah user
    public function createUser()
    {
        return view('user.createUser');
    }

    // Memasukkan data ke dalam database
    public function insertUser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);
        return redirect('user')->with('success','User Berhasil Ditambahkan');
    }

    public function showUser($id){
        $data = User::find($id);
        return view('user.editUser', compact('data'));
    }

    public function updateUser(Request $request, $id)
    {
        $data = User::find($id);
        $data->update($request->all());
        return redirect('user')->with('success','User Berhasil Diupdate');
    }

    public function deleteUser(Request $request, $id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('user');
    }

    // public function store (Request $request)
    // {
    //     //Validasi Input
    //     $ValidateData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8',
    //         'usertype' => 'required|in:user,admin',
    //     ]);

    //     //Buat user baru
    //     $user = User::create([
    //         'name' => $ValidateDataData['name'],
    //         'email' => $ValidateDataData['email'],
    //         'password' => Hash::make($validatedData['password']),
    //         'usertype' => $ValidateDataData['usertype'],
    //     ]);

    //     // Tampilkan pesan sukses atau redirect ke halaman lain
    //     return redirect()->route('user.index')->with('success', 'User berhasil dibuat!');

    // }

    // // Menampilkan form edit user
    // public function edit(User $user)
    // {
    //     return view('user.edit', ['user' => $user]);
    // }

    // // Memperbarui data user
    // public function update(Request $request, User $user)
    // {
    //     // Validasi input
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'password' => 'nullable|string|min:8',
    //         'usertype' => 'required|in:user,admin',
    //     ]);

    //     // Update data user
    //     $user->update($validatedData);
        
    //     // Tampilkan pesan sukses atau redirect ke halaman lain
    //     return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    // }

    // // Menghapus user
    // public function destroy(User $user)
    // {
    //     $user->delete();
    //     return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    // }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pengadaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    public function index(){
        $data = Pengadaan::all();
        $users = User::all(); // Mengambil data user
        // Mengirimkan data barang ke view

        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;
            
            if ($usertype == 'user') {
                return view('pengadaan.dataUser', compact('data','users'));
            } elseif ($usertype == 'admin') {
                return view('pengadaan.data', compact('data','users'));
            } else {
                return redirect()->back();
            }
        } else {
            // Redirect somewhere else if user is not logged in
        }
    }

    public function tambahRequest()
    {
        $data = Pengadaan::all();
        $users = User::all();

        // var_dump($barangs);
      

        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;
            
            if ($usertype == 'user') {
                return view('pengadaan.tambahUser', compact('data', 'users'));
            } elseif ($usertype == 'admin') {
                return view('pengadaan.tambah', compact('data', 'users'));
            } else {
                return redirect()->back();
            }
        } else {
            // Redirect somewhere else if user is not logged in
        }
    }

    public function insertRequest(Request $request)
    {       
            // Ambil ID pengguna yang saat ini masuk
            $userId = auth()->id();

            // Buat array data yang akan disimpan
            $data = [
                'user_id' => $userId,
                'deskripsi' => $request->deskripsi,
                'merk' => $request->merk,
                'jumlah' => $request->jumlah,
                'barang' => $request->barang,

            ];
            
            // Simpan data ke dalam database
            Pengadaan::create($data);

            if (Auth::check()) {
                $usertype = Auth()->user()->usertype;
                
                if ($usertype == 'user') {
                    return redirect()->route('pengadaan.data_user')->with('success', 'Permintaan Pengadaan berhasil disimpan');
                } elseif ($usertype == 'admin') {
                    return redirect()->route('pengadaan.data')->with('success', 'Permintaan Pengadaan berhasil disimpan');
                } else {
                    return redirect()->back();
                }
            } else {
                // Redirect somewhere else if user is not logged in
            }
    }

    public function delete($id) {
        $data = Pengadaan::find($id);
        
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    
        $data->delete();
    
        return redirect()->route('pengadaan.data')->with('success', 'Data berhasil dihapus');
    }
    
    public function showRequest($id){
        $data = Pengadaan::find($id);
        return view('pengadaan.edit', compact('data'));
    }

    public function updateRequest(Request $request, $id)
    {
        $data = Pengadaan::find($id);
        if (!$data) {
            return redirect()->route('pengadaan.data')->with('error', 'Data tidak ditemukan');
        }
    
        $data->update($request->all());
        return redirect()->route('pengadaan.data')->with('success', 'Data Berhasil Diupdate');
    }

}

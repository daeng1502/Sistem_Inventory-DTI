<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;

class MaintenanceController extends Controller
{
    public function index(){
        $data = Maintenance::all();
        // $data = Maintenance::orderBy('created_at', 'asc');
        $barangs = Barang::all(); // Mengambil data barang
        $users = User::all(); // Mengambil data user
        // Mengirimkan data barang ke view

        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;
            
            if ($usertype == 'user') {
                return view('maintenance.data_user', compact('data','barangs','users'));
            } elseif ($usertype == 'admin') {
                return view('maintenance.data', compact('data','barangs','users'));
            } else {
                return redirect()->back();
            }
        } else {
            // Redirect somewhere else if user is not logged in
        }
    }

    public function tambahRequest()
    {
        $barangs = Barang::all();
        $users = User::all();

        // var_dump($barangs);
      

        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;
            
            if ($usertype == 'user') {
                return view('maintenance.tambah_user', compact('barangs', 'users'));
            } elseif ($usertype == 'admin') {
                return view('maintenance.tambah', compact('barangs', 'users'));
            } else {
                return redirect()->back();
            }
        } else {
            // Redirect somewhere else if user is not logged in
        }
    }

  
    public function insertRequest(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'id_barang' => 'required', // Pastikan ID barang dipilih
            'kondisi' => 'required',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Ambil data barang berdasarkan ID barang yang dipilih
        $barang = Barang::find($request->id_barang);

        // Pastikan barang ditemukan
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        // Buat entri baru dalam database menggunakan data yang sudah disiapkan
       
            // Ambil ID pengguna yang saat ini masuk
            $userId = auth()->id();

            // Buat array data yang akan disimpan
            $data = [
                'id_barang' => $request->id_barang,
                'kondisi' => $request->kondisi,
                'user_id' => $userId,
            ];

            // Simpan data ke dalam database
            Maintenance::create($data);

            // Redirect dengan pesan sukses jika berhasil disimpan
           
            
            if (Auth::check()) {
                $usertype = Auth()->user()->usertype;
                
                if ($usertype == 'user') {
                    return redirect()->route('maintenance.data_user')->with('success', 'Permintaan pemeliharaan berhasil disimpan');
                } elseif ($usertype == 'admin') {
                    return redirect()->route('maintenance.data')->with('success', 'Permintaan pemeliharaan berhasil disimpan');
                } else {
                    return redirect()->back();
                }
            } else {
                // Redirect somewhere else if user is not logged in
            }
    }

    public function delete($id){
        $data = Maintenance::find($id);
        $data->delete();
        return redirect()->route('maintenance.data')->with('success', 'Data Berhasil Dihapus');
    }

    public function showRequest($id_barang){
        $data = Maintenance::find($id_barang);
        return view('maintenance.edit', compact('data'));
    }

    public function updateRequest(Request $request, $id)
    {
        $data = Maintenance::find($id);
        if (!$data) {
            return redirect()->route('maintenance.data')->with('error', 'Data tidak ditemukan');
        }
    
        $data->update($request->all());
        return redirect()->route('maintenance.data')->with('success', 'Data Berhasil Diupdate');
    }

    public function dataMaintenance(Request $request)
    {
        $data = Maintenance::all();
        $barangs = Barang::all();
        $users = User::all();

        return view('laporan.dataMaintenance', compact('data','barangs','users'));
    }

    public function exportMaintenance(Request $request)
    {
        $data = Maintenance::all();
        $barangs = Barang::all();
        $users = User::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('laporan.dataMaintenance-pdf');
        return $pdf->download('dataMaintenance.pdf');

    }

}

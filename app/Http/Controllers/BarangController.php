<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{

    // public function index(Request $request) {
    //     $query = Barang::orderBy('created_at', 'asc'); // Urutkan data berdasarkan tanggal pembuatan
    
    //     if ($request->has('search')) {
    //         $searchTerm = $request->search;
    //         $data = $query->where('nama', 'LIKE', '%' . $searchTerm . '%')
    //                       ->orWhere('SN', 'LIKE', '%' . $searchTerm . '%')
    //                       ->orWhere('tgl_kontrak', 'LIKE', '%' . $searchTerm . '%')
    //                       ->orWhere('merk', 'LIKE', '%' . $searchTerm . '%')
    //                       ->orWhere('tahun_perolehan', 'LIKE', '%' . $searchTerm . '%')
    //                       ->orWhere('lokasi', 'LIKE', '%' . $searchTerm . '%')
    //                       ->paginate(5);
    //     } else {
    //         $data = $query->paginate(5);
    //     }
    
    //     return view('dataBarang')->with('data', $data);
    //     // return view('dataBarangUser')->with('data', $data);

    // }


    public function index(Request $request) {
        $query = Barang::orderBy('created_at', 'asc'); // Urutkan data berdasarkan tanggal pembuatan
    
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $data = $query->where('nama', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('SN', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('tgl_kontrak', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('merk', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('tahun_perolehan', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('lokasi', 'LIKE', '%' . $searchTerm . '%')
                          ->paginate(5);
        } else {
            $data = $query->paginate(5);
        }
    
        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;
            
            if ($usertype == 'user') {
                return view('dataBarangUser')->with('data', $data);
            } elseif ($usertype == 'admin') {
                return view('dataBarang')->with('data', $data);
            } else {
                return redirect()->back();
            }
        } else {
            // Redirect somewhere else if user is not logged in
        }
    }
    
    
    public function tambahBarang(){
        return view('tambahBarang');
    }

        public function store(Request $request)
    {
        $number = mt_rand(1000000000, 9999999999);

        if($this->barcodeExists($number)){
            $number = mt_rand(1000000000, 9999999999);
        }

        $request['barangcode'] = $number;
        $data = Barang::create($request->all());

        if($request->hasfile('foto')){
            $request->file('foto')->move('fotoBarang/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect('/ManajemenItem');
    }


    public function barcodeExists($number){
        return Barang::wherebarangcode($number)->exists();
    }
    
    public function insertBarang(Request $request){
        
        // dd($request->all());
        $data = Barang::create($request->all());
        if($request->hasfile('foto')){
            $request->file('foto')->move('fotoBarang/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('barang')->with('success','Data Berhasil di Tambah');
    }

    public function tampilBarang($SN){
        $data = Barang::find($SN);
        // dd($data);
        return view("tampilBarang", compact('data'));
    }

    public function updateBarang(Request $request, $SN){
        $data = Barang::find($SN);
        $data->update($request->all());

        return redirect()->route('barang')->with('success','Data Berhasil di Update');
    }

    public function hapusBarang($SN){
        $data = Barang::find($SN);
        $data->delete();

        return redirect()->route('barang')->with('success','Data Berhasil di Hapus');
    }

    public function detailBarang($SN){
        // $data = Barang::find($SN)->first();
        $data = DB::table('barangs')->where('SN', $SN)->get();
        return view('detailBarang',['data' => $data]);
    }
}

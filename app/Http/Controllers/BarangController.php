<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index(Request $request){
    
    // Menggunakan orderBy() untuk mengurutkan data berdasarkan created_at secara descending
    // $query = Barang::orderBy('created_at', 'desc');
    $query = Barang::orderBy('created_at', 'asc');
    
        if($request->has('search')){
            $data = Barang::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
            $data = Barang::where('SN','LIKE','%' .$request->search.'%')->paginate(5);
            $data = Barang::where('tgl_kontrak','LIKE','%' .$request->search.'%')->paginate(5);
            $data = Barang::where('merk','LIKE','%' .$request->search.'%')->paginate(5);
            $data = Barang::where('tahun_perolehan','LIKE','%' .$request->search.'%')->paginate(5);
            $data = Barang::where('lokasi','LIKE','%' .$request->search.'%')->paginate(5);
        }
        else{
            // Eksekusi query dan gunakan paginate() untuk membatasi hasil menjadi 5 data per halaman
            $data = $query->paginate(5);
            // $data = Barang::paginate(5);
        }
        // dd($data);
        // return view('dataBarang',compact('data'));
        return view('dataBarang',['data' => $data]);
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

    
}

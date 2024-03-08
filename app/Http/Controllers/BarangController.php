<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class BarangController extends Controller
{

    public function index(Request $request) {
        $query = Barang::orderBy('created_at', 'asc'); // Urutkan data berdasarkan tanggal pembuatan
    
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $data = $query->where('nama', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('SN', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('tgl_kontrak', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('merk', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('tahun_perolehan', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('harga', 'LIKE', '%' . $searchTerm . '%')
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
          // Validasi input
          $request->validate([
            'SN' => 'required|unique:barangs,SN',
            'nama' => 'required', // Aturan validasi untuk nama tidak boleh kosong
            'merk' => 'required',
            'spesifikasi' => 'required',
            'jumlah_barang' => 'required',
            'no_kontrak' => 'required',
            'tgl_kontrak' => 'required',
            'nama_kontrak' => 'required',
            'harga' => 'required',
            'tahun_perolehan' => 'required',
            'foto' => 'required'
        ],
        [
            'SN.unique' => 'Nomor Serial sudah ada.', // Menyesuaikan pesan kesalahan untuk aturan validasi unik
            'SN.required' => 'Nomor Serial wajib diisi.',
            'nama.required' => 'Nama wajib diisi.', // Pesan kesalahan untuk atribut nama
            'merk.required' => 'Merk wajib diisi.',
            'spesifikasi.required' => 'Spesifikasi wajib diisi.',
            'jumlah_barang.required' => 'Jumlah barang wajib diisi.',
            'no_kontrak.required' => 'No Kontrak wajib diisi.',
            'tgl_kontrak.required' => 'Tanggal Kontrak wajib diisi.',
            'nama_kontrak.required' => 'Nama Kontrak wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'tahun_perolehan.required' => 'Tahun wajib diisi.',
            'foto.required' => 'Foto wajib diisi.',
        ]); 

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
        // Validasi input
        $request->validate([
            'SN' => 'required|unique:barangs,SN',
            'nama' => 'required', // Aturan validasi untuk nama tidak boleh kosong
            'merk' => 'required',
            'spesifikasi' => 'required',
            'jumlah_barang' => 'required',
            'no_kontrak' => 'required',
            'tgl_kontrak' => 'required',
            'nama_kontrak' => 'required',
            'harga' => 'required',
            'tahun_perolehan' => 'required',
            'foto' => 'required'
        ],
        [
            'SN.unique' => 'Nomor Serial sudah ada.', // Menyesuaikan pesan kesalahan untuk aturan validasi unik
            'SN.required' => 'Nomor Serial wajib diisi.',
            'nama.required' => 'Nama wajib diisi.', // Pesan kesalahan untuk atribut nama
            'merk.required' => 'Merk wajib diisi.',
            'spesifikasi.required' => 'Spesifikasi wajib diisi.',
            'jumlah_barang.required' => 'Jumlah barang wajib diisi.',
            'no_kontrak.required' => 'No Kontrak wajib diisi.',
            'tgl_kontrak.required' => 'Tanggal Kontrak wajib diisi.',
            'nama_kontrak.required' => 'Nama Kontrak wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'tahun_perolehan.required' => 'Tahun wajib diisi.',
            'foto.required' => 'Foto wajib diisi.',
        ]); 
        
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

    public function scanner(){
        return view('barangQRScanner');
    }

    public function scan(Request $request){
        // Cari data barang berdasarkan barangcode yang diberikan
        $data = Barang::where('barangcode', $request->barangcode)->first();
    
        // Jika data barang ditemukan, tampilkan detail barang
        if($data){
            return view('detailBarangScan', ['data' => $data]);
        }
        
        // Jika data barang tidak ditemukan, kembalikan ke halaman scanner dengan pesan kesalahan
        return redirect('/barangQRScanner')->with('gagal', 'Data tidak ditemukan');
    }

    public function combo_barang() {
 
        $data = Barang::get();

        return response()->json($data);
   }

    
    
}

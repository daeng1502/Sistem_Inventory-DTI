<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){

        $data = Barang::all();
        // dd($data);
        // return view('dataBarang',compact('data'));
        return view('dataBarang',['data' => $data]);
    }

    public function tambahBarang(){
        return view('tambahBarang');
    }

    public function insertBarang(Request $request){
        // dd($request->all());
        Barang::create($request->all());
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

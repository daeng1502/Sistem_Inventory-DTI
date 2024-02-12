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
        return redirect()->route('barang')->with('success','Data berhasil ditambahkan');
    }
}

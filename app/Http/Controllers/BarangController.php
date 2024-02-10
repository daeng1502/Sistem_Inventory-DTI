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
}

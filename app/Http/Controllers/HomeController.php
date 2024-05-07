<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $barang = DB::table('barangs')->count();
        $user = DB::table('users')->count();
        $maintenance = DB::table('maintenances')->count();
        $pengadaan = DB::table('pengadaans')->count();
        $lokasi = DB::table('lokasi')->count();
        $distribusi = DB::table('distribusi')->count();

        if(Auth::id())
        {
            $usertype =Auth()->user()->usertype;

            if($usertype=='user')
            {
                return view('userdashboard', compact('barang','user','maintenance','pengadaan','lokasi','distribusi'));
            }

            else if($usertype=='admin')
            {
                return view('dashboard', compact('barang','user','maintenance','pengadaan','lokasi','distribusi'));
            }
            else
            {
                return redirect()->back();
            }
        }

      
   
    }

    public function post()
    {
        return view("post");
    }
}

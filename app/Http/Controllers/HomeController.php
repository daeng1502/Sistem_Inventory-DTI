<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype =Auth()->user()->usertype;

            if($usertype=='user')
            {
                return view('userdashboard');
            }

            else if($usertype=='admin')
            {
                return view('dashboard');
            }
            else
            {
                return redirect()->back();
            }
        }

        // return view('dashboard');

    }

    public function post()
    {
        return view("post");
    }
}

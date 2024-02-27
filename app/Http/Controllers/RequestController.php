<?php

namespace App\Http\Controllers;
// use App\Models\Request;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function requestMaintenance(){
        $data = Request::all();
        return view('requestMaintenance',['data'=>$data]);
    }

}

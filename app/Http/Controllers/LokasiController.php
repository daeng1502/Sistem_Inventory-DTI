<?php

namespace App\Http\Controllers;

// use DB;
use App\Helpers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Lokasi;
use Illuminate\Support\Facades\DB;
use App\Models\SistemApp;
use Illuminate\Http\Request;


class LokasiController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('lokasi.index');
    }
    public function add()
    {

        return view('lokasi.add');
    }

    public function combo_pegawai() {
 
        $data = User::get();

        return response()->json($data);
   }
    public function combo_lokasi() {
 
        $data = Lokasi::get();

        return response()->json($data);
   }

   public function save(Request $r){

    $transaction = DB::connection('mysql')->transaction(function() use($r){

        $tmp = new Lokasi();

        $tmp->lokasi_nama   = $r->lokasi;
        $tmp->lokasi_gedung = $r->gedung;
        $tmp->lokasi_ruang  = $r->ruangan;
        $tmp->lokasi_lantai = $r->lantai;

        $tmp->save();

        return true;

    });

    return response()->json($transaction);  

}
    public function update(Request $r){

        $transaction = DB::connection('mysql')->transaction(function() use($r){

            $tmp = Lokasi::where('lokasi_id',$r->id)->first();
    
            $tmp->lokasi_nama   = $r->lokasi;
            $tmp->lokasi_gedung = $r->gedung;
            $tmp->lokasi_ruang  = $r->ruangan;
            $tmp->lokasi_lantai = $r->lantai;
    
            $tmp->save();
    
            return true;
    
        });
  
          return response()->json($transaction);   
    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = DB::connection('mysql')
                            ->table('lokasi AS aa')
                            ->where('lokasi_aktif','Y')
                            ->get();

            $data = $data->map(function($value) {

                $value->edit = route('lokasi.edit', $value->lokasi_id); 

                
                return $value;
           
            });

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();  
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);

    }

    
    public function edit($id)
    {   
        $data = Lokasi::where('lokasi_id',$id)->first();
        return view('lokasi.edit',compact('data','id'));

    }

    public function edit_view($id)
    {   
        $data = Lokasi::where('lokasi_id',$id)->first();

        return response()->json($data);

    }
    public function nonaktif(Request $r){
       
        $transaction = DB::connection('mysql')->transaction(function() use($r){  

            $id = $r->get('id');
            $tmp = Lokasi::where('lokasi_id',$id)->first();

            $tmp->lokasi_aktif = 'T';
            $tmp->save();

            return true;
        });

        return response()->json($transaction);

    }


}

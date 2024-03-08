<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use DB;
use App\Helpers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Lokasi;

use App\Models\SistemApp;
use Illuminate\Http\Request;


class DistribusiController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('distribusi.index');
    }
    public function add()
    {

        return view('distribusi.add');
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

        $tmp = new Distribusi();

        $file = $r->file;
        $filename = time()."_".$file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
    
        $location ='distribusi';

        $file->move($location,$filename);

        $tmp->barang_id       = $r->barang;
        $tmp->user_id         = $r->pegawai;
        $tmp->lokasi_id       = $r->lokasi;
        $tmp->dist_tgl        = date('Y-m-d', strtotime($r->tanggal));
        $tmp->dist_keterangan = $r->keterangan;
        $tmp->dist_surat      = $filename;

        $tmp->save();

        return true;

    });

    return response()->json($transaction);  

}
    public function update(Request $r){

        $transaction = DB::connection('mysql')->transaction(function() use($r){
  
            $id = $r->get('id');

             if($r->file == "undefined"){
     
                 $transaction = DB::connection('mysql')->transaction(function() use($r,$id){
                       
                     $tmp = Distribusi::where('dist_id',$id)->first();
                     
                     $tmp->barang_id       = $r->barang;
                     $tmp->user_id         = $r->pegawai;
                     $tmp->lokasi_id       = $r->lokasi;
                     $tmp->dist_tgl        = date('Y-m-d', strtotime($r->tanggal));
                     $tmp->dist_keterangan = $r->keterangan;
         
                     $tmp->save();
     
                     return true;
     
                  });
     
             } else {
     
                 $transaction = DB::connection('mysql')->transaction(function() use($r,$id){
     
                     $tmp = Distribusi::where('dist_id',$id)->first();
     
                     $file = $r->file;
                     $filename = time()."_".$file->getClientOriginalName();
                     $extension = $file->getClientOriginalExtension();
                 
                     $location ='distribusi';
             
                     $file->move($location,$filename);
     
                     $tmp->barang_id       = $r->barang;
                     $tmp->user_id         = $r->pegawai;
                     $tmp->lokasi_id       = $r->lokasi;
                     $tmp->dist_tgl        = date('Y-m-d', strtotime($r->tanggal));
                     $tmp->dist_keterangan = $r->keterangan;
                     $tmp->dist_surat      = $filename;
             
                     $tmp->save();
     
                     return true;
     
     
                 });
     
             }

            return true;

          });
  
          return response()->json($transaction);   
    }

    public function view(Request $r){

        $result = array('success'=>false);

        try{
            
            $data = DB::connection('mysql')
                            ->table('distribusi AS aa')
                            ->leftjoin('barangs AS bb','bb.SN','=','aa.barang_id')
                            ->leftjoin('users AS cc','cc.id','=','aa.user_id')
                            ->leftjoin('lokasi AS dd','dd.lokasi_id','=','aa.lokasi_id')
                            ->where('dist_aktif','Y')
                            ->get();

            $data = $data->map(function($value) {

                $value->edit = route('distribusi.edit', $value->dist_id); 

                
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
        $data = Distribusi::where('dist_id',$id)->first();
        return view('distribusi.edit',compact('data','id'));

    }

    public function edit_view($id)
    {   
        $data = Distribusi::where('dist_id',$id)->first();

        return response()->json($data);

    }
    public function nonaktif(Request $r){
       
        $transaction = DB::connection('mysql')->transaction(function() use($r){  

            $id = $r->get('id');
            $tmp = Distribusi::where('dist_id',$id)->first();

            $tmp->dist_aktif = 'T';
            $tmp->save();

            return true;
        });

        return response()->json($transaction);

    }


}

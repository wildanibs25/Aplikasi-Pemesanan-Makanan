<?php

namespace App\Http\Controllers;

use App\Models\menuModel;
use App\Models\transModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this -> menu = new menuModel();
        $this -> middleware ('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        // $data =[
        //     'menu' => $this -> menu -> allData()
        // ];
        $nama = menuModel::select('nama_menu')->get();

        // $arr = array("");
        // foreach($nama as $k){
        //     array_push($k->nama_menu);
        // }
        // $kirim = json_encode($nama);

        return view('admin.home',compact([
            'nama'
        ]));
    }

    public function pendapatan(){
        $data=[
            'pendapatan'=> DB::table('trans AS t')
                        ->where('t.status','Selesai') 
                        ->select('u.name AS name','t.no_nota AS no_nota','t.created_at AS created_at','t.jumlah_total As jumlah_total')
                        ->join('users AS u','t.user_id','u.id')
                        ->orderByDesc('t.updated_at')
                        ->get(),
        ];
        return view('admin.pendapatan',$data);
    }
}

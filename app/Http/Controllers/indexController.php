<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\itemModel;
use App\Models\menuModel;
use App\Models\alamatModel;
use App\Models\transModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function __construct()
    {
        $this -> tb_menu = new menuModel();
        $this -> item = new itemModel();
        $this -> trans = new transModel();
        
    }
    
    public function index()
    {
        $data=[
            'tb_menu' => $this -> tb_menu -> allData(),
            'diskon' => $this -> tb_menu -> diskon(1)
        ];

        // $menu =  $this -> tb_menu -> allData();
        $populer = DB::select("SELECT id_menu, SUM(qty) AS qty FROM `item_trans` GROUP BY id_menu ORDER BY qty DESC LIMIT 3");

        //popoulate id_menu to array
        $populerArray = [];
        // $newMenuWithPopouler = [];
        foreach($populer as $pp){
            array_push($populerArray, $pp->id_menu);
        }
        $data['populer_menu'] = $populerArray;
    //    dd($data);
        return view('index.index', $data);
    }

    public function add()
    {
        $data = [
            'daftar' => $this -> item -> allData(),
            'alamat' => alamatModel::where('user_id', Auth::id())->get(),
            'diskon' => $this -> tb_menu -> diskon(1),
        ];

        return view('index.checkout', $data);
    }

    public function showProduct($id_menu)
    {
        $data=[
            'show' => $this -> tb_menu -> getData($id_menu),
            'tb_menu' => $this -> tb_menu -> allData(),
            'diskon' => $this -> tb_menu -> diskon(1),
        ];

        

        return view('index.single', $data);
    }

    public function history()
    {
        $data = [
            'history' => transModel::where('user_id', Auth::id())
            ->join('users', 'trans.user_id', 'users.id')
            ->orderByDesc('no_nota')
            ->get()
        ];

        return view('index.history', $data);
    
    }
    
}

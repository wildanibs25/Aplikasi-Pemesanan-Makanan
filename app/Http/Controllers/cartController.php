<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\itemModel;
use App\Models\menuModel;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function __construct()
    {
        $this -> itemModel = new itemModel();
        $this -> menuModel = new menuModel();
    }

    public function index()
    {
        $data =[
            'item' => $this -> itemModel -> allData(),
            'diskon' => $this -> menuModel -> diskon(1),
        ];

       return view('index.cart', $data);
    }
    // public function index2()
    // {
    //     $data =[
    //         'item' => $this -> itemModel -> allData(),
    //     ];

    //    return view('index.qty', $data);
    // }

    public function hitung()
    {
        $where = ['user_id' => Auth::id(), 'no_nota' => 'Belum Ada'];
        $jumlah = itemModel::where($where)->count();
        return response(['pesan'=>$jumlah]);
    }
}

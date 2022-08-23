<?php

namespace App\Http\Controllers;

use App\Models\ratingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ratingController extends Controller
{
    public function __construct()
    {
        $this -> middleware ('auth');
    }

    public function index()
    {
        $data=[
            'ulasan' => ratingModel::join('users', 'rating.id_user', 'users.id')->get(),
        ];

        return view('admin.ulasan.index', $data);
    }

    public function detail($id_rating)
    {
        $data=[
            'ulasan' => ratingModel::where('id_rating', $id_rating)->join('users', 'rating.id_user', 'users.id')->first(),
        ];

        $status= [
            'status' => 'Sudah Dibaca',
        ];
        $where = ['id_rating' => $id_rating];

        ratingModel::where($where)->update($status);
        return view('admin.ulasan.detail_ulasan', $data);
    }

    public function addRating()
    {
        Request() -> validate([
            'id_menu' => 'required',
            'rating' => 'required',
            'ulasan' => 'required',
        ]);

        $where = ['id_user' => Auth::id(), 'id_menu' => Request()->id_menu];
        $cek = ratingModel::where($where)->first();

        if($cek){
            $data = [
                'rating' => Request()->rating,
                'ulasan' => Request()->ulasan,
            ];
            ratingModel::where($where)->update($data);
        }else{
            ratingModel::insert([
                'id_user' => Auth::id(),
                'id_menu' => Request()->id_menu,
                'rating' => Request()->rating,
                'ulasan' => Request()->ulasan,
            ]);
        }
           
        return Redirect::back()->with('alert', 'Ulasan Terkirim');;
    }

    public function hitungRating()
    {
        $jumlah = ratingModel::where('status', 'Belum Dibaca')->count();
        return response(['pesan'=>$jumlah],200);
    } 
}

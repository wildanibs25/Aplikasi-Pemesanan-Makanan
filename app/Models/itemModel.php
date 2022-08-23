<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\DB;

class itemModel extends Model
{
    protected $table = 'item_trans';
    // public function trans() {
    //     return $this->belongsTo('App\Models\transModel');
    // }
    
    public function allData()
    {
        $where = ['user_id' => Auth::id(), 'no_nota' => 'Belum Ada'];
        return DB::table('item_trans')
        ->join('tb_menu', 'item_trans.id_menu', '=', 'tb_menu.id_menu')
        //    ->join('users', 'item_trans.user_id', '=', 'users.id')
        //    ->join('trans', 'users.id', '=', 'trans.user_id')
        ->orderByDesc('id_item')
        ->where($where)
        ->get();
    }

    public function getData($no_nota)
    {
        return DB::table('item_trans')
        ->join('tb_menu', 'item_trans.id_menu', '=', 'tb_menu.id_menu')
        // ->join('trans', 'item_trans.no_nota', '=', 'trans.no_nota')
        ->where('no_nota', $no_nota)
        ->get();
    }

    // public function toCart($cd)
    // {
    //     return DB::table('item_trans')
    //     ->where('no_nota',"=",'Belum Ada', 'AND', 'user_id','=',Auth::id(), 'AND', 'id_menu', $cd)
    //     ->first();
    // }


    public function insertData($data)
    {
        return DB::table('item_trans')->insert($data);
    }

    public function updateData($id_item, $data)
    {
        return DB::table('item_trans')->where('id_item', $id_item)->update($data);
    }

    public function updateDataCart($id_menu, $data)
    {
        return DB::table('item_trans')->where('id_menu', $id_menu)->update($data);
    }

    public function deleteData($id_item)
    {
        return DB::table('item_trans')->where('id_item', $id_item)->delete();
    }

}

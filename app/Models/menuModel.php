<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class menuModel extends Model
{
    protected $table = 'tb_menu';

    public function allData()
    {
       return DB::table('tb_menu')->get();
    }

    // public function showStatusData()
    // {
    //    return DB::table('statusmenu')->join('tb_menu', 'statusmenu.id_menu', '=', 'tb_menu.id_menu')->get();
    // }

    public function getData($id_menu)
    {
        return DB::table('tb_menu')->where('id_menu', $id_menu)->first();
    }

    public function insertData($data)
    {
        return DB::table('tb_menu')->insert($data);
    }

    public function updateData($id_menu, $data)
    {
        return DB::table('tb_menu')->where('id_menu', $id_menu)->update($data);
    }

    public function deleteData($id_menu)
    {
        return DB::table('tb_menu')->where('id_menu', $id_menu)->delete();
    }

    public function diskon($id)
    {
       return DB::table('diskon')->where('id', $id)->first();
    }

    public function updateDiskon($id, $data)
    {
        return DB::table('diskon')->where('id', $id)->update($data);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class transModel extends Model
{
    protected $table = 'trans';

    public function allData()
    {
       return DB::table('trans')
       ->join('users', 'trans.user_id', '=', 'users.id')
       ->orderByDesc('no_nota')
       ->get();
    }

    public function invoiceData($no_nota)
    {
       return DB::table('trans')
       ->join('users', 'trans.user_id','=', 'users.id')
       ->where('no_nota', $no_nota)
       ->first();
    }

    public function getData($no_nota)
    {
        return DB::table('trans')->where('no_nota', $no_nota)->first();
    }
    public function insertData($data)
    {
        return DB::table('trans')->insert($data);
    }

    public function updateData($no_nota, $data)
    {
        return DB::table('trans')->where('no_nota', $no_nota)->update($data);
    }

    public function deleteData($no_nota)
    {
        return DB::table('trans')->where('no_nota', $no_nota)->delete();
    }
}

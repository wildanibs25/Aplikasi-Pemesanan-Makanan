<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class alamatModel extends Model
{
   protected $table = 'alamat';

   public function getData($user_id)
   {
      return DB::table('alamat')->where('user_id', $user_id)->get();
   }

   public function insertData($data)
   {
      return DB::table('alamat')->insert($data);
   }

   public function deleteData($id_alamat)
    {
        return DB::table('alamat')->where('id_alamat', $id_alamat)->delete();
    }
}  

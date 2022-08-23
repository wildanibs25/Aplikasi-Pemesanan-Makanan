<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class mailModel extends Model
{
    protected $table = 'contact';
    public function allData(){
       return DB::table('contact')
       ->orderBy('status')
       ->get();

    }

    public function insertData($data){
        return DB::table('contact')->insert($data);
    }

    public function getData($id){
        return DB::table('contact')->where('id', $id)->first();
    }

    public function updateData($id, $status)
    {
        return DB::table('contact')->where('id', $id)->update($status);
    }
}

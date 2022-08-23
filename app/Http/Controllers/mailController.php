<?php

namespace App\Http\Controllers;

use App\Models\mailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class mailController extends Controller
{
    public function __construct()
    {
        $this -> mail = new mailModel();
    }

    public function index()
    {
        $data = [
            'mail' => $this -> mail -> allData(),
        ];

        return view('admin.pesan.index',$data);
    }

    public function insert()
    {

        $id = request()->getContent();
        $cd = json_decode($id);

        // Request() -> validate([
        //     'nama' => 'required',
        //     'subject' => 'required',
        //     'email' => 'required',
        //     'pesan' => 'required',
        // ]);

        $data = [
            'nama' => $cd->nama,
            'subject' => $cd->subject,
            'email' => $cd->email,
            'pesan' => $cd->pesan,
        ];

        $this -> mail -> insertData($data);
        // return redirect('/');
        return response(["pesan"=> 'Berhasil ditambahkan'],200);
    }

    public function detail($id)
    {
        $data = [
            'mail' => $this -> mail -> getData($id),
        ];

        $status= [
            'status' => 'Sudah Dibaca',
        ];

        $this -> mail -> updateData($id, $status);
        return view('admin.pesan.detail_pesan',$data);
    }

    public function hitungPesan()
    {
        $jumlah = mailModel::where('status', 'Belum Dibaca')->count();
        return response(['pesan'=>$jumlah],200);
    }

}

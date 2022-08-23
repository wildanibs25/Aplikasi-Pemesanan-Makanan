<?php

namespace App\Http\Controllers;

use App\Models\alamatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class alamatController extends Controller
{
    public function __construct()
    {
        $this->alamatModel = new alamatModel();
    }

    public function index($user_id)
    {
        $data = [
            'alamat' => $this -> alamatModel -> getData($user_id),
        ];

        return view('index.alamat', $data);
    }

    public function insert(){
        
        Request() -> validate([
            'nama_lengkap' => 'required',
            'wa' => 'required',
            'alamat_lengkap' => 'required',
            'patokan' => 'required',
        ]);

        $data = [
            'nama_lengkap' => Request()->nama_lengkap,
            'wa' => Request()->wa,
            'alamat_lengkap' => Request()->alamat_lengkap,
            'patokan' => Request()->patokan,
            'user_id' => Auth::id(),
        ];

        $this -> alamatModel -> insertData($data);
        // return redirect('/alamat/'.Auth::id());
        return Redirect::back();
    }

    public function delete($id_alamat)
    {
        $this -> alamatModel -> deleteData($id_alamat);
        return redirect('/alamat/'.Auth::id());
    }
}

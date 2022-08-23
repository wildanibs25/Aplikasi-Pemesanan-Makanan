<?php

namespace App\Http\Controllers;

use App\Models\itemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\alamatModel;
use App\Models\menuModel;
use App\Models\transModel;

class invoiceController extends Controller
{
    public function __construct()
    {
        $this -> middleware ('auth');
        $this -> trans = new transModel();
        $this -> item = new itemModel();
        $this -> menu = new menuModel();
    }

    public function index()
    {
        Request() -> validate([
            'id_alamat' => 'required',
            'jumlah_total' => 'required',
        ]);

        $id_user = Auth::id();
        $now = now()->format("YmdHis");
        $no_nota = 'INV-'.$now.'-'.$id_user;

        $where = array('user_id' => $id_user, 'no_nota' => 'Belum Ada');
        $data = [
            'no_nota' => $no_nota
        ];
        
        $update = itemModel::where($where)->update($data);

        if($update){
            transModel::insert([
                'no_nota' => $no_nota,
                'id_alamat' => Request()->id_alamat,
                'status' => 'Memesan',
                'jumlah_total' => Request()->jumlah_total,
                'user_id' => $id_user,
            ]);
            return redirect('invoice='.$no_nota);
        }else{
            
            return response('Gagal', 401);
        }
    }

    public function invoiceIndex($no_nota)
    {
        $data=[
            'invoice' => $this -> trans -> invoiceData($no_nota),
            'invoiceItem' => $this -> item -> getData($no_nota),
            'diskon' => $this -> menu -> diskon(1),
            // 'status' =>transModel::where('no_nota', $no_nota)->first()->status,
        ];
        
        return view('index.invoice', $data);
    }

    public function status($no_nota)
    {
        $where = ['user_id' => Auth::id(), 'no_nota' => $no_nota];
        $status = transModel::where($where)->first()->status;
        return response(['pesan'=>$status]);
    }

    public function updateStatus()
    {
        $content = request()->getContent();
        $cd = json_decode($content);

        $data = [
            'status' => $cd->status
        ];

        transModel::where('no_nota',$cd->no_nota)->update($data);
        return response(['pesan' => 'Berhasil Diubah'],200);

    }
}

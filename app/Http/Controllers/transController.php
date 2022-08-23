<?php

namespace App\Http\Controllers;

use App\Models\alamatModel;
use Illuminate\Http\Request;
use App\Models\transModel;
use App\Models\itemModel;
use App\Models\menuModel;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Translation\Dumper\YamlFileDumper;

class transController extends Controller
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
        $data=[
            'trans' => $this -> trans -> allData(),
        ];
        return view('admin.pemesanan.index', $data);
    }

    public function indexDetail($no_nota)
    {
        $data=[
            'transItem' => $this -> item -> getData($no_nota),
            'trans' => transModel::where('no_nota', $no_nota)
            ->join('alamat', 'trans.id_alamat', 'alamat.id_alamat')
            ->first(),
            'diskon' => $this -> menu -> diskon(1)

        ];
        return view('admin.pemesanan.detail_pemesanan', $data);
    }


    public function insert()
    {
        $id_menu = request()->getContent();
        $cd = json_decode($id_menu);
        $id_user = Auth::id();
        $where = ['user_id' => Auth::id(), 'id_menu' => $cd->id_menu, 'no_nota' => 'Belum Ada'];
        $cek = itemModel::where($where)->first();
        
        if($cek){

            $data = [
                'qty' => $cek->qty+1,
            ];

            $this -> item -> updateDataCart($cd->id_menu, $data);
            return response(["pesan"=> 'Berhasil diubah'],200);

        }else{

            $data = [
                'id_menu' => $cd->id_menu,
                'user_id' => $id_user,
                'qty' => $cd->qty,
                'no_nota' => 'Belum Ada',
            ];

            $this -> item -> insertData($data);
            return response(["pesan"=> 'Berhasil ditambahkan'],200);
        }
    }

    public function update()
    {
        $content = request()->getContent();
        $cd = json_decode($content);
        
        $data = [
            'qty' => $cd->qty,
        ];

        $this -> item -> updateData($cd->id_item, $data);
        return response(["pesan"=> 'Berhasil diubah'],200);
    }

    public function editStatus()
    {
        $content = request()->getContent();
        $cd = json_decode($content);

        $data =[
            'status' => $cd->status,
        ];
        
        transModel::where('no_nota', $cd->no_nota)->update($data);
        return response(["pesan"=> 'Berhasil diubah'],200);
    }

    public function trans()
    {
        
        return redirect('check/'.Auth::id());

    }

    public function delete($id_item)
    {
        $this -> item -> deleteData($id_item);
        return redirect('/');
    }
}


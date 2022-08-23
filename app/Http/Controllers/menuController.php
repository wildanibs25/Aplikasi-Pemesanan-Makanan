<?php

namespace App\Http\Controllers;

use App\Models\itemModel;
use Illuminate\Http\Request;
use App\Models\menuModel;
use App\Models\transModel;
use Symfony\Contracts\Service\Attribute\Required;

class menuController extends Controller
{
    public function __construct()
    {
        $this -> tb_menu = new menuModel();
        $this -> middleware ('auth');
    }

    public function index()
    {
        $data=[
            'tb_menu' => $this -> tb_menu -> allData()
        ];
        return view('admin.menu.index', $data);
    }

    public function indexStatus()
    {
        $data=[
            'tb_menu' => $this -> tb_menu -> allData()
        ];
        return view('admin.status.index', $data);
    }

    public function indexDiskon()
    {
        $data=[
            'tb_menu' => $this -> tb_menu -> diskon(1)
        ];
        return view('admin.status.diskon', $data);
    }

    public function add()
    {
        return view('admin.menu.add');
    }

    public function insert()
    {
        Request() -> validate([
            'nama_menu' => 'required',
            'kategori_menu' => 'required',
            'harga_menu' => 'required',
            'deskripsi_menu' => 'required',
            'gambar_menu' => 'required',
            'status_menu' => 'required'
            
        ]);

        $file = Request()->gambar_menu;
        $tujuan_upload = 'gambarMenu';
        $nama_file = $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama_file);

        $data = [
            'nama_menu' => Request()->nama_menu,
            'kategori_menu' => Request() -> kategori_menu,
            'harga_menu' => Request()->harga_menu,
            'deskripsi_menu' => Request()->deskripsi_menu,
            'gambar_menu' => $nama_file,
            'status_menu' => Request()->status_menu,
        ];

        $this -> tb_menu -> insertData($data);
        return redirect('/admin/menu') -> with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id_menu)
    {
        $data = [
            'tb_menu' => $this -> tb_menu -> getData($id_menu)
        ];

        return view('admin.menu.edit',[
            'tb_menu' => $data,
            'id_menu' => $id_menu,
            'nama_menu' => $data['tb_menu']->nama_menu,
            'kategori_menu' => $data['tb_menu']->kategori_menu,
            'harga_menu' => $data['tb_menu']->harga_menu,
            'deskripsi_menu' => $data['tb_menu']->deskripsi_menu,
            'gambar_menu' => $data['tb_menu']->gambar_menu,
            'status_menu' => $data['tb_menu']->status_menu,
        ], compact('data'));
    }

    public function update($id_menu)
    {
        Request() -> validate([
            'nama_menu' => 'required',
            'kategori_menu' => 'required',
            'harga_menu' => 'required',
            'deskripsi_menu' => 'required',
            'status_menu' => 'required',
        ]);

        $data = [
            'tb_menu' => $this -> tb_menu -> getData($id_menu),
        ];

        if(empty($_FILES['gambar_menu']['name'])){
            $data =[
                'nama_menu' => Request()->nama_menu,
                'kategori_menu' => Request()->kategori_menu,
                'harga_menu' => Request()->harga_menu,
                'deskripsi_menu' => Request()->deskripsi_menu,
                'status_menu' => Request()->status_menu,
            ];

            $this -> tb_menu -> updateData($id_menu, $data);
            return redirect('/admin/menu');
        }else{
            $tmp = public_path('gambarMenu/'.$data['tb_menu']->gambar_menu);

            if(file_exists($tmp)){
                unlink($tmp);
            }

            $file = Request()->gambar_menu;
            $tujuan_upload = 'gambarMenu';
            $nama_file = $file->getClientOriginalName();
            $file->move($tujuan_upload, $nama_file);

            $data =[
                'nama_menu' => Request()->nama_menu,
                'kategori_menu' => Request()->kategori_menu,
                'harga_menu' => Request()->harga_menu,
                'deskripsi_menu' => Request()->deskripsi_menu,
                'gambar_menu' => $nama_file,
                'status_menu' => Request()->status_menu,
            ];

            $this -> tb_menu -> updateData($id_menu, $data);
            return redirect('/admin/menu');
        }
    }

    public function updateStatus()
    {
        $content = request()->getContent();
        $cd = json_decode($content);

        // Request() -> validate([
        //     'status_menu' => 'required',
        // ]);

        $data = [
            'status_menu' => $cd->status,
        ];

        $this -> tb_menu -> updateData($cd->id_menu, $data);
        // return redirect('/admin/status/');
        return response(["pesan" => 'Berhasil diubah'],200);
    }

    public function updateDiskon($id)
    {
        Request() -> validate([
            'diskon' => 'required',
        ]);

        $data = [
            'diskon' => Request()->diskon
        ];

        $this -> tb_menu -> updateDiskon($id, $data);
        return redirect('/admin/diskon');
    }

    public function delete($id_menu)
    {
        $data = [
            'tb_menu' => $this -> tb_menu -> getData($id_menu),
        ];

        $tmp = public_path('gambarMenu/'.$data['tb_menu']->gambar_menu);

        if(file_exists($tmp)){
            unlink($tmp);
        }

        $this -> tb_menu -> deleteData($id_menu);
        return redirect('/admin/menu');
    }

    public function hitungPesanan()
    {
        $jumlah = transModel::where('status', 'Memesan')->count();
        return response(['pesan'=>$jumlah],200);
    }

    public function menu()
    {
        $menu = menuModel::all();
        $namaMenu = [];

        foreach($menu as $m){
            array_push($namaMenu, ['nama' => $m->nama_menu, 'jumlah' =>  itemModel::where('id_menu', $m->id_menu)->sum('qty')]);
        }
        $var = json_encode($namaMenu);
        // dd($var);
        return response(['pesan' => $var], 200);
    }

}

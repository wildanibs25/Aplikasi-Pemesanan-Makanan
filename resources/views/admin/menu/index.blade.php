@extends('layouts.aplikasi_admin')
@section('title','Menu')
@section('content')

<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead style="text-align: center;">
                    <tr>
                        <th width="60px;">No </th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tb_menu as $m)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$m->nama_menu}}</td>
                        <td>{{$m->kategori_menu}}</td>
                        <td>@currency($m->harga_menu)</td>
                        <td>{{$m->deskripsi_menu}}</td>
                        <td><img src="/gambarMenu/{{$m->gambar_menu}}" class="img"></td>
                        <td>
                            <a href="{{url('/admin/menu/edit/'.$m->id_menu)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('/admin/menu/delete/'.$m->id_menu)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{url('/admin/menu/add')}}" class="btn btn-primary oke"><span class="icon dripicons-plus"></span> Tambah Menu</a>
    </div>
</section>
@endsection
 
<input type="hidden" value="{{ $thisPage = "Menu" }}">
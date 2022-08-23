@extends('layouts.aplikasi_admin')
@section('title','Diskon')
@section('content')

<section class="section" style="min-height:480px;">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Diskon</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $tb_menu->diskon }} %</td>
                        <td>{{ $tb_menu->tanggal_diskon }}</td>
                    </tr>
                </tbody>
            </table>
            <center>
                <form class="form form-vertical" action="{{url('/admin/diskon/update/'.$tb_menu->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-11 oke">
                        <div class="input-group mb-3">
                            {{-- <span class="input-group-text" id="basic-addon1" style="width:127px;">Nama Menu</span> --}}
                            <input type="text" class="form-control" placeholder="Diskon..."
                                aria-label="Diskon" aria-describedby="basic-addon1" name="diskon">
                                <button type="submit"
                                class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </form>
            </center>
        </div>
       
    </div>
</section>
@endsection
   
<input type="hidden" value="{{ $thisPage = "Diskon" }}">
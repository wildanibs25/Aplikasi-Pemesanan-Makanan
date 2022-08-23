@extends('layouts.aplikasi_admin')
@section('title','Pesan')
@section('content')

<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead style="text-align: center;">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mail as $m)
                    <tr>
                        <td><a href="{{url('/admin/pesan/detail/'.$m->id)}}">{{$m->nama}}</a></td>
                        <td><a href="{{url('/admin/pesan/detail/'.$m->id)}}">{{$m->email}}</a></td>
                        <td>{{$m->subject}}</td>
                        <td>{{$m->time}}</td>
                        <td><span class="badge @if($m->status=="Belum Dibaca"){{ __('bg-danger') }} @else {{ __('bg-success') }} @endif">{{$m->status}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
  
<input type="hidden" value="{{ $thisPage = "Pesan" }}">

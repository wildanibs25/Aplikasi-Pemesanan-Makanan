@extends('layouts.aplikasi_admin')
@section('title','Ulasan')
@section('content')

<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead style="text-align: center;">
                    <tr>
                        <th>Nama</th>
                        <th>Rating</th>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ulasan as $m)
                    <tr>
                        <td><a href="{{url('/admin/ulasan/detail/'.$m->id_rating)}}">{{$m->name}}</a></td>
                        <td><span class="fa-fw select-all fas" style="color: gold"></span> 
                            {{$m->rating}}
                        </td>
                        <td style="width:150px;">
                            <span class="badge @if($m->status=="Belum Dibaca"){{ __('bg-danger') }} @else {{ __('bg-success') }} @endif">{{$m->status}}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
  
<input type="hidden" value="{{ $thisPage = "Ulasan" }}">

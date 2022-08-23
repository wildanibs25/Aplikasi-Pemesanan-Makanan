@extends('layouts.aplikasi_admin')
@section('title','Pemesanan')
@section('content')

<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead style="text-align: center;">
                    <tr>
                        <th>No Nota</th>
                        <th>Pemesan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trans as $t)
                    <tr>
                        <td><a href="{{url('/admin/detail-pemensanan/'.$t->no_nota)}}">{{$t->no_nota}}</a></td>
                        <td>{{$t->name}}</td>
                        <td>
                            <span class="badge 
                                @if($t->status=="Memesan"){{ __('bg-danger') }} 
                                @elseif($t->status=="Proses"){{ __('bg-primary') }}
                                @elseif($t->status=="Diantar"){{ __('bg-warning') }} 
                                @else {{ __('bg-success') }} 
                                @endif" style="width:80px;">{{$t->status}}</span>
                            </td>
                        <td>{{$t->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <a href="{{url('/admin/menu/add')}}" class="btn btn-primary oke"><span class="icon dripicons-plus"></span> Tambah Menu</a> --}}
    </div>

</section>
@endsection
  
<input type="hidden" value="{{ $thisPage = "Pemesanan" }}">

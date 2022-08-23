@extends('layouts.aplikasi_admin')
@section('title','Ulasan Rating')
@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{url('/admin/ulasan/')}}" class="btn btn-primary oke">
                <span class="icon dripicons-arrow-left"></span></a>
        </div>
        <div class="card-body">
            Name : {{ $ulasan->name }}
        </div>
        <div class="card-body">
            Rating : <span class="fa-fw select-all fas" style="color: gold"></span> {{ $ulasan->rating }}
            <hr>
        </div>
        <div class="card-body">
            {{ $ulasan->ulasan }}
        </div>
    </div>

</section>
@endsection
  
<input type="hidden" value="{{ $thisPage = "Ulasan" }}">
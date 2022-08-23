@extends('layouts.aplikasi_admin')
@section('title','Mail')
@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{url('/admin/pesan/')}}" class="btn btn-primary oke">
                <span class="icon dripicons-arrow-left"></span></a>
        </div>
        <div class="card-body">
            From : {{ $mail->email }}
        </div>
        <div class="card-body">
            Name : {{ $mail->nama }}
        </div>
        <div class="card-body">
            Subject : {{ $mail->subject }}
            <hr>
        </div>
        <div class="card-body">
            {{ $mail->pesan }}
        </div>
    </div>

</section>
@endsection
  
<input type="hidden" value="{{ $thisPage = "Pesan" }}">
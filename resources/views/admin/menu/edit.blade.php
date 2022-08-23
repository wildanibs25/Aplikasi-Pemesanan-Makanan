@extends('layouts.aplikasi_admin')
@section('title','Tambah Menu')
@section('content')

<div class="card-body">
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            <a href="{{url('/admin/menu/')}}" class="btn btn-primary oke">
                                <span class="icon dripicons-arrow-left"></span></a>
                        </div>
                        <div class="card-body">
                            <form class="form form-vertical" action="{{url('/admin/menu/update/'.$id_menu)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12 oke">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1" style="width:127px;">Nama Menu</span>
                                                <input type="text" class="form-control" placeholder="Nama Menu..."
                                                    aria-label="Username" aria-describedby="basic-addon1" name="nama_menu" value="{{ $nama_menu }}">
                                            </div>
                                        </div>
                                        <div class="col-12 oke">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1" style="width:127px;">Harga</span>
                                                <input type="number" class="form-control" placeholder="Harga..."
                                                    aria-label="Username" aria-describedby="basic-addon1" name="harga_menu" value="{{ $harga_menu }}">
                                            </div>
                                        </div>
                                        <div class="col-12 oke">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1" style="margin-right: 20px; width:127px;">kategori</span>
                                                <div class="form-check" style="margin-right: 20px; padding-top:5px;">
                                                    <input class="form-check-input" type="radio" name="kategori_menu"
                                                        value="Makanan" @if($kategori_menu == 'Makanan') {{__('checked') }} @endif id="flexRadioDefault1">
                                                    <label class="form-check-label" for="kategori_menu">
                                                        Makanan
                                                    </label>
                                                </div>
                                                <div class="form-check" style="margin-right: 20px; padding-top:5px;">
                                                    <input class="form-check-input" type="radio" name="kategori_menu"
                                                       value="Minuman" @if($kategori_menu == 'Minuman') {{__('checked') }} @endif id="flexRadioDefault1">
                                                    <label class="form-check-label" for="kategori_menu">
                                                        Minuman
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="status_menu" value="{{ $status_menu }}">
                                        <div class="col-12 oke">
                                            <div class="mb-3">
                                                <img class="img2" src="/gambarMenu/{{ $gambar_menu }}" alt="">
                                                <div class="input-group mb-3">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupFile01">
                                                            <i class="bi bi-upload"></i></label>
                                                        <input type="file" class="form-control" id="inputGroupFile01" name="gambar_menu"></div>
                                                    </div>
                                                </div>
                                                </fieldset>
                                            </div>                  
                                        </div>
                                        <div class="col-12 oke">
                                            <div class="form-group mb-3">
                                                <span class="input-group-text btn-primary" id="basic-addon1">Deskripsi</span>
                                                <textarea class="form-control" id="diskripsi_menu" name="deskripsi_menu"
                                                    rows="4" placeholder="Deskripsi...">{{ $deskripsi_menu }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>     
</div>  

@endsection

<input type="hidden" value="{{ $thisPage = "Menu" }}">

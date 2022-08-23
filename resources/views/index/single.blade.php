@extends('layouts.aplikasi')
@section('title', 'Produk')
@section('content')

<div class="page-head_agile_info_w3l" style="margin-top: 10px;">
</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="/">Home</a>
                    <i>|</i>
                </li>
                <li>Menu</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- Single Page -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Menu
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="col-md-5 single-right-left ">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <img src="/gambarMenu/{{ $show->gambar_menu }}" alt="" style="width: 400px;" srcset="">
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h3>{{ $show->nama_menu }}</h3>
            <p>
                @if ($diskon->diskon==0)
                <span class="item_price">@currency($show->harga_menu)</span>
                @else
                    <del>@currency($show->harga_menu)</del>
                @endif
                <label>Free delivery</label>
            </p>
            @if(DB::table('rating')->where('id_menu',$show->id_menu)->avg('rating') != 0)
                <p class="c-rate">
                    <img src="{{ asset('grocery') }}/images/star.png" style="width: 16px" alt=""> {{ DB::table('rating')->where('id_menu',$show->id_menu)->avg('rating') }}
                </p>
            @endif
            <div class="single-infoagile">
                <ul>
                    <li>
                        {{ $show->deskripsi_menu }}
                    </li>
                    @if ($diskon->diskon!=0)
                    <li>
                        Harga :
                        <span class="item_price">@currency($show->harga_menu - ($show->harga_menu * $diskon->diskon / 100))</span>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="product-single-w3l">
                <p>
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>Ayo
                <label>Segera</label> Pesan.</p>
            </div>
            <div class="occasion-cart">
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                    @if($show->status_menu == 'Tersedia')
                        <input type="button" class="button" onclick="addtocart('{{ $show->id_menu }}', '1')" value="Add to cart">
                    @else
                        <input type="button" class="button" value="Add to cart" style=" background-color: rgb(48, 46, 46); opacity: .4;" disabled>
                    @endif
                </div>

            </div>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="contact-w3l">
    <div class="container">
        <h3 class="tittle-w3l">Ulasan
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <div class="checkout-left" id="form">
            <div class="address_form_agile">
                <h4>Berikan Ulasan Anda</h4>
                <form method="post" action="/addRating" class="creditly-card-form agileinfo_form">
                    @csrf
                    <input type="hidden" name="id_menu" value="{{ $show->id_menu }}" id="">
                    <label for="rating">Rating</label>
                    <div class="rating1">
                        <input id="input-7-xl" class="rating rating-loading" name="rating" value="{{ DB::table('rating')->where('id_menu',$show->id_menu)->avg('rating') }}" data-min="0" data-max="5" data-step="0.5" data-size="xl">
                    </div>
                    <div class="controls contact" style="margin-top: 20px;">
                        <label for="alamat">Ulasan</label>
                        <textarea placeholder="Tulis Ulasan Anda" name="ulasan" required="" 
                        style="color: black; border: solid 1px rgb(236, 231, 231); border-bottom: 1px solid #FF5722;"></textarea>
                    </div>
                    <div class="clear"></div>
                    <button class="submit check_out">Kirim</button>
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- //contact -->
    </div>
</div>
<div class="featured-section" id="projects">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Add More
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="content-bottom-in">
            <ul id="flexiselDemo1">
                @foreach($tb_menu as $sm)
                    @if($sm->status_menu == 'Tersedia')
                        <li>
                            <div class="w3l-specilamk">
                                <div class="speioffer-agile">
                                    <a href="show/{{ $sm->id_menu }}">
                                        <img src="../gambarMenu/{{ $sm->gambar_menu }}" style="width: 180px !important; height:160px !important; object-fit:cover;" alt="">
                                    </a>
                                </div>
                                <div class="product-name-w3l">
                                    <h4>
                                        <a href="show/{{ $sm->id_menu }}">{{ $sm->nama_menu }}</a>
                                    </h4>
                                    <div class="w3l-pricehkj">
                                        <h6>@currency($sm->harga_menu - ($sm->harga_menu * $diskon->diskon / 100))</h6>
                                        <p>Save @currency($sm->harga_menu * $diskon->diskon / 100)</p>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        @if (Auth::check())
                                                <input type="button" class="button" onclick="addtocart('{{ $sm->id_menu }}', '1')" value="Add to cart">
                                        @else
                                            <input type="submit" class="button" data-toggle="modal" data-target="#myModal1" value="Add to cart">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="icon">
    @if(Auth::check()) 
    <a href="#" data-toggle="modal" data-target="#myModal3" class="button2" onclick="showCart()">
        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span id="jumlahItem"></span>
    </a>
    @else
    <a href="#" data-toggle="modal" data-target="#myModal1" class="button2"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
    @endif
    <div class="clearfix"></div>
</div>

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      swal('Pesan', msg, "success");
    }
  </script>
@endsection
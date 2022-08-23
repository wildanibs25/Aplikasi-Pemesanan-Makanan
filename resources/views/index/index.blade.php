@extends('layouts.aplikasi')
@section('title', 'index')
@section('content')
<div style="margin: 10px;"></div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big
							<span>Save</span>
						</h3>
						<p>Get flat
							<span>{{ $diskon->diskon }}%</span> Cashback</p>
						<a class="button2" href="#content">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Healthy
							<span>Saving</span>
						</h3>
						<p>Get Upto
							<span>{{ $diskon->diskon }}%</span> Off</p>
						<a class="button2" href="#content">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big
							<span>Deal</span>
						</h3>
						<p>Get Best Offer Upto
							<span>{{ $diskon->diskon }}%</span>
						</p>
						<a class="button2" href="#content">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
						<h3>Today
							<span>Discount</span>
						</h3>
						<p>Get Now
							<span>{{ $diskon->diskon }}%</span> Discount</p>
						<a class="button2" href="#content">Shop Now </a>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">MENU
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        {{-- @foreach($populer as $p)
            {{ $p->id_menu }}
        @endforeach --}}

        <div class="agileinfo-ads-display col-md-14">
            <div class="wrapper" id="content">
                <div class="product-sec1">
                    <h3 class="heading-tittle">Makanan</h3>
                    @foreach($tb_menu->where('kategori_menu', '==', 'Makanan') as $sm)
                        @if($sm->status_menu == 'Tersedia')
                            <div class="col-md-4 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="gambarMenu/{{ $sm->gambar_menu }}" style="width: 100%; object-fit:cover; margin-left:-15px;" alt="">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="show/{{ $sm->id_menu }}" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                        <?php 
                                        if(in_array($sm->id_menu, $populer_menu)){?>
                                            <span class="product-new-top"><img src="{{ asset('grocery') }}/images/medal.png" alt=""></span>
                                        <?php }?>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="show/{{ $sm->id_menu }}">{{ $sm->nama_menu }}</a>
                                        </h4>
                                        <p class="c-rate">
                                            <img src="{{ asset('grocery') }}/images/star.png" style="width: 16px" alt=""> {{ DB::table('rating')->where('id_menu',$sm->id_menu)->avg('rating') }}
                                        </p>
                                        <div class="info-product-price">
                                            @if($diskon->diskon == null)
                                                <span class="item_price">@currency($sm->harga_menu)</span>
                                            @else
                                                <span class="item_price">@currency($sm->harga_menu - ($sm->harga_menu * $diskon->diskon / 100))</span>
                                                <del>@currency($sm->harga_menu)</del>
                                            @endif
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            @if (Auth::check())
                                                <input type="button" class="button" onclick="addtocart('{{ $sm->id_menu }}', '1')" value="Add to cart">
                                            @else
                                                <input type="button" class="button" data-toggle="modal" data-target="#myModal1" value="Add to cart">
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-4 product-men" style=" background-color: rgb(255, 255, 255); opacity: .4;">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="gambarMenu/{{ $sm->gambar_menu }}" style="width: 100%; object-fit:cover; margin-left:-15px;" alt="">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="show/{{ $sm->id_menu }}" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                        <?php 
                                        if(in_array($sm->id_menu, $populer_menu)){?>
                                            <span class="product-new-top"><img src="{{ asset('grocery') }}/images/medal.png" alt=""></span>
                                        <?php }?>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="show/{{ $sm->id_menu }}">{{ $sm->nama_menu }}</a>
                                        </h4>
                                        <p class="c-rate">
                                            <img src="{{ asset('grocery') }}/images/star.png" style="width: 16px" alt=""> {{ DB::table('rating')->where('id_menu',$sm->id_menu)->avg('rating') }}
                                        </p>
                                        <div class="info-product-price">
                                            <span class="item_price">@currency($sm->harga_menu)</span>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            @if (Auth::check())
                                                <input type="button" class="button" value="Add to cart">
                                            @else
                                                <input type="button" class="button" data-toggle="modal" data-target="#myModal1" value="Add to cart">
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="clearfix"></div>
                </div>
                <div class="product-sec1 product-sec2">
                    <div class="col-xs-7 effect-bg">
                        <h3 class="">Pure Energy</h3>
                        <h6>Enjoy our all healthy Products</h6>
                        <p>Get Extra 10% Off</p>
                    </div>
                    <h3 class="w3l-nut-middle">Free Es/Hot Teh</h3>
                    <div class="col-xs-5 bg-right-nut">
                        <img src="{{ asset('grocery') }}/images/es_teh.png" style="margin-left:7px; width:170px !importent; margin-top:7px;" alt="">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="product-sec1">
                    <h3 class="heading-tittle">Minuman</h3>
                    @foreach($tb_menu->where('kategori_menu', '==', 'Minuman') as $sm)
                        {{-- @if($sm->status_menu == 'Tersedia')
                            <div class="col-md-4 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="gambarMenu/{{ $sm->gambar_menu }}" style="width: 180px !important; height:160px !important; object-fit:cover;" alt="">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="show/{{ $sm->id_menu }}" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="show/{{ $sm->id_menu }}">{{ $sm->nama_menu }}</a>
                                        </h4>
                                        <div class="info-product-price">
                                            @if($diskon->diskon == null)
                                            <span class="item_price">@currency($sm->harga_menu)</span>
                                            @else
                                                <span class="item_price">@currency($sm->harga_menu - ($sm->harga_menu * $diskon->diskon / 100))</span>
                                                <del>@currency($sm->harga_menu)</del>
                                            @endif
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
                            </div>
                        @else
                            <div class="col-md-4 product-men" style=" background-color: rgb(255, 255, 255); opacity: .4;">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="gambarMenu/{{ $sm->gambar_menu }}" style="width: 150px !important; height:150px !important; object-fit:cover; margin-left:-15px;" alt="">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="show/{{ $sm->id_menu }}" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="show/{{ $sm->id_menu }}">{{ $sm->nama_menu }}</a>
                                        </h4>
                                        <div class="info-product-price">
                                            <span class="item_price">@currency($sm->harga_menu)</span>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            @if (Auth::check())
                                                <input type="button" class="button" value="Add to cart">
                                            @else
                                                <input type="button" class="button" data-toggle="modal" data-target="#myModal1" value="Add to cart">
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif --}}
                        @if($sm->status_menu == 'Tersedia')
                            <div class="col-md-4 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="gambarMenu/{{ $sm->gambar_menu }}" style="width: 100%; object-fit:cover; margin-left:-15px;" alt="">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="show/{{ $sm->id_menu }}" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                        <?php 
                                        if(in_array($sm->id_menu, $populer_menu)){?>
                                            <span class="product-new-top"><img src="{{ asset('grocery') }}/images/medal.png" alt=""></span>
                                        <?php }?>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="show/{{ $sm->id_menu }}">{{ $sm->nama_menu }}</a>
                                        </h4>
                                        <p class="c-rate">
                                            <img src="{{ asset('grocery') }}/images/star.png" style="width: 16px" alt=""> {{ DB::table('rating')->where('id_menu',$sm->id_menu)->avg('rating') }}
                                        </p>
                                        <div class="info-product-price">
                                            @if($diskon->diskon == null)
                                                <span class="item_price">@currency($sm->harga_menu)</span>
                                            @else
                                                <span class="item_price">@currency($sm->harga_menu - ($sm->harga_menu * $diskon->diskon / 100))</span>
                                                <del>@currency($sm->harga_menu)</del>
                                            @endif
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            @if (Auth::check())
                                                <input type="button" class="button" onclick="addtocart('{{ $sm->id_menu }}', '1')" value="Add to cart">
                                            @else
                                                <input type="button" class="button" data-toggle="modal" data-target="#myModal1" value="Add to cart">
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-4 product-men" style=" background-color: rgb(255, 255, 255); opacity: .4;">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="gambarMenu/{{ $sm->gambar_menu }}" style="width: 100%; object-fit:cover; margin-left:-15px;" alt="">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="show/{{ $sm->id_menu }}" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                        <?php 
                                        if(in_array($sm->id_menu, $populer_menu)){?>
                                            <span class="product-new-top"><img src="{{ asset('grocery') }}/images/medal.png" alt=""></span>
                                        <?php }?>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="show/{{ $sm->id_menu }}">{{ $sm->nama_menu }}</a>
                                        </h4>
                                        <p class="c-rate">
                                            <img src="{{ asset('grocery') }}/images/star.png" style="width: 16px" alt=""> {{ DB::table('rating')->where('id_menu',$sm->id_menu)->avg('rating') }}
                                        </p>
                                        <div class="info-product-price">
                                            <span class="item_price">@currency($sm->harga_menu)</span>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            @if (Auth::check())
                                                <input type="button" class="button" value="Add to cart">
                                            @else
                                                <input type="button" class="button" data-toggle="modal" data-target="#myModal1" value="Add to cart">
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="featured-section" id="projects">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Special Offers
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
                                        <img src="gambarMenu/{{ $sm->gambar_menu }}" style="width: 180px !important; height:160px !important; object-fit:cover;" alt="">
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

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign In </h3>
                    <p>
                        Sign In now, Let's start your Grocery Shopping. Don't have an account?
                        <a href="#" data-toggle="modal" data-target="#myModal2">
                            Sign Up Now</a>
                    </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="User Name" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Password" name="password" required autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <input type="submit" value="Sign In">
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign Up</h3>
                    <p>
                        Come join the Grocery Shoppy! Let's set up your Account.
                    </p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="Name" name="name" required="">
                        </div>
                        <div class="styled-input">
                            <input type="email" placeholder="E-mail" name="email" required="">
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Password" name="password" id="password1" required="">
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password2" required="">
                        </div>
                        <input type="submit" value="Sign Up">
                    </form>
                    <p>
                        <a href="#">By clicking register, I agree to your terms</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<div class="icon">
    @if(Auth::check()) 
    <a href="#" data-toggle="modal" data-target="#myModal3" class="button2" onclick="showCart()">
        <i class="fa fa-cart-arrow-down"></i><span id="jumlahItem"></span>
    </a>
    @else
    <a href="#" data-toggle="modal" data-target="#myModal1" class="button2"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
    @endif
    <div class="clearfix"></div>
</div>
@endsection
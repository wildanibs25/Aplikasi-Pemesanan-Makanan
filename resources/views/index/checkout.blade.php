@extends('layouts.aplikasi')
@section('title', 'index')
@section('content')
	
<div class="page-head_agile_info_w3l" style="margin-top:10px;">
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
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Checkout
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4></h4>
				<div class="table-responsive">
					{{-- <table class="timetable_sub">
						<table class="timetable_sub">
							<tbody>
								@foreach($daftar as $i)
								<tr>
									<td>{{$loop->iteration}}</td>

									<td>
										<img src="../gambarMenu/{{ $i->gambar_menu }}" 
										style="width:100px !important; height:100px !important; object-fit:cover;" alt="">
									</td>
									<td class="quantity">
										{{ $i->nama_menu }}
									</td>
									<td class="quantity">
										@currency($i->harga_menu - ($i->harga_menu * $diskon->diskon / 100))
									</td>
									<td class="quantity2">
										{{ $i->qty }}
									</td>
									<td><a href="javascript:void(0)" class="btn btn-danger" onclick="deleteItem('{{ $i->id_item }}')">X</a></td>
								</tr>
								@endforeach
							</tbody>
					</table> --}}
					<div class="bs-docs-example" style="400px;">
						<table class="table" id="myTable" style="400px;">
							<thead>
								<tr>
									<th>#</th>
									<th>Menu</th>
									<th>Harga</th>
									<th>Jumlah</th>
									<th>harga</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($daftar as $i)
									<tr class="rem{{ $i->id_item }}">
										<td width='50px'>{{ $loop->iteration }}</td>
										<td>{{ $i->nama_menu }}</td>
										<td width='150px'>@currency(($i->harga_menu - ($i->harga_menu * $diskon->diskon / 100)))</td>
										<td width='30px'>x{{ $i->qty }}</td>
										<td width='200px'>
											@currency(($i->harga_menu - ($i->harga_menu * $diskon->diskon / 100)) * $i->qty)
											<span class='total' style="visibility:hidden;">{{ ($i->harga_menu - ($i->harga_menu * $diskon->diskon / 100)) * $i->qty }}</span>
										</td>
										<td width='30px'>
											{{-- <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteItem('{{ $i->id_item }}')">X</a> --}}
											<button type="button" class="btn btn-danger btn_del" id="{{ $i->id_item }}"><span class="glyphicon glyphicon-remove"></span> Delete</button>
										</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="4">
										Total :
									</td>
									<td><span id="sum"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile">
					<h4>Pilih Alamat Anda Sekarang</h4>
					<form action="/invoice" method="post" class="creditly-card-form agileinfo_form">
						@csrf
						 <div class="creditly-wrapper wthree, w3_agileits_wrapper">
							{{--<div class="information-wrapper">--}}
								<div class="bs-docs-example"> 
									<ul class="list-group w3-agile">
										@foreach ($alamat as $a)
										<li class="list-group-item">
											<label class="container2" style="padding-left: 70px;">
												{{ $a->nama_lengkap }} <span style="font-weight: bold;">{{ $a->wa }}</span>
															<p>{{ $a->alamat_lengkap }}</p>
															<br>Sebagai : {{ $a->patokan }}
												<input type="radio" name="id_alamat" value="{{ $a->id_alamat }}" >
												<span class="checkmark" style="margin-top:50px;"></span>
											</label>
										</li>
										<span id="input"></span>
										@endforeach
									</ul>
								</div>
								<button type="button" onclick="showhide('form')" class="submit check_out" style="background-color:rgb(31, 30, 29) ">Tambah Alamat</button>
								<button class="submit check_out">Delivery</button>
							{{-- </div>--}}
						</div> 
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		
			<div class="checkout-left" id="form" style="display:none;">
				<div class="address_form_agile">
					<h4>Tambah Alamat Baru</h4>
					<form method="post" action="/addAlamat" class="creditly-card-form agileinfo_form">
						@csrf
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls">
										<label for="wa">Nama Lengkap</label>
										<input class="billing-address-name" type="text" name="nama_lengkap" placeholder="Contoh : Ahmad Suryadi" required="">
									</div>
									<div class="controls">
										<label for="wa">Whatsapp</label>
										<input type="text" placeholder="Contoh : 088832326732" name="wa" required="">
									</div>
									<div class="controls contact" >
										<label for="wa">Alamat Lengkap</label>
										<textarea placeholder="Contoh : Rt01/Rw02, Bangutapan, Bangutapan, Bantul" name="alamat_lengkap" required="" 
										style="color: black; border: solid 1px rgb(236, 231, 231); border-bottom: 1px solid #FF5722;"></textarea>
									</div>
									<div class="controls">
										<label for="wa">Sebagai</label>
										<input type="text" placeholder="Contoh : Depan pohon bringin" name="patokan" required="">
									</div>
									<div class="clear"></div>
								</div>
								<button class="submit check_out">Simpan Alamat</button>
							</div>
						</div>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<script>
		function showhide(id) {
        var e = document.getElementById(id);
        e.style.display = (e.style.display == 'block') ? 'none' : 'block';
     }
	</script>

	<script>
		$(document).ready(function(){
			$('.btn_del').on('click', function(){
				var id_item = $(this).attr('id');
				$.ajax({
					type: "GET",
					url: '{{url('delete')}}/'+id_item,
					success: function(){
						$('.rem'+id_item).fadeOut('slow', function (c) {
							$('.rem'+id_item).remove();
							calc_total();
						});
					}
				});
			});		
				
		});
	</script>

	<script>
		calc_total();

		function formatNumber(num) {
			return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
		}

		function calc_total(){
			var sum = 0;
			$(".total").each(function(){
				sum += parseFloat($(this).text());
			});
			// var t = 10000;
			$('#sum').html("Rp. "+formatNumber(sum));
			$('#input').html("<input type='hidden' name='jumlah_total' value='"+sum+"'>");
		}
	</script>

	<script src="{{ asset('grocery') }}/js/jquery-2.1.4.min.js"></script>

	<script src="{{ asset('grocery') }}/js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>

	<!--quantity-->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>

@endsection
@extends('layouts.aplikasi')
@section('title', 'index')
@section('content')
	
{{-- <div class="page-head_agile_info_w3l">
</div> --}}
<div style="margin: 10px;"></div>
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/">Home</a>
						<i>|</i>
					</li>
					<li>History</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="privacy">
		<div class="container">
			<h3 class="tittle-w3l">History
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
            <div class="bs-docs-example">
				<ul class="list-group w3-agile">
					@foreach ($history as $h)
					<li class="list-group-item">
                        <a href="invoice={{ $h->no_nota }}">
                        <label class="container2">
                            {{ $h->no_nota }} <span style="font-weight: bold; float:right;">{{ $h->status }}</span>
                                        <p>{{ $h->name }} </p><span style="font-weight: bold; float:right;">{{ $h->updated_at }}</span>
                                        <br>Total : @currency($h->jumlah_total)
                            
                            {{-- <span class="checkmark" style="margin-top:50px;"></span> --}}
                        </label>
                        </a>
                    </li>
					@endforeach
                </ul>
			</div>
			{{-- <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
				<input type="button" onclick="showhide('form')" class="button" value="Tambah Alamat">
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
			</div> --}}
		</div>
	</div>
	{{-- <script>
		function showhide(id) {
        var e = document.getElementById(id);
        e.style.display = (e.style.display == 'block') ? 'none' : 'block';
     }
	</script> --}}

@endsection
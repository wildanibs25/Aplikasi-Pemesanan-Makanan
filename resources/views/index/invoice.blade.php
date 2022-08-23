<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Geprek Pak Tarno</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="G" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="{{ asset('grocery') }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('grocery') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('grocery') }}/css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="{{ asset('grocery') }}/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="{{ asset('grocery') }}/css/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	
	<link href="http://fonts.cdnfonts.com/css/arco" rel="stylesheet">
	
	<script src="{{ asset('grocery') }}/js/jquery-2.1.4.min.js"></script>
	<script src="{{ asset('grocery') }}/js/bootstrap.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	{{-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'> --}}
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style>
		.lds-circle {
			display: inline-block;
			transform: translateZ(1px);
		}
		.lds-circle > div {
			display: inline-block;
			width: 18px;
			height: 18px;
			margin-top: 4px;
			border-radius: 50%;
			background: #fff;
			animation: lds-circle 2.4s cubic-bezier(0, 0.2, 0.8, 1) infinite;
		}
		@keyframes lds-circle {
			0%, 100% {
				animation-timing-function: cubic-bezier(0.5, 0, 1, 0.5);
			}
			0% {
				transform: rotateY(0deg);
			}
			50% {
				transform: rotateY(1800deg);
				animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1);
			}
			100% {
				transform: rotateY(3600deg);
			}
		}

	</style>

</head>

<body>
	<div class="ban-top">
		<div style="margin: 10px;"></div>
		<div class="container">
			<div class="logo" style="width: 100px !importent; float:left">
				<a href="/"> <img src="{{ asset('grocery') }}/images/geprek1.png" style="width: 100px; margin-top:10px;" alt=""> </a>
			</div>
		</div>
	</div>
	<div class="featured-section" id="projects">
		<div class="container" style="margin-top:50px;">
			<div class="row" style="margin-top:50px;">
				<div class="content2" style="margin-bottom: 100px;">
					<div style="float: left">
						<span style="font-size: 40px;">INVOICE</span>
						<p>{{ $invoice->name }}</p>
						<p><a href="/invoice={{ $invoice->no_nota }}"><span id="st">{{ $invoice->no_nota }}</span></a> <button class="btn-copy" id="copy-btn"><span class="tooltiptext" id="myTooltip">copy</span></button></p>
						<input type="hidden" value="http://127.0.0.1:8000/invoice={{ $invoice->no_nota }}" id="copy-input">
						<p>{{ $invoice->updated_at }}</p>
					</div>
					<div style="float: right">
						<p>status : <span id="ubahstatus">{{ $invoice->status }}</span></p> 
					</div>
				</div>
				<div class="bs-docs-example" style="400px;">
					<table class="table" style="400px;">
						<thead>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($invoiceItem as $i)
								<tr>
									<td width='50px'>{{ $loop->iteration }}</td>
									<td>{{ $i->nama_menu }}</td>
									<td width='120px'>@currency($i->harga_menu - ($i->harga_menu * $diskon->diskon / 100))</td>
									<td width='30px'>x{{ $i->qty }}</td>
									<td width='200px'>@currency(($i->harga_menu - ($i->harga_menu * $diskon->diskon / 100)) * $i->qty)</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5"><hr></td>
							</tr>
							<tr>
								<td colspan="4">Total : </td>
								<td>@currency($invoice->jumlah_total)</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="content2">
					<div style="float: right">
						<input type="button" class="btn-copy" name="btn" id="btn" value="Konfirmasi" onclick="editStatus('{{ $invoice->no_nota }}')" style="display: none">
					</div>
				</div>
			</div>
			<div class="w3-light-grey w3-round-xlarge" style="margin-top:100px;">
				<span id="disini"></span>
			</div>
			<span id="disini2"></span>

		</div>
	</div>


	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$('#copy-btn').on('click', function(e) {
				e.preventDefault();
	
				var copyText = document.getElementById("copy-input");
				
				copyText.readOnly = true;

				copyText.type = 'text';

				copyText.select();
				copyText.setSelectionRange(0, 99999);

				navigator.clipboard.writeText(copyText.value);

				var tooltip = document.getElementById("myTooltip");
				tooltip.innerHTML = "Copied";

				copyText.type = 'hidden';
			});
		});
	</script>

<script>
	var st = $('#st').html();
	setInterval(function() {
		$.get('{{ url("status") }}/'+st,function(res){
			$('#ubahstatus').html(res.pesan);
			if(res.pesan == 'Memesan'){
				$('#disini').html('<div class="w3-container w3-blue w3-round-xlarge" style="width:4%"><div class="lds-circle" style="float: right;"><div></div></div></div>');
			}
			else if(res.pesan == 'Proses'){
				$('#disini').html('<div class="w3-container w3-blue w3-round-xlarge" style="width:50%"><div class="lds-circle" style="float: right;"><div></div></div></div>');
			}
			else if(res.pesan == 'Diantar'){
				$('#disini').html('<div class="w3-container w3-blue w3-round-xlarge" style="width:100%"><div class="lds-circle" style="float: right;"><div></div></div></div>');
				$('#btn').show();
			}else{
				$('#btn').hide();
				$('#disini').hide();
				$('#disini2').html('<p class="my-5 mx-5" style="font-size: 30px; text-align:center;" id="terimakasih">Terimakasih Telah Memesan</p>');
			}
		});
	}, 3000);
</script>

<script>
	function editStatus(no_nota){
			var data={
				'no_nota': no_nota,
				'status': 'Selesai',
			}
			$.post(
				'{{ url("updateStatus") }}',
				JSON.stringify(data),
				function(res){
					// alert(res.massage)
				},
				"JSON",
			)
		}
</script>
</body>

</html>



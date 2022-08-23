<!DOCTYPE html>
<html lang="en">

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

	<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.0.7/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
	<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.0.7/js/star-rating.js" type="text/javascript"></script>
</head>

<body>
	@include('layouts.nav')

	@yield('content')

	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">CART</h3>
						<form action="{{url('/checkout/')}}" method="post">
							@csrf
							<div class="bs-docs-example">
							   <div id="mycart"></div>
							</div>
								<input type="submit" class="button" id="button" value="Checkout">
						</form>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	<script>
		setInterval(function() {
			$.get('{{ url("hitung") }}',function(res){
				$('#jumlahItem').html(res.pesan);
			});
		}, 1000);
	</script>

	<script>
		function addtocart(id_menu, qty){
			var data={
				'id_menu': id_menu,
				'qty': qty,
			}
			$.post(
				'{{ url("addCart") }}',
				JSON.stringify(data),
				function(res){
					
				},
				"JSON",
			)
		}
	
		function showCart(){
			$.get('{{ url("cart") }}',function(res){
				$('#mycart').html(res);
				if($('#table >tbody >tr').length == 0){
					$('#button').hide();
				}else{
					$('#button').show();
				}
			});
		}
	
		function deleteItem(id_item){
			$.get('{{url('delete')}}/'+id_item,function(res){
				showCart()
			});
		}
	</script>

	@include('layouts.footer-aplikasi')
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
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="{{ asset('grocery') }}/js/minicart.js"></script>
	<script>
		paypalm.minicartk.render(); //use only unique class names other than paypalm.minicartk.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total <= 0) {
				alert('The minimum order quantity is 1. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- price range (top products) -->
	<script src="{{ asset('grocery') }}/js/jquery-ui.js"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("Rp." + ui.values[0] + " - Rp." + ui.values[1]);
				}
			});
			$("#amount").val("Rp." + $("#slider-range").slider("values", 0) + " - Rp." + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<script src="{{ asset('grocery') }}/js/jquery.flexisel.js"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="{{ asset('grocery') }}/js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="{{ asset('grocery') }}/js/move-top.js"></script>
	<script src="{{ asset('grocery') }}/js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<!-- //for bootstrap working -->
	<!-- //js-files -->


</body>

</html>
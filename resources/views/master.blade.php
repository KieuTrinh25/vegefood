<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('./css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/search-form.scss') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    @yield('stylesheet')
</head>

<body class="goto-here">
    @include('./inc/header')
    <!-- END nav -->
    @yield('content')

    @include('./inc/footer')



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

		<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
		<link  href="../Jquery/jquery.multiselect.css" rel="stylesheet"/>
<link  href="../Jquery/style.css" rel="stylesheet" />
<link  href="../Jquery/prettify.css" rel="stylesheet" />
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('js/aos.js') }}"></script>
	<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js/scrollax.min.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="{{ asset ('js/google-map.js') }}"></script>
	<script src="{{ asset ('js/main.js') }}"></script> 
	
	<script src="{{ asset ('js/main.js') }}"></script>
	<script>
		$(document).ready(function(){
			 $('#location').change(function(){
				find_location($(this).val())
			 })
		});
		function find_location(code){
			$.ajax({
				type:"GET",
				url: 'http://localhost:8000/api/location?code=' + code,
				dataType:'json',
				success: function(data){
					$('#ship').val(data.ship)
					$('#ship_label').text(current_format(data.ship))
					total_payment()
				}

			})
		}
		function total_payment(){
			let ship = $('#ship').val()
			let total = $('#total').val()
			let total_payment = Number(ship) + Number(total) 
			$('#total_payment').val(total_payment)
			$('#total_payment_label').text(current_format(total_payment)) 

		}
		
		function current_format(money){
			return Intl.NumberFormat("vi-VN", {
				style: 'currency', 
				currency: 'VND',
				useGrouping: true,
				maximumSignificantDigits: 3,
			}).format(money)
		}
		
	</script>
	
</body>

</html>

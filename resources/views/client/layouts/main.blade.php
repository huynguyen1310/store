<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="assets/client/css/linearicons.css">
	<link rel="stylesheet" href="assets/client/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/client/css/themify-icons.css">
	<link rel="stylesheet" href="assets/client/css/bootstrap.css">
	<link rel="stylesheet" href="assets/client/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/client/css/nice-select.css">
	<link rel="stylesheet" href="assets/client/css/nouislider.min.css">
	<link rel="stylesheet" href="assets/client/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="assets/client/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="assets/client/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/client/css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	@include('client.layouts.header')
	<!-- End Header Area -->


    @yield('content')


	<!-- start footer Area -->
    @include('client.layouts.footer')
	<!-- End footer Area -->

	<script src="assets/client/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	crossorigin="anonymous"></script>
	<script src="assets/client/js/vendor/bootstrap.min.js"></script>
	<script src="assets/client/js/jquery.ajaxchimp.min.js"></script>
	<script src="assets/client/js/jquery.nice-select.min.js"></script>
	<script src="assets/client/js/jquery.sticky.js"></script>
	<script src="assets/client/js/nouislider.min.js"></script>
	<script src="assets/client/js/countdown.js"></script>
	<script src="assets/client/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/client/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="assets/client/js/gmaps.min.js"></script>
	<script src="assets/client/js/main.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	@if (session('message'))
		<script>
			toastr.success( '{{ session('message') }}' , {timeOut:5000});
		</script>
	@endif
	@if (session('error'))
		<script>
			toastr.error( '{{ session('error') }}' , {timeOut:5000});
		</script>
	@endif
</body>

</html>
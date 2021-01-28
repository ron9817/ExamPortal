<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> @yield('title') </title>

	<!-- AuotDice Title Icon for Each Page -->
	<link rel="icon" href="{{ asset('image/logo.png') }}" type="image/icon type">
	<!-- Reference : https://www.geeksforgeeks.org/how-to-add-icon-logo-in-title-bar-using-html/ -->
	
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
	<link href="{{asset('/css/app.css')}}" rel="stylesheet">
	<script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
	

	<!-- Bootstrap CSS CDN -->
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
	<!-- Our Custom CSS -->
	<!-- <link rel="stylesheet" href="style2.css"> -->
	<!-- Scrollbar Custom CSS -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"> -->

	@stack( 'page_css' )

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

	@stack( 'page_js' )

	{{--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}
</head>
<body>

	@yield('content')

	@include( 'loader' )

    <script type="text/javascript" src="{{asset('/js/admin-test-detailed.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('/js/admin-test-detailed.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/admin-dashboard.js')}}"></script>--}}
</body>
</html>
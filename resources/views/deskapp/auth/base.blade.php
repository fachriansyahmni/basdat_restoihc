<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/dash-deskapp/vendors/images/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/dash-deskapp/vendors/images/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/dash-deskapp/vendors/images/favicon-16x16.png') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/dash-deskapp/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/dash-deskapp/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/dash-deskapp/vendors/styles/style.css')}}">
</head>
<body class="login-page">
	@include('deskapp.auth.header')
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		@yield('main-content')
	</div>
	<!-- js -->
	<script src="{{ asset('/vendors/dash-deskapp/vendors/scripts/core.js')}}"></script>
	<script src="{{ asset('/vendors/dash-deskapp/vendors/scripts/script.min.js')}}"></script>
	<script src="{{ asset('/vendors/dash-deskapp/vendors/scripts/process.js')}}"></script>
	<script src="{{ asset('/vendors/dash-deskapp/vendors/scripts/layout-settings.js')}}"></script>
</body>
</html>
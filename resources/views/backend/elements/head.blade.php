<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('images/favicon.ico') }}" rel="apple-touch-icon">
	<link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">
	<title>My Admin | @yield('title')</title>
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin.css') }}">
	<!-- Fontawesome -->
	<link rel="stylesheet" href="{{ asset('fonts/fontawesome-pro-5.14.0-web/css/all.min.css') }}">
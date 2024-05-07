<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Metas For sharing property in social media -->
	    @stack('meta_data')

		<link rel="shortcut icon" href="{!! getFavicon() !!}">

		<meta name="mobile-web-app-capable" content="yes">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- CSS  new version start-->
		@stack('css')
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('public/css/vendors/bootstrap/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('public/css/vendors/fontawesome/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
		<!--CSS new version end-->
	</head>
<body>



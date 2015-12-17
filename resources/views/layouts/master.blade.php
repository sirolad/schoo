<!DOCTYPE html>
<!--Master Blade to be extended by all class-->
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta name="description" content="Learning Management System">
    <meta name="keywords" content="Laravel, LMS, Learning, Video Sharing">
    <meta name="author" content="Surajudeen Akande">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('images/favicon-32x32.png') }}">
    <!-- Material Design fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Material Design -->
    <link href="{{ secure_asset('css/bootstrap-material-design.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/ripples.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/bootstrap-social.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/sweetalert.css') }}">
    <link href="{{ secure_asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    @yield('custom-css')
</head>
<body>

        @include('shared.navbar')
        @include('sweet::alert')
        @yield('content')

        @include('shared.footer')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="/js/ripples.min.js"></script>
<script src="/js/material.min.js"></script>
<script type="text/javascript"></script>
<script src="/js/app.js"></script>
<script src="/js/sweetalert.min.js"></script>
@include('sweet::alert')
</body>
</html>
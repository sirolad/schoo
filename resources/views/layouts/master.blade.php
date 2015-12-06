<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Material Design fonts -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Material Design -->
  <link href="css/bootstrap-material-design.css" rel="stylesheet">
  <link href="css/ripples.min.css" rel="stylesheet">
  <link href="css/bootstrap-social.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

        @include('shared.navbar')
        @include('sweet::alert')
        @yield('content')

        @include('shared.footer')

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="/js/ripples.min.js"></script>
<script src="/js/material.min.js"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
<script src="/js/sweetalert.min.js"></script>
@include('sweet::alert')
</body>
</html>
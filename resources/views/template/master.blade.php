<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Bank Sampah - @yield('title')</title>
  <meta content="{{ csrf_token() }}" name="csrf-token" />
  <link href="{{ asset('css/bootstrap_4.0/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/new-age.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  @yield('customstyle')
  <style>
  .marquee {
    overflow: hidden;
  }
  </style>
</head>
<body id="page-top">
  <!-- Navigation -->
  @include('template.nav',['logo' => $logo])  
  @yield('content')
  @include('template.footer')
</body>
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap_4.0/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/new-age.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.marquee.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $(".marquee").show();
  $(".marquee").marquee({
    duration: 8000
  });
});
</script>
</html>

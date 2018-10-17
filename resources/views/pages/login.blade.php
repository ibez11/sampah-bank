<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tuan Di Bangarna Bank - @yield('title')</title>
  <meta content="{{ csrf_token() }}" name="csrf-token" />
  <link href="{{ asset('css/bootstrap_4.0/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" style="margin-top: 200px;">
        <form action="/login" method="post">
          <div class="form-group">
            <label for="username">Email/No. HP</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <input type="submit" class="btn btn-info" value="Login">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
      </div>
        <div class="col-md-4"></div>
    </div>
  </div>
</body>
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap_4.0/bootstrap.min.js') }}"></script>
</html>

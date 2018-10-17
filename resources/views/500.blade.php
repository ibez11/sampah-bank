<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="{{ mix('css/all.css') }}">
</head>
<body>
  <div class="alert alert-danger">
    {{ $message }}
  </div>
  <script type="text/javascript" src="{{ URL::asset('js/app.js')}}"></script>
</body>
</html>

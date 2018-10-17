<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    @include('includes.head')
  </head>
  <body>
    <!-- navbar -->
    @include('includes.nav')

    <!-- main -->
    @yield('content')

    <!-- footer -->
    @include('includes.footer')

    <!-- js file -->
    @include('includes.js_file')
  </body>
</html>

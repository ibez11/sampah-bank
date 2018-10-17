<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('includes.head-dashboard')
<body>
	@include('layouts.sidebar-employee')

	@yield('content')

	@include('includes.js_file_dashboard')
  @yield('js')
</body>
</html>

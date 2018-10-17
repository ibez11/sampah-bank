<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"> 
<head>
  @include('includes.head-dashboard')
<body>
	@include('layouts.sidebar',['logo' => $logo])

	@yield('content');

	@include('includes.js_file_dashboard')
</body>
</html>

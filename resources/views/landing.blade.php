@extends('template.master',['logo' => $logo])

@section('customstyle')
<link href="{{ asset('css/landing.css') }}" rel="stylesheet">
@endsection

@section('title')
Home
@endsection
 
@section('content')

@component('home.ads')
@endcomponent

@component('home.header', [ 'transactions' => $transactions])
@endcomponent

@component('home.vision')
@endcomponent

@component('home.gallery', [ 'galleries' => $galleries])
@endcomponent

@component('home.features',['iphone_img' => $iphone_img])
@endcomponent

@endsection
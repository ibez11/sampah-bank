@extends('template.master')

@section('customstyle')
<link href="{{ asset('css/about.css') }}" rel="stylesheet">
@endsection

@section('title')
About
@endsection

@section('content')

@component('about.mechanism')
@endcomponent

@component('about.step')
@endcomponent

@component('about.benefits')
@endcomponent

@component('about.students')
@endcomponent

@endsection
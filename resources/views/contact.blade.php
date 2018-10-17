@extends('template.master')

@section('customstyle')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection

@section('title')
Kontak Kami
@endsection

@section('content')

@component('about.contact')
@endcomponent

@endsection
@extends('template.master')

@section('customstyle')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endsection

@section('title')
Register
@endsection

@section('menu')
<ul class="navbar-nav ml-auto">
  <li class="nav-item nav-margin">
    <a class="btn btn-primary" href="/login">Login</a>
  </li>
  <li class="nav-item nav-margin">
    <a class="btn btn-primary" href="/login">Daftar</a>
  </li>
</ul>
@endsection

@section('content')
<section class="download text-center" id="register">
  <div class="container">
  <div class="heading row">
    <div class="col-lg-12 my-auto">
      <h1>Buat akun Bank sampah Anda. Tidak dikenakan biaya apapun.</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-5 my-auto">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <i class="fa fa-user"></i>
            <hr class="custom-hr">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h3>Pilih jenis akun Perorangan</h3>
            <p>Ditujukan untuk orang-orang yang ingin nabung secara personal.</p>
            <a href="/register/1" class="btn btn-register">Memulai</a>
          </div>
        </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-5 my-auto">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <i class="fa fa-user"></i>
            <hr class="custom-hr">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h3>Pilih jenis akun Instansi</h3>
            <p>Ditujukan untuk instansi yang ingin menabung secara kelompok.</p>
            <a href="/register/2" class="btn btn-register">Memulai</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection

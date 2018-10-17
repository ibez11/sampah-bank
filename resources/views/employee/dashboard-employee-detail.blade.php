@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Tambah Pegawai
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Detail Pegawai</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Detail Pegawai</h1>
    </div>
  </div><!--/.row-->

  @if($errors->has('success'))
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-success"><span class="fa fa-check"></span>&nbsp;{{ $errors->first('success') }}</div>
    </div>
  </div>
  @endif

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Detail Pegawai</div>
        <div class="panel-body">
          <ul class="user-profile">
            <li><span class="fa fa-id-card"></span></li>
            <li class="semicolon"><span>Nomor Pegawai</span></li>
            <li><span>{{ $employee->employee_no }}</span></li>
          </ul>
          <ul class="user-profile">
            <li><span class="fa fa-user"></span></li>
            <li class="semicolon"><span>Nama Lengkap</span></li>
            <li><span>{{ $employee->fullname }}</span></li>
          </ul>
          <ul class="user-profile">
            <li><span class="fa fa-home"></span></li>
            <li class="semicolon"><span>Tempat Lahir</span></li>
            <li><span>{{ $employee->birthplace }}</span></li>
          </ul>
          <ul class="user-profile">
            <li><span class="fa fa-birthday-cake"></span></li>
            <li class="semicolon"><span>Tanggal Lahir</span></li>
            <li><span>{{ $employee->birthdate }}</span></li>
          </ul>
          <ul class="user-profile">
            <li><span class="fa fa-address-card"></span></li>
            <li class="semicolon"><span>Alamat</span></li>
            <li><span>{{ $employee->address }}</span></li>
          </ul>
          <ul class="user-profile">
            <li><span class="fa fa-building"></span></li>
            <li class="semicolon"><span>Kota</span></li>
            <li><span>{{ $city }}</span></li>
          </ul>
          <ul class="user-profile">
            <li><span class="fa fa-building-o"></span></li>
            <li class="semicolon"><span>Divisi</span></li>
            <li><span>{{ $employee->name }}</span></li>
          </ul>
          <ul class="user-profile">
            <li><span class="fa fa-venus-mars"></span></li>
            <li class="semicolon"><span>Jenis Kelamin</span></li>
            <li><span>
              @if($employee->sex == 'F') Perempuan
              @endif
              @if($employee->sex == 'M') Laki-laki
              @endif
            </span></li>
          </ul>
          <ul class="user-profile">
            <li><span class="fa fa-phone"></span></li>
            <li class="semicolon"><span>Nomor HP</span></li>
            <li><span>{{ $employee->phone_number }}</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>	<!--/.main-->
      @endsection

      @section('js')
      <script src="{{ asset('js/dashboard-customer.js') }}"></script>
      @endsection

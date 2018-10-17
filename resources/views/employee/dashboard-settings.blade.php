@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Setting
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Settings</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Settings</h1>
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
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">Pengaturan Umum</div>
        <div class="panel-body">
          <form method="post" action="/save-settings2">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="amount-profit">Laba per Unit</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Rp</span>
                <input type="text" class="form-control money" id="amount-profit" name="amount-profit"
                placeholder="Masukkan laba per unit..." aria-describedby="basic-addon1">
              </div>
              <small id="min-balance-help" class="form-text">Laba ini akan digunakan untuk menghitung keuntungan yang didapatkan per unit.</small>
            </div>
            <div class="form-group">
              <label for="amount-unit">Nilai per Unit (kg)</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Rp</span>
                <input type="text" class="form-control money" id="amount-unit" name="amount-unit"
                placeholder="Masukkan nilai per unit (kg)..." aria-describedby="basic-addon1">
              </div>
              <small id="min-balance-help" class="form-text">Nilai per unit (kg) ini akan digunakan untuk konversi pada saat melakukan setoran.</small>
            </div>
            <div class="form-group">
              <label for="min-balance">Minimum Saldo Penarikan</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">Rp</span>
                <input type="text" class="form-control money" id="min-balance" name="min-balance"
                 placeholder="Masukkan minimum saldo penarikan..." aria-describedby="basic-addon2">
              </div>
              <small id="min-balance-help" class="form-text">Apabila nasabah memiliki minimal sejumlah saldo yang dimasukkan ini, maka nasabah dapat menarik uang sebelum 3 bulan.</small>
            </div>
            <div class="form-group">
              <label for="city">Kota</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2"><span class="fa fa-building-o"></span></span>
                <input type="text" class="form-control" id="city" name="city"
                 placeholder="Masukkan nama kota yang diinginkan..." aria-describedby="basic-addon2">
              </div>
              <small id="min-balance-help" class="form-text">Silahkan isi nama kota yang akan di atur harganya.</small>
            </div>
            <button type="submit" class="btn btn-primary"><span class="fa fa-floppy-o"></span>&nbsp;Simpan</button>
          </form>
        </div>
        <div>
        </div>

      </div>	<!--/.main-->
      @endsection

      @section('js')
      <script src="{{ asset('js/dashboard-customer.js') }}"></script>
      @endsection

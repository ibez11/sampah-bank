@extends('layouts.master-dashboard',['logo' => $logo])

@section('title')
Tuan Di Bangarna - Dashboard Nasabah
@endsection 

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Informasi Saldo</li>
    </ol>
  </div><!--/.row-->

  <div id="notification">
    @if($errors->has('notification'))
    <div class="alert alert-danger" role="alert">
      <span class="fa fa-exclamation-triangle"></span> <strong>Terjadi kesalahan:</strong> {{ $errors->first('notification') }}
    </div>
    @endif
  </div>

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Informasi Saldo</h1>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-xs-12 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>Saldo Total</h4>
          <p>&nbsp;</p>
          <h2>{{ "Rp " . number_format(($debit-$credit),2) }}</h2>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>Saldo Tersedia</h4>
          <p>s/d {{ $today }}</p>
          <h2>{{ "Rp " . number_format($max_withdraw,2) }}</h2>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body easypiechart-panel">
          <h4>Akumulasi Tabungan</h4>
          <p>&nbsp;</p>
          <h2>{{ $weight }} Kg</h2>
        </div>
      </div>
    </div>
  </div><!--/.row-->
  <form id="report-form" action="generate-report" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="text-center">Laporan</h4>
          </div>
          <div class="panel-body">
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Tipe Laporan
                </div>
                <div class="panel-body">
                  <select class="form-control" id="report-type" name="reporttype" required>
                    <option value="">Pilih tipe laporan...</option>
                    <option value="1">Harian</option>
                    <option value="3">Bulanan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Dari tanggal
                </div>
                <div class="panel-body">
                  <input class="form-control" id="calendar-1" name="startdate" placeholder="Masukkan tanggal mulai..." required/>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Sampai tanggal
                </div>
                <div class="panel-body">
                  <input class="form-control" id="calendar-2" name="enddate" placeholder="Masukkan tanggal akhir..." required/>
                </div>
              </div>
            </div>
            <button id="report-btn" type="submit" class="btn btn-lg btn-success center-block">Lihat Laporan</button>
          </div>
        </div>
      </div>
    </div><!--/.row-->
  </form>

  <div id="loader-container">
  	<div id="loader" style="display: none;" class="spinner">
  		<div class="rect1"></div>
  		<div class="rect2"></div>
  		<div class="rect3"></div>
  		<div class="rect4"></div>
  		<div class="rect5"></div>
  	</div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Grafik Keuangan
        </div>
        <div class="panel-body">
          <div>
            @if(empty($chartjs) == false)
            {!! $chartjs->render() !!}
            @else
              <div class="alert alert-info">Masukkan tanggal dan tipe laporan untuk memulai...</div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>	<!--/.main-->
@endsection

@section('js')
<script src="{{ asset('js/dashboard-customer.js') }}"></script>
@endsection

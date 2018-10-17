@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Daftar Kota &amp; Harga
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Daftar Kota &amp; Harga</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Daftar Kota &amp; Harga</h1>
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
        <div class="panel-heading">Daftar Kota &amp; Harga</div>
        <div class="panel-body">
          <a href="{{ route('city-list-add') }}" class="btn"><label class="label label-primary"><span class="fa fa-plus"></span>Tambah Kota</label></a>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Kota</th>
                <th>Saldo Minimum</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <?php $no = 1; ?>
            <tbody>
              @foreach($cities as $city)
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ ucfirst($city->city) }}</td>
                  <td>{{ "Rp. ".number_format($city->minimum_balance, 2) }}</td>
                  <td>
                    <a href="{{ route('city-list-edit', $city->id) }}" class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                    <a href="{{ route('delete-settings', $city->id) }}" class="btn btn-primary btn-sm"><span class="fa fa-trash-o"></span></a>
                  </td>
                </tr>
                <?php $no++; ?>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>	<!--/.main-->
      @endsection

      @section('js')
      <script src="{{ asset('js/dashboard-customer.js') }}"></script>
      @endsection

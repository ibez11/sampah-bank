@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Laporan Pengeluaran
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Laporan Pengeluaran</li>
    </ol>
  </div><!--/.row-->

  <div id="notification">
    @if($errors->has('error'))
    <div class="alert alert-danger" role="alert">
      <span class="fa fa-exclamation-triangle"></span> <strong>Terjadi kesalahan:</strong> {{ $errors->first('error') }}
    </div>
    @endif
  </div>

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Laporan Pengeluaran dan Pemasukkan</h1>
    </div>
  </div><!--/.row-->

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="text-center">Laporan Pengeluaran dan Pemasukkan</h4>
          </div>
          <div class="panel-body">
            <div class="col-md-12">
              <table class="table table-striped">
                <thead>
                  <th>No.</th>
                  <th>Tanggal Transaksi</th>
                  <th>Jumlah Pemasukkan</th>
                  <th>Jumlah Pengeluaran</th>
                </thead>
                <?php $no = 1; ?>
                <tbody>
                  @foreach($transactions as $transaction)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $transaction->created_at->toDateString() }}</td>
                    <td>{{ "Rp. ".number_format($transaction->amount_profit, 2) }}</td>
                    @if($transaction->profit == 0)
                    <td></td>
                    @else
                      <td>{{ "Rp. ".number_format($transaction->amount_used, 2) }}</td>
                    @endif
                  </tr>
                  <?php $no++; ?>
                  @endforeach
                  <tr>
                    <td colspan="2"><strong>Total Pemasukkan</strong></td>
                    <td><strong>{{ "Rp. ".number_format($total_profit, 2) }}</strong></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Total Pengeluaran</strong></td>
                    <td></td>
                    <td><strong>{{ "Rp. ".number_format($total_op_costs, 2) }}</strong></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div><!--/.row-->
  <div id="loader-container">
    <div id="loader" style="display: none;" class="spinner">
      <div class="rect1"></div>
      <div class="rect2"></div>
      <div class="rect3"></div>
      <div class="rect4"></div>
      <div class="rect5"></div>
    </div>
  </div>
</div>	<!--/.main-->
@endsection

@section('js')
<script src="{{ asset('js/dashboard-customer.js') }}"></script>
@endsection

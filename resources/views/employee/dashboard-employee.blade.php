@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Dashboard Employee
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Transaksi terakhir</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Transaksi Terakhir</h1>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">Transaksi Terakhir</div>
        <div class="panel-body">
          <ul class="tsc">
            @forelse($transactions as $transaction)
            <li class="transaction clearfix">
              <div class="clearfix">
              <div class="header"><small class="text-muted">{{ $transaction->created_at->diffForHumans() }}</small></div>
                @if($transaction->is_debit == 1)
                <p>Nasabah <strong>{{ $transaction->fullname }}</strong> telah menambahkan <strong>{{ round($transaction->amount_kg) }} Kg</strong> sampah sejumlah <strong>Rp. {{ number_format($transaction->amount_money, 2) }}</strong></p>
                @else
                <p>Nasabah <strong>{{ $transaction->fullname }}</strong> telah menarik sejumlah <strong>Rp. {{ number_format($transaction->amount_used, 2) }}</strong></p>
                @endif
              </div>
            </li>
            @empty
            <p class="text-center">Transaksi Belum Ada, Silahkan menabung terlebih dahulu.</p>
            @endforelse
          </ul>
        </div>
    <div>
  </div>

</div>	<!--/.main-->
@endsection

@section('js')
<script src="{{ asset('js/dashboard-customer.js') }}"></script>
@endsection

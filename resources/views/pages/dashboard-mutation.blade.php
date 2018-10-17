@extends('layouts.master-dashboard')

@section('title')
Tuan Di Bangarna - Mutasi Rekening
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Mutasi Rekening</li>
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
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-body">
        <form action="/dashboard-mutation-search" method="post">
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
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="col-md-4" style="position: relative; top: 70px;">
            <button id="report-btn" type="submit" class="btn btn-lg btn-warning">Cari transaksi</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Mutasi Rekening
          <a href="/dashboard-mutation" class="btn btn-warning pull-right">Lihat semua</a>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <table class="table table-striped">
              <thead>
                <th>No.</th>
                <th>Tanggal Transaksi</th>
                <th>Kota</th>
                <th>Deskripsi</th>
                <th>Jenis Barang</th>
                <th>Berat</th>
                <th>Harga Per Kilogram</th>
                <th>Jumlah Uang</th>
              </thead>
              <?php
              $no = 1;
              ?>
              <tbody>
              @if(!empty($transactions))
              @foreach($transactions as $transaction)
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $transaction->created_at->format('d M Y') }}</td>
                  <td>{{ $transaction->city }}</td>
                  @if($transaction->is_debit == 0)
                  <td>Penarikan</td>
                  @else
                  <td>Penyetoran</td>
                  @endif
                  @if($transaction->is_debit == 0)
                  <td>-</td>
                  @else
                    <td>{{ $transaction->product }}</td>
                  @endif
                  @if($transaction->is_debit == 1)
                  <td>{{ $transaction->amount_kg }} Kg</td>
                  @else
                  <td>-</td>
                  @endif
                  @if($transaction->is_debit == 1)
                  <td>Rp. {{ number_format($transaction->amount_unit, 2) }}</td>
                  @else
                  <td>-</td>
                  @endif

                  @if($transaction->is_debit == 1)
                  <td>Rp. {{ number_format($transaction->amount_money, 2) }}</td>
                  @else
                  <td>Rp. {{ number_format($transaction->amount_used, 2) }}</td>
                  @endif
                </tr>
                <?php $no++; ?>
              @endforeach

              <tr>
                <td colspan="5"><strong>Total Penarikan</strong></td>
                <td>{{ "Rp " . number_format($credit,2) }}</td>
              </tr>
              <tr>
                <td colspan="5"><strong>Total Penyetoran</strong></td>
                <td>{{ "Rp " . number_format(($debit),2) }}</td>
              </tr>
              <tr>
                <td colspan="5"><strong>Total Saldo Saat Ini</strong></td>
                <td>{{ "Rp " . number_format(($debit-$credit),2) }}</td>
              </tr>
              @endif
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div> <!--end of row -->

    <!-- another way to show debit, credit, and current balance
    <div class="row">
      <div class="col-md-12">
        <div class="col-xs-12 col-md-4">
          <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
              <h4>Total Penarikan</h4>
              <h1>{{ "Rp " . number_format($credit,2) }}</h1>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-4">
          <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
              <h4>Total Penyetoran</h4>
              <h1>{{ "Rp " . number_format(($debit),2) }}</h1>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-4">
          <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
              <h4>Total Saldo saat ini</h4>
              <h1>{{ "Rp " . number_format(($debit-$credit),2) }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    </.row-->

</div>	<!--/.main-->
@endsection

@section('js')
<script src="{{ asset('js/dashboard-customer.js') }}"></script>
@endsection

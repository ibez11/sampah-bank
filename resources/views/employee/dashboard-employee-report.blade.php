@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Laporan Rekening Nasabah
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Laporan Rekening Nasabah</li>
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
      <h1 class="page-header">Laporan Rekening Nasabah</h1>
    </div>
  </div><!--/.row-->

  <form id="report-form" action="generate-employee-report" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="text-center">Laporan Rekening</h4>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Email Nasabah
                  </div>
                  <div class="panel-body">
                    <input class="form-control" name="email" @if($errors->has('error') == false) value="{{ old('email') }}" @endif
                    placeholder="Masukkan email nasabah..."/>
                    <small id="min-balance-help" class="form-text">Masukkan email nasabah jika ingin melihat pemasukan/pengeluaran dari nasabah yang bersangkutan</small>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Tipe Laporan
                  </div>
                  <div class="panel-body">
                    <select class="form-control" id="report-type" name="reporttype" required>
                      <option value="">Pilih tipe laporan...</option>
                      <option value="1" @if(old('reporttype') == 1) selected @endif>Harian</option>
                      <option value="3" @if(old('reporttype') == 3) selected @endif>Bulanan</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Dari tanggal
                  </div>
                  <div class="panel-body">
                    <input class="form-control" id="calendar-1" name="startdate" value="{{ old('startdate') }}"
                    placeholder="Masukkan tanggal mulai..." required/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Sampai tanggal
                  </div>
                  <div class="panel-body">
                    <input class="form-control" id="calendar-2" name="enddate" placeholder="Masukkan tanggal akhir..." value="{{ old('enddate') }}" required/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Institusi
                  </div>
                  <div class="panel-body">
                    <select id="institution-combobox" name="institution" class="form-control">
                        <option value="-1" selected>-</option> 
                        @foreach($institutions as $institution)
                        <option value="{{ $institution->id }}">{{ $institution->name }}</option> 
                          @endforeach
                    </select>
                  </div>
                  <div id="progress-institution" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; height: 10px; display: none;">
                      <span class="sr-only">Memuat data...</span>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Subinstitusi
                  </div>
                  <div class="panel-body">
                      <select id="subinstitution-combobox" name="subinstitution" class="form-control">
                        {{-- filled via AJAX --}}
                      </select>
                      <small id="min-balance-help" class="form-text">Kosongkan subinstitusi jika ingin menyaring data hanya dari institusi terkait</small>
                  </div>
                </div>
              </div>
            </div>
            <button id="report-btn" type="submit" class="btn btn-lg btn-success center-block">Lihat Laporan</button>
          </div>
        </div>
      </div>
    </div><!--/.row-->
  </form>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Laporan Detail
        </div>
        <div class="panel-body">
          <div>
            <table class="table table-bordered">
              <thead>
                <th>No.</th>
                <th>Deskripsi</th>
                <th>Nama Nasabah</th>
                <th>Institusi</th>
                <th>Subinstitusi</th>
                <th>Jenis Sampah</th>
                <th>Tanggal Transaksi</th>
                <th colspan="3">Nilai Transaksi</th>
                <th>Akumulasi</th>
              </thead>
              <thead>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td colspan="2">Debit</td>
                  <td>Kredit</td>
                  <td>&nbsp;</td>
                </tr>
              </thead>
              <thead>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Kotor</td>
                <td>Bersih</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @if(!empty($transactions))
                @foreach($transactions as $trans)
                <tr>
                  <td>{{ $no }}</td>
                  <td>
                    @if($trans->is_debit == 1)
                      Deposit/Setoran
                    @else
                      @if(!empty($trans->operational))
                        Biaya Operasional
                      @else
                        Penarikan
                      @endif
                    @endif</td>
                  <td>{{ $trans->fullname . ' (' . $trans->email . ')'}}</td>
                  <td>{{ $trans->institution_name }}</td>
                  <td>{{ $trans->subinstitution_name }}</td>
                  <td>{{ $trans->is_debit == 1 ? $trans->product : '' }}</td>
                  <td>{{ $trans->date }}</td>
                  <td>@if($trans->is_debit == 1) {{ "Rp. ".number_format($trans->amount_money,2) }} @else - @endif</td>
                  <td>@if($trans->is_debit == 1) {{ "Rp. ".number_format($trans->amount_profit,2) }} @else - @endif</td>
                  <td>@if($trans->is_debit == 0) {{ "Rp. ".number_format($trans->amount_used,2) }} @else - @endif</td>
                  <td>
                    @if($no == count((array)$transactions))
                    <strong>{{ "Rp. ".number_format($trans->accumulative, 2) }} <br/>(saldo akhir)</strong>
                    @else
                    {{ "Rp. ".number_format($trans->accumulative, 2) }}
                    @endif
                  </td>
                </tr>
                <?php $no++; ?>
                @endforeach
                <tfoot>
                  <td colspan="7">&nbsp;</td>
                  <td>{{ "Rp. ".number_format($totaldebit,2) }}</td>
                  <td>{{ "Rp. ".number_format($totalprofit,2) }}</td>
                  <td>{{ "Rp. ".number_format($totalcredit,2) }}</td>
                  <td>&nbsp;</td>
                </tfoot>
                @endif
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

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
<script src="{{ asset('js/dashboard-edit-customer.js') }}"></script>
@endsection

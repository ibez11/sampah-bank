@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Transaksi
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Input Data Transaksi</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Input Data Transaksi</h1>
      <p>Lokasi Sekarang: <strong>{{ $city }}</strong></p>
      <input type="hidden" id="city-id" value="{{ $city_id }}"/>
    </div>
  </div><!--/.row-->

  @if($errors->has('user'))
  <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> {{ $errors->first('user') }}</div>
      </div>
  </div>
  @endif

  @if($errors->has('is_debit'))
    @if($errors->first('is_debit') == 1)
  <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success"><span class="fa fa-check"></span> [DEBIT] Transaksi sejumlah {{ number_format($errors->first('amount_money'), 2) }} telah berhasil ditambahkan pada akun {{ $errors->first('customername') }}</div>
      </div>
  </div>
    @endif
      @if($errors->first('is_debit') == 0)
      <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success"><span class="fa fa-check"></span> [KREDIT] Transaksi sejumlah {{ number_format($errors->first('amount_used'),2) }} telah berhasil ditarik dari akun {{ $errors->first('customername') }}</div>
          </div>
      </div>
      @endif
  @endif

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">Input Data Transaksi</div>
        <div class="panel-body">
          <div class="col-md-12">
          <form action="/dashboard-employee" method="post">
            {{ csrf_field() }}
              <div class="form-group row">
                <label for="is_debit" class="col-4 col-form-label control-label">Transaksi</label>
                <div class="col-8">
                  <select id="select-type" name="is_debit" class="form-control">
                    <option value="1" @if(old('is_debit') == 1) selected @endif>Debit</option>
                    <option value="0" @if(old('is_debit') == 0 && old('is_debit') != null) selected @endif>Kredit</option>
                  </select>
                </div>
              </div>
              <div id="product-div" class="form-group row">
                  <label for="product" class="col-4 col-form-label control-label">Pilih Jenis Sampah</label>
                  <div class="col-8">
                    <select class="form-control" id="products" name="products">
                      @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->jenis_barang }}</option>
                      @endforeach
                    </select>
                  </div>
                  <p id="loading"><small>Memuat harga...</small></p>
                </div>
                <div id="amount-unit-div" class="form-group row">
                    <label for="amount-unit" class="col-4 col-form-label control-label">Harga/kg <small>*sesuai jenis sampah dipilih dan kota di menu Pengaturan</small></label>
                    <div class="col-8">
                      <input id="amount-unit" name="amount_unit" type="text" class="form-control" required readonly>
                    </div>
                  </div>
              <div id="amount-kg-div" class="form-group row">
                <label for="amount_kg" class="col-4 col-form-label control-label">Massa Sampah (kg)</label>
                <div class="col-8">
                  <input id="amount_kg" step=".01" min="0" max="99999" name="amount_kg" type="number" class="form-control" value="{{ old('amount_kg') }}" readonly required>
                </div>
              </div>
              <div id="amount-money-div" class="form-group row">
                <label for="amount_money" class="col-4 col-form-label control-label">Total Uang</label>
                <div class="col-8">
                  <input id="amount-profit-kg" type="hidden" name="amount_profit_kg"/>
                  <input id="amount-profit" type="hidden" name="amount_profit"/>
                  <input name="amount_money" type="text" class="form-control" readonly value="{{ old('amount_money') }}">
                </div>
              </div>
              <div id="amount-used-div" class="form-group row">
                <label for="amount_used" class="col-4 col-form-label control-label">Jumlah Penarikan</label>
                <div class="col-8">
                  <input name="amount_used" type="text" class="form-control money" required value="{{ old('amount_used') }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-4 col-form-label control-label">Email Nasabah</label>
                <div class="col-8">
                  <input name="email" type="email" class="form-control" value="{{ empty($emailCustomer) ?  old('email') : $emailCustomer}}" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-5"></div>
                <div class="col-3">
                  <input class="btn btn-info" type="submit" name="submit" value="Submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>	<!--/.main-->
@endsection

@section('js')
<script src="{{ asset('js/dashboard-create.js') }}" type="text/javascript"></script>
@endsection

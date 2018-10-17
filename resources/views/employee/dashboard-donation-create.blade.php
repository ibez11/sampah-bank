@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Tambah Sumbangan
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Tambah Sumbangan</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Tambah Sumbangan</h1>
    </div>
  </div><!--/.row-->

  @if($errors->has('error'))
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger"><span class="fa fa-exclamation-circle"></span>&nbsp;{{ $errors->first('error') }}</div>
    </div>
  </div>
  @endif

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
        <div class="panel-heading">Tambah Sumbangan</div>
        <div class="panel-body">
          <form action="/donation" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="identity_no">Pilih Nasabah</label>
              <select id="customers" class="form-control" name="customer" required>
                  <option value="-1">Ketik nama atau email nasabah untuk mencari...</option>
                  @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->fullname . ' (' . $customer->email . ')' }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="amount_unit">Jumlah Sumbangan</small></label>
              <input type="text" name="amount_unit" class="form-control money" placeholder="Jumlah Sumbangan..."
                value="{{ old('amount_unit') }}" required>
            </div>
            <div class="form-group">
              <label for="message">Pesan</label>
              <textarea rows="4" name="message" class="form-control" placeholder="Pesan..." required>{{ old('message') }}</textarea>
            </div>
            <div class="form-group">
              <label for="transaction_date">Tanggal Transaksi</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar"></i></span>
                <input class="form-control" id="calendar-1" name="transaction_date" placeholder="Tanggal transaksi..." required
                value="{{ old('transaction_date') }}"/>
              </div>
            </div>
            <div class="form-group">
              <input class="btn btn-info" type="submit" name="submit" value="Simpan">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>	<!--/.main-->

      @endsection

      @section('js')
      <script src="{{ asset('js/autocomplete.js') }}"></script>
      <script src="{{ asset('js/dashboard-donation.js') }}"></script>
      @endsection

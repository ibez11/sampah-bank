@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Tambah operasional
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li><a href="/operating-costs">
        Biaya Operasional
      </a></li>
      <li class="active">Tambah Operasional</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Tambah Operasional</h1>
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
        <div class="panel-heading">Tambah Operasional</div>
        <div class="panel-body">
          <form method="post" action="/operating-costs-add">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="amount_unit">Jumlah Biaya</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Rp</span>
                <input type="text" class="form-control money" id="amount_unit" name="amount_unit"
                placeholder="Masukkan jumlah biaya operasional..." aria-describedby="basic-addon1">
              </div>
              <small id="min-balance-help" class="form-text">Masukkan biaya operasional.</small>
            </div>
            <div class="form-group">
              <label for="description">Deskripsi</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2"><i class="fa fa-file-text"></i></span>
                <input type="text" class="form-control" id="description" name="description"
                 placeholder="Deskripsi biaya operasional..." aria-describedby="basic-addon2">
              </div>
              <small id="min-balance-help" class="form-text">Masukkan deskripsi atas biaya operasional tersebut.</small>
            </div>
            <div class="form-group">
              <label for="transaction_date">Tanggal Transaksi</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar"></i></span>
                <input class="form-control" id="calendar-1" name="transaction_date" placeholder="Masukkan tanggal transaksi..." required/>
              </div>
              <small id="min-balance-help" class="form-text">Masukkan tanggal transaksi.</small>
            </div>
            <button type="submit" class="btn btn-primary"><span class="fa fa-floppy-o"></span>&nbsp;Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> <!--/.main-->
@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    var today = new Date();
    $('#calendar-1').datepicker('setDate', today);
  });
</script>
@endsection

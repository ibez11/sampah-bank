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
      <li><a href="{{ Route('city-list') }}">
          Daftar Kota &amp; Harga
        </a></li>
      <li class="active">Ubah Kota &amp; Harga</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Ubah Kota &amp; Harga</h1>
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
        <div class="panel-heading">
          @if(empty($city) == false)
          Edit Kota {{ ucfirst($city) }}
          @else
          Tambah Kota
          @endif
        </div>
        <div class="panel-body">
          <form method="post" 
          @if(empty($id) == false)
          action="{{ route('update-settings', $id) }}"
          @else
          action="{{ route('create-settings') }}"
          @endif
          >
            {{ csrf_field() }}
            <div class="form-group">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Jenis Sampah</th>
                        <th>Harga/kg&nbsp;<span class="fa fa-question-circle" data-toggle="tooltip"
                            data-placement="top" title="Harga per kg ini akan digunakan untuk konversi pada saat melakukan setoran"></span></th>
                        <th>Laba/kg&nbsp;<span class="fa fa-question-circle" data-toggle="tooltip"
                          data-placement="top" title="Masukkan laba per kg yang diinginkan. Nilai ini digunakan untuk menghitung laba pada laporan akhir."></span></th>
                      </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <tbody>
                      @foreach($products as $product)
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $product->jenis_barang }}</td>
                          <td>Rp. <input type="number" name="{{ "unit-" . $product->id }}" value="{{ $product->amount_unit }}" step='0.01' value='0.00'/></td>
                          <td>Rp. <input type="number" name="{{ "profit-" . $product->id }}" value="{{ $product->amount_profit }}" step='0.01' value='0.00'/></td>
                        </tr>
                        <?php $no++; ?>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="form-group">
              <label for="min-balance">Kota</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2"><span class="fa fa-map-marker"></span></span>
                <input type="text" class="form-control" id="city" name="city" 
                 placeholder="Masukkan nama kota..." aria-describedby="basic-addon2"
                 @if(empty($city) == false)
                 value="{{ $city }}">
                 @endif
              </div>
            </div>
            <div class="form-group">
              <label for="min-balance">Minimum Saldo Penarikan</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">Rp</span>
                <input type="text" class="form-control money" id="min-balance" name="min-balance"  
                @if(empty($minimum_balance) == false)
                value="{{ $minimum_balance }}"
                @endif
                 placeholder="Masukkan minimum saldo penarikan..." aria-describedby="basic-addon2">
              </div>
              <small id="min-balance-help" class="form-text">Apabila nasabah memiliki minimal sejumlah saldo yang dimasukkan ini, maka nasabah dapat menarik uang sebelum 3 bulan.</small>
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

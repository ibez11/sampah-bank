@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Daftar Jenis Sampah
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Daftar Jenis Sampah</li>
      </ol>
    </div><!--/.row-->
  
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Daftar Jenis Sampah</h1>
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
            <div class="panel-heading">Daftar Jenis Sampah</div>
            <div class="panel-body">
              @if(empty($city) == false)
              <p class="alert alert-info">Menampilkan konfigurasi untuk kota <span style="color: black; font-weight: bold;">{{ $city }}</span></p>
              @else
              <p class="alert alert-info">Anda masuk sebagai
              <span style="color: black; font-weight: bold;">Owner</span>. 
                Masuk ke menu <span style="color: black; font-weight: bold;">Daftar Kota &amp; Harga</span>
                untuk mengatur harga/kg dan laba/kg untuk setiap kota.</p>
              @endif
              <a href="{{ route('add-product') }}" class="btn"><label class="label label-primary"><span class="fa fa-plus"></span>Tambah Jenis Sampah Baru</label></a>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Jenis Sampah</th>
                    @if($type == 'cashier')
                    <th>Harga/kg</th>
                    <th>Laba/kg</th>
                    @endif
                  </tr>
                </thead>
                <?php $no = 1; ?>
                <tbody>
                  @foreach($products as $product)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $product->jenis_barang }}</td>
                      @if($type == 'cashier')
                      <td>Rp. {{ number_format($product->amount_unit, 2) }}</td>
                      <td>Rp. {{ number_format($product->amount_profit, 2) }}</td>
                      @endif
                      <td>
                        <a href="{{ route('edit-product', $product->id) }}" class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                        <a href="{{ route('delete-product', $product->id) }}" class="btn btn-primary btn-sm"><span class="fa fa-trash-o"></span></a>
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
</div>
@endsection
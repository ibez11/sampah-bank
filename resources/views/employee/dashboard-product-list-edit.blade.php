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
      <li>
        Daftar Jenis Sampah
      </li>
      <li class="active">
          @if(empty($product) == false)
          Ubah Jenis Sampah
        @else
          Tambah Jenis Sampah
        @endif  
      </li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
          @if(empty($product) == false)
          Ubah Jenis Sampah
        @else
          Tambah Jenis Sampah
        @endif  
      </h1>
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
          @if(empty($product) == false)
            Ubah Jenis Sampah: {{ $product->jenis_barang }}
          @else
            Tambah Jenis Sampah
          @endif  

        </div>
        <div class="panel-body">
          <form method="post" 
          @if(empty($product) == false)
          action="{{ Route('update-product', $product->id) }}"
          @else
          action="{{ Route('create-product') }}"
          @endif
          >
            {{ csrf_field() }}
            <div class="form-group">
              <label for="city">Jenis Sampah</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2"><span class="fa fa-trash-o"></span></span>
                <input type="text" class="form-control" id="jenis-barang" name="jenis-barang" 
                @if(empty($product) == false)
                value="{{ $product->jenis_barang }}"
                @endif
                 placeholder="Masukkan nama jenis sampah..." aria-describedby="basic-addon2">
              </div>
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

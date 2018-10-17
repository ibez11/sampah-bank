@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Lihat Foto
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Galeri Foto</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      @if(empty($photo))
      <h1 class="page-header">Tambah ke Galeri Foto</h1>
      @else
      <h1 class="page-header">Ubah Foto</h1>
      @endif
    </div>
  </div><!--/.row-->

  @if($errors->has('success'))
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-success"><span class="fa fa-check"></span>&nbsp;{{ $errors->first('success') }}</div>
    </div>
  </div>
  @elseif($errors->has('error'))
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger"><span class="fa fa-exclamation-circle"></span>&nbsp;{{ $errors->first('error') }}</div>
    </div>
  </div>
  @endif

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
            @if(empty($photo))
            Tambah ke Galeri Foto
            @else
            Ubah Foto: {{ $photo->title }}
            @endif
        </div>
        <div class="panel-body">
          <form action="{{ !empty($photo) ? route('gallery.update', $photo->id) : route('gallery.store') }}" method="post">
            {{ empty($photo) ? method_field('POST') : method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="form-group">
              <label for="title">Judul Foto</label>
              <input type="text" name="title" class="form-control" placeholder="Judul Foto..." value="{{ !empty($photo) ? $photo->title : old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Foto</label>
                <textarea rows="3" name="description" class="form-control" placeholder="Deskripsi Foto..." required>{{ !empty($photo) ? $photo->description : old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label>Konten Foto</label>
                <p><small>Pastikan foto Anda berukuran 1280x720 piksel, atau kami akan mengubah ukuran foto Anda</small></p>
                <div id="fileupload" class="dropzone"></div>
                @if(!empty($photo))
                <p><img src={{ $photo->path }} width="400"/></p>
                @endif
            </div>
            <div class="form-group">
                <label>Diubah terakhir oleh</label>
                @if(!empty($photo))
                <p>{{ $photo->fullname }} ({{  $photo->email }})</p>
                @else
                <p>Belum tersedia</p>
                @endif
            </div>
            <div class="form-group">
              <input class="btn btn-info" type="submit" name="submit" value="Submit">
              <a href={{ url('/gallery') }} class="btn btn-danger" name="cancel">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>	<!--/.main-->
      @endsection

      @section('js')
      <script src="{{ asset('js/dashboard-customer.js') }}"></script>
      <script src="{{ asset('js/dashboard-edit-employee.js') }}"></script>
      <script src="{{ asset('js/uploader.js') }}"></script>
      @endsection

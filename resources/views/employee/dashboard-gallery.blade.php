@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Galeri Foto
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Galeri Foto</li>
    </ol>
  </div><!--/.row-->

  @if($errors->has('success'))
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-success"><span class="fa fa-check"></span>&nbsp;{{ $errors->first('success') }}</div>
    </div>
  </div>
  @endif

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Galeri Foto</h1>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">Galeri Foto</div>
        <div class="panel-body">
            <a href="{{ route('gallery.create') }}" class="btn"><label class="label label-primary"><span class="fa fa-plus"></span>Tambah Foto ke Galeri</label></a>
            <hr/>
            <?php $index = 0; ?>
              @foreach($galleries as $photo)
                @if($index % 3 == 0)
                  <div class="galleries row">
                @endif

                @component('home.photo', ['photo' => $photo, 'isAdmin' => true])
                @endcomponent
                
                @if($index % 3 == 2)
                  </div>
                @endif
                <?php $index++; ?>
              @endforeach
              <div class="pull-right">
                {{ $galleries->links() }}
              </div>
        </div>
    <div>
  </div>

</div>	<!--/.main-->
@endsection

@section('js')
<script src="{{ asset('js/dashboard-customer.js') }}"></script>
@endsection

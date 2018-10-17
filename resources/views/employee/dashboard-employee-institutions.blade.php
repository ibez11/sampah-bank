@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Data Institusi
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Data Institusi</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Data Institusi</h1>
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
        <div class="panel-heading">Data Institusi</div>
        <div class="panel-body">
          <a href="{{ route('institution.create') }}" class="btn"><label class="label label-primary"><span class="fa fa-plus"></span>Tambah Institusi</label></a>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Institusi</th>
                <th>Deskripsi</th>
                <th>Tanggal Bergabung</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <?php $no = 1; ?>
            <tbody>
              @foreach($institutions as $institution)
              <tr>
                <td>{{ $no }}</td>
                <td>{{ $institution->name }}</td>
                <td>{{ $institution->description }}</td>
                <td>{{ empty($institution->date) ? 'Tidak tersedia' : $institution->date }}</td>
                <td>
                  <div class="row">
                      <div class="col-md-3">
                          <a href="{{ route('institution.edit', $institution->id) }}" class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                      </div>
                      <div class="col-md-9">
                          <form action="{{ route('institution.destroy', $institution->id) }}" method="post">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus institusi ini? Seluruh nasabah yang menggunakan institusi ini akan TETAP ADA, namun data institusi tidak dapat dikembalikan.')"><span class="fa fa-trash-o"></span></button>
                            </form>
                      </div>
                  </div>
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
</div>	<!--/.main-->
      @endsection

      @section('js')
      <script src="{{ asset('js/dashboard-customer.js') }}"></script>
      @endsection

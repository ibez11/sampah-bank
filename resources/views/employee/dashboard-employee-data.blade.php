@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Data Pegawai
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Data Pegawai</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Data Pegawai</h1>
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
        <div class="panel-heading">Data Pegawai</div>
        <div class="panel-body">
          <a href="{{ route('employee.create') }}" class="btn"><label class="label label-primary"><span class="fa fa-plus"></span>Tambah Pegawai</label></a>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Login Terakhir</th>
                <th>Tanggal Bergabung</th>
                <th>Detail</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <?php $no = 1; ?>
            <tbody>
              @foreach($user_employees as $users)
              <tr>
                <td>{{ $no }}</td>
                <td>{{ $users->email }}</td>
                @if($users->last_login == null)
                  <td></td>
                @else
                  <td>{{ $users->last_login->diffForHumans() }}</td>
                @endif
                <td>{{ $users->created_at->diffForHumans() }}</td>
                <td>
                  <a href="{{ route('employee.show', $users->employee_id) }}" class="btn btn-primary">Lihat detail</a>
                </td>
                <td>
                  <div class="row">
                      <div class="col-md-3">
                          <a href="{{ route('employee.edit', $users->employee_id) }}" class="btn btn-warning btn-sm"><span class="fa fa-pencil-square-o"></span></a>
                      </div>
                      <div class="col-md-9">
                          <form action="{{ route('employee.destroy', $users->employee_id) }}" method="post">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus pegawai ini?')"><span class="fa fa-trash-o"></span></button>
                            </form>
                      </div>
                  </div>
                  <!--<a href="{{ route('employee.destroy', $users->employee_id) }}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus pegawai ini?')"><span class="fa fa-trash-o"></span></a>-->
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

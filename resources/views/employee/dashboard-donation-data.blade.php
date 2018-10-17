@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Daftar Sumbangan
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Daftar Sumbangan</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Daftar Sumbangan</h1>
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
        <div class="panel-heading">Daftar Sumbangan</div>
        <div class="panel-body">
          <a href="{{ route('donation.create') }}" class="btn"><label class="label label-primary"><span class="fa fa-plus"></span>Tambah Sumbangan</label></a>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Nasabah</th>
                <th>Institusi</th>
                <th>Subinstitusi</th>
                <th>Jumlah Sumbangan</th>
                <th>Pesan</th>
                <th>Tanggal Transaksi</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <?php $no = 1; ?>
            <tbody>
              @foreach($donations as $donation)
              <tr>
                <td>{{ $no }}</td>
                <td>{{ $donation->fullname }}</td>
                <td>{{ $donation->institution }}</td>
                <td>{{ $donation->subinstitution }}</td>
                <td>{{ number_format($donation->amount_unit, 2) }}</td>
                <td>{{ $donation->message }}</td>
                <td>{{ $donation->trans_date_str }}</td>
                <td>
                  <div class="row">
                      <div class="col-md-12">
                          <form action="{{ route('donation.destroy', $donation->id) }}" method="post">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus sumbangan ini?')"><span class="fa fa-trash-o"></span></button>
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

      @endsection

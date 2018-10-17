@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Biaya Operasional
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Biaya Operasional</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Biaya Operasional</h1>
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
        <div class="panel-heading">Biaya Operasional
          <a href="/operating-costs-add" class="btn btn-warning pull-right">Tambah Operasional</a>
        </div>
        <div class="panel-body">
          <table class="table table-striped">
            <thead>
              <th>No.</th>
              <th>Tanggal Transaksi</th>
              <th>Deskripsi Operasional</th>
              <th>Biaya Operasional</th>
              <th>Aksi</th>
            </thead>
            <?php $no = 1; ?>
            <tbody>
              @foreach($operating_costs as $operating_cost)
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $operating_cost->transaction_date }}</td>
                  <td>{{ $operating_cost->description }}</td>
                  <td>{{ "Rp. ".number_format(round($operating_cost->amount_unit), 2) }}</td>
                  <td>
                    <a href="{{ route('operating-costs-delete', $operating_cost->id) }}" class="label label-danger">Delete</a>
                  </td>
                </tr>
              <?php $no++; ?>
              @endforeach
                <tr>
                  <td colspan="3"><strong>Total Biaya Operasional</strong></td>
                  <td>{{ "Rp. ".number_format(round($total_costs), 2) }}</td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div><!--/.main-->
@endsection

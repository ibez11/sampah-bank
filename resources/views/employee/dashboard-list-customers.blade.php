@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Data Nasabah
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Data Nasabah</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Data Nasabah</h1>
    </div>
  </div><!--/.row-->

  @if($errors->has('message'))
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger"><span class="fa fa-exclamation-circle"></span>&nbsp;{{ $errors->first('message') }}</div>
    </div>
  </div>
  @endif

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
        <div class="panel-heading">Data Nasabah</div>
        <div class="panel-body">
          <div class="col-md-12">
            <form>
              <div class="form-group">
                <input type="text" name="query" class="form-control" placeholder="Ketik untuk mencari nama lengkap atau email..."
                  value={{ empty($query) ? '' : $query }}>
              </div>
            </form>
            <table class="table table-striped">
              <thead>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Jumlah Sampah dalam kg</th>
                <th>Total Saldo</th>
                <th>Tanggal Bergabung</th>
                <th>Ubah Detail</th>
                <th>Hapus Nasabah</th>
              </thead>
              <?php
              $no = 1;
              $total_balance = 0;
              $total_weight = 0;
               ?>
              <tbody>
                @foreach($customer_data as $customer)
                <?php
                  $total_weight += $customer->amount_kg;
                  $total_balance += $customer->balance;
                 ?>
                <tr key={{ $customer->id }}>
                  <td>{{ $no }}</td>
                  <td>{{ $customer->fullname }}</td>
                  <td><a href="{{ route('dashboard-employee.create') . '?email=' . $customer->email }}">{{ $customer->email }}</a></td>
                  <td>{{ round($customer->amount_kg) }} Kg</td>
                  <td>Rp. {{ number_format($customer->balance, 2) }}</td>
                  <td>{{ $customer->created_at }}</td>
                  <td><a href="{{ route('customer_edit', $customer->id) }}" class="btn btn-warning"><span class="fa fa-pencil"></span></a></td>
                  <td>
                      <form action="{{ route('dashboard-employee.destroy', $customer->id) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus nasabah ini? PERINGATAN: Nasabah yang sudah dihapus TIDAK dapat dikembalikan lagi. Seluruh histori debit/kredit akan DIHAPUS.');"><span class="fa fa-trash-o"></span></button>
                      </form>
                  </td>
                </tr>
                <?php $no++; ?>
                @endforeach
                <tr>
                  <td colspan="3">
                    <b>Total Seluruh Nasabah</b>
                  </td>
                  <td><b>{{ $total_weight }} Kg </b></td>
                  <td><b>Rp. {{ number_format($total_balance, 2) }}</b></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    <div>
  </div>

</div>	<!--/.main-->
@endsection

@section('js')
<script src="{{ asset('js/dashboard-customer.js') }}"></script>
@endsection

@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Tambah Pegawai
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
  @elseif($errors->has('error'))
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger"><span class="fa fa-check"></span>&nbsp;{{ $errors->first('error') }}</div>
    </div>
  </div>
  @endif

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">Data Pegawai</div>
        <div class="panel-body">
          <form action="{{ route('employee.update', $employee->id) }}" method="post">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="form-group">
              <label for="identity_no">Email <small>(dipake untuk login)</small></label>
              <input type="email" name="email" class="form-control" placeholder="Email..." value="{{ $user->email }}">
            </div>
            <div class="form-group">
              <label for="change_pass">Ganti Password? <small>('Ya' untuk ganti pasword, 'Tidak' untuk password yang sama)</small></label>
              <select id="change_pass" name="change_pass" class="form-control">
                <option value="">- Pilih -</option>
                <option value="0">Tidak</option>
                <option value="1">Ya</option>
              </select>
            </div>
            <div class="form-group" id="password_old">
              <label for="identity_no">Password Lama</label>
              <input type="password" name="password_old" class="form-control" placeholder="Password lama...">
            </div>
            <div class="form-group" id="password_new">
              <label for="identity_no">Password Baru</label>
              <input type="password" name="password_new" class="form-control" placeholder="Password baru...">
            </div>
            <div class="form-group" id="password_new_cfm">
              <label for="identity_no">Konfirmasi Password Baru</label>
              <input type="password" name="password_new_cfm" class="form-control" placeholder="Konfirmasi password...">
            </div>
            <div class="form-group">
              <label for="identity_no">Nomor Pegawai</label>
              <input type="text" name="employee_no" class="form-control" placeholder="Nomor Pegawai..." value="{{ $employee->employee_no }}">
            </div>
            <div class="form-group">
              <label for="fullname">Nama Lengkap</label>
              <input type="text" name="fullname" class="form-control" placeholder="Nama Lengkap..." value="{{ $employee->fullname }}">
            </div>
            <div class="form-group">
              <label for="birthplace">Tempat Lahir</label>
              <input type="text" name="birthplace" class="form-control" placeholder="Tempat Lahir..." value="{{ $employee->birthplace }}">
            </div>
            <div class="form-group">
              <label for="birthdate">Tanggal Lahir</label>
              <input type="date" name="birthdate" class="form-control" placeholder="Tanggal Lahir..." value="{{ $employee->birthdate }}">
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <textarea name="address" class="form-control" placeholder="Alamat...">{{ $employee->address }}</textarea>
            </div>
            <div class="form-group">
              <label for="city">Kota</label>
              <select name="city" class="form-control">
                @foreach($cities as $city)
                  <option value="{{ $city->id }}" {{ $employee->city_id == $city->id? 'selected' : '' }}>{{ ucfirst($city->city) }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="division_id">Divisi</label>
              <select name="division_id" class="form-control">
                @foreach($divisions as $div)
                  <option value="{{ $div->id }}" {{ ($employee->division_id == $div->id) ? 'selected' : '' }}>{{ $div->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="sex">Jenis Kelamin</label>
              <input type="radio" name="sex" value="M" {{ ($employee->sex == 'M') ? 'checked' : '' }}>Laki-laki
              <input type="radio" name="sex" value="F" {{ ($employee->sex == 'F') ? 'checked' : '' }}>Perempuan
            </div>
            <div class="form-group">
              <label for="phone_number">Nomor HP</label>
              <input type="text" name="phone_number" class="form-control" placeholder="Nomor HP..." value="{{ $employee->phone_number }}">
            </div>
            <div class="form-group">
              <input class="btn btn-info" type="submit" name="submit" value="Submit">
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
      @endsection

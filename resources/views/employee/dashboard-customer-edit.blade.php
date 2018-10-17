@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Ubah Nasabah
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li><a href="/dashboard-profile">
        Profile User
      </a></li>
      <li class="active">Ubah Nasabah</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Ubah Nasabah</h1>
    </div>
  </div><!--/.row-->

  <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
          <div class="panel-heading">Ubah Nasabah</div>
					<div class="panel-body">
            <form action="{{ route('customer_update', $id) }}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <div class="col-md-12">
                    <label for="customerAvatar">Foto Profil</label>
                  </div>
                  <div class="col-md-4" style="margin-bottom: 20px;">
                    <img src="/img/customers-image/{{ $customerAvatar }}" alt="Customer Image" width="90%" height="90%">
                  </div>
                  <input type="file" name="customerAvatar" class="form-control" placeholder="Change Image" value="{{ $customerAvatar }}">
              </div>
              <div class="form-group">
                <label for="identity_no">Nomor Identitas</label>
                <input type="text" name="identity_no" class="form-control" placeholder="Nomor Identitas" value="{{ $identity_no }}">
              </div>
              <div class="form-group">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" name="fullname" class="form-control" placeholder="Nama Lengkap" value="{{ $fullname }}">
              </div>
              <div class="form-group">
                <label for="birthplace">Tempat Lahir</label>
                <input type="text" name="birthplace" class="form-control" placeholder="Tempat Lahir" value="{{ $birthplace }}">
              </div>
              <div class="form-group">
                <label for="birthdate">Tanggal Lahir</label>
                <input type="date" name="birthdate" class="form-control" placeholder="Tanggal Lahir" value="{{ $birthdate }}">
              </div>
              <div class="form-group">
                <label for="address">Alamat</label>
                <textarea name="address" class="form-control" placeholder="Alamat">{{ $address }}</textarea>
              </div>
              <div class="form-group">
                <label for="city">Kota</label>
                <input type="text" name="city" class="form-control" placeholder="Kota" value="{{ $city }}">
              </div>
              <div class="form-group">
                <label for="customer_type">Tipe Customer</label>
                <input type="text" name="customer_type" class="form-control" placeholder="Tipe Customer" value="{{ $customer_type }}" readonly>
              </div>
              <div class="form-group">
                <label for="corporate_name">Nama Instansi</label>
                <input type="text" name="corporate_name" class="form-control" placeholder="Nama Instansi" value="{{ $corporate_name }}">
              </div>
              <div class="form-group">
                <label for="institution">Institusi</label>
                    <select id="institution-combobox" name="institution" class="form-control">
                        <option value="-1"  {{ empty($institution_id) ? 'selected' : '' }}>-</option>
                @foreach($institutions as $institution)
                    <option value="{{ $institution->id }}" {{ !empty($institution_id) ? (($institution_id == $institution->id) ? 'selected' : '') : '' }}>
                        {{ $institution->name }}
                  @endforeach
                    </select>
                    <div id="progress-institution" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; height: 10px; display: none;">
                            <span class="sr-only">Memuat data...</span>
                          </div>
              </div>
              <div id="subinstitution-div" class="form-group">
                    <input type="hidden" id="subinstitution-id" value="{{ $subinstitution_id }}"></input>
                    <label for="subinstitution">Subinstitusi</label>
                        <select id="subinstitution-combobox" name="subinstitution" class="form-control">
                           {{-- fill in with data from AJAX --}}
                        </select>
                  </div>
              <div class="form-group">
                <label for="religion">Agama</label>
                <select name="religion" class="form-control">
                  @foreach($religions as $religionq)
                    <option value="{{ $religionq->id }}" {{ ($religion == $religionq->religion) ? 'selected' : '' }}>{{ $religionq->religion }}
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="sex">Jenis Kelamin</label>
                <input type="radio" name="sex" value="M" {{ ($sex == 'M') ? 'checked' : '' }}>Laki-laki
                <input type="radio" name="sex" value="F" {{ ($sex == 'F') ? 'checked' : '' }}>Perempuan
              </div>
              <div class="form-group">
                <label for="phone_number">Nomor HP</label>
                <input type="text" name="phone_number" class="form-control" placeholder="Nomor HP" value="{{ $phone_number }}">
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <input class="btn btn-info" type="submit" name="submit" value="Submit">
              </div>
            </form>
          </div>
				</div><!-- /.panel-->
</div>	<!--/.main-->
@endsection

@section('js')
<script src="{{ asset('js/dashboard-edit-customer.js') }}"></script>
@endsection
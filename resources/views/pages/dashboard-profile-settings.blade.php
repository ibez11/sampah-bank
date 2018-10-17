@extends('layouts.master-dashboard')

@section('title')
Tuan Di Bangarna - Pengaturan
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
      <li class="active">Pengaturan</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Pengaturan</h1>
    </div>
  </div><!--/.row-->

  <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
          <div class="panel-heading">Pengaturan</div>
					<div class="panel-body">
            <form action="/dashboard-profile-settings" method="post" enctype="multipart/form-data">
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

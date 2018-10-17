@extends('template.master')

@section('customstyle')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">
<link href="{{ asset('css/register_det.css') }}" rel="stylesheet">
@endsection


  <section class="download" id="register-det">
    <div class="well well-lg">
      <h1 class="text-center">Tipe akun {{ $customer_type_name }} </h1>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-lg-2"><!--offset is not working--></div>
          <div class="col-lg-8">
          <form action="/register-user" method="post">
            <div class="card">
              <div class="form-group row">
                <label for="email" class="col-4 col-form-label control-label">Email</label>
                <div class="col-8">
                  <input name="email" type="email" class="form-control" required>
                  @if ($errors->has('email'))
                  <div class="col-md-12"  style="text-align: left;">
                    <div class="form-control-feedback">
                      <span class="text-danger align-middle">
                        <i class="fa fa-close"></i> {{ $errors->first('email') }}
                      </span>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-4 col-form-label control-label">Password</label>
                <div class="col-8">
                  <input name="password" type="password" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="phone_number" class="col-4 col-form-label control-label">Nomer HP</label>
                <div class="col-8">
                  <input name="phone_number" type="text" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="identity_id" class="col-4 col-form-label control-label">Nomor Identitas</label>
                <div class="col-8">
                  <input name="identity_id" type="text" class="form-control" required>
                </div>
              </div>
              @if ($feature == 1)
              <div class="form-group row">
                <label for="corporate_name" class="col-4 col-form-label control-label" >Nama Instansi</label>
                <div class="col-8">
                  <input name="corporate_name" type="text" class="form-control" required>
                </div>
              </div>
              @endif
              <div class="form-group row">
                <label for="fullname" class="col-4 col-form-label control-label" >Nama Lengkap</label>
                <div class="col-8">
                  <input name="fullname" type="text" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="birthplace" class="col-4 col-form-label control-label">Tempat Lahir</label>
                <div class="col-8">
                  <input name="birthplace" type="text" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="birthdate" class="col-4 col-form-label control-label">Tanggal Lahir</label>
                <!-- birthdate using datepicker -->
                <div class="col-8">
                  <input name="birthdate" type="date" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="address" class="col-4 col-form-label control-label">Alamat</label>
                <div class="col-8">
                  <textarea name="address" class="form-control" required></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="city" class="col-4 col-form-label control-label">Kota</label>
                <div class="col-8">
                  <input id="city" name="city" type="text" class="form-control" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="religion" class="col-4 col-form-label control-label">Agama</label>
                <div class="col-8">
                  <select name="religion" class="form-control">
                    @foreach($religions as $religion)
                    <option value="{{ $religion->id }}">{{ $religion->religion }}
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="sex" class="col-4 col-form-label control-label">Jenis Kelamin</label>
                <div class="col-8">
                  <input id="sex" name="sex" value="F" type="radio" required>Perempuan
                  <input id="sex" name="sex" value="M" type="radio" required>Laki - laki
                </div>
              </div>
              <input type="hidden" name="customer_type" value="{{ $customer_type }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group row">
                <div class="col-5"></div>
                <div class="col-3">
                  <input class="btn btn-info" type="submit" name="submit" value="Submit">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
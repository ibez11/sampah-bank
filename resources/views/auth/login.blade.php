@extends('template.master',['logo' => $logo])

@section('title')
Login
@endsection

@section('content')
<section class="bg-login">
  <div class="container">
    <form class="form-horizontal" role="form" method="POST" action="{{route('try_login')}}">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-9">
          <h2 class="login-title">Please Login</h2>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="form-group has-danger">
            <label class="sr-only" for="email">E-Mail Address</label>
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
              <input type="email" name="email" class="form-control" id="email"
              placeholder="you@example.com" required autofocus>
            </div>
          </div>
        </div>
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
      <div class="row">
        <div class="col-md-9">
          <div class="form-group">
            <label class="sr-only" for="password">Password</label>
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
              <input type="password" name="password" class="form-control" id="password"
              placeholder="Password" required>
            </div>
          </div>
        </div>
        @if ($errors->has('password'))
        <div class="col-md-12" style="text-align: left;">
          <div class="form-control-feedback">
            <span class="text-danger align-middle">
              <i class="fa fa-close"></i> {{ $errors->first('password') }}
            </span>
          </div>
        </div>
        @endif
      </div>
      <div class="row">
        <div class="col-md-9" style="padding-top: .35rem">
          <div class="form-check mb-2 mr-sm-2 mb-sm-0">
            <label class="form-check-label">
              <input class="form-check-input" name="remember"
              type="checkbox" {{ old('remember') ? 'checked' : '' }} >
              <span style="padding-bottom: .15rem">Remember me</span>
            </label>
          </div>
        </div>
      </div>
      <div class="row" style="padding-top: 1rem">
        <div class="col-md-9">
          <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button>
          <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection

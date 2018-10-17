@extends('layouts.master')

<!-- define a title -->
@section('title')
  Landing
@endsection

<!-- define css file in this page -->
@section('stylesheet')
<link href="{{ asset('css/stepwizard.css') }}" rel="stylesheet">
@endsection

<!-- define js file in this page -->
@section('javascript')
<script type="text/javascript" src="{{ asset('js/stepwizard.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
@endsection

<!-- define a content -->
@section('content')
<div class="container" id="border">
  <header id="main-header">
  		<div class="container">
  			<div class="row">
  		      <div class="col-md-6 col-md-offset-3">
              <h1>Ubah sampahmu menjadi uang</h1>
            </div>
  			</div>
  		</div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h3>Visi:
            <ol>
              <li>memperlakukan sampah sebagai sumber kesejahteraan ekonomi.</li>
            </ol>
            </h3>
          <h3>Misi:
          <ol>
            <li>Membangun koordinasi dan kemitraan yang erat dengan memberi keuntungan yang maksimal bagi stakeholder.</li>
            <li>Mengoptimalkan pengelolaan dana untuk mengembangkan sumber daya manusia profesional</li>
          </ol>
        </h3>
        </div>
      </div>
    </div>
  </section>
</div>
<!--
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        Hello Contact
      </div>
    </div>
  </div>
</section>

<section id="location">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        Hello Location
      </div>
    </div>
    </div>
  </div>
</section>

<section id="register">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1>Ubah sampahmu menjadi uang hanya dengan 3 langkah berikut</h1>
      </div>
    </div>
  	<div class="row">
      <div class="col-md-8 col-xs-12 col-md-offset-2">
          <ul class="nav nav-pills nav-justified thumbnail">
              <li class="active"><a href="#">
                  <h4 class="list-group-item-heading">Step 1</h4>
                  <p class="list-group-item-text">First step description</p>
              </a></li>
              <li class="disabled"><a href="#">
                  <h4 class="list-group-item-heading">Step 2</h4>
                  <p class="list-group-item-text">Second step description</p>
              </a></li>
              <li class="disabled"><a href="#">
                  <h4 class="list-group-item-heading">Step 3</h4>
                  <p class="list-group-item-text">Third step description</p>
              </a></li>
          </ul>
      </div>
  	</div>
    <div class="row">
      <div class="col-md-8 col-xs-12 col-md-offset-2">
        <button class="btn btn-primary btn-lg center-block">Daftar</button>
        <p class="text-center">Sudah punya akun</p>
      </div>
    </div> old step wizard
    <div class="stepwizard col-md-offset-3">
      <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
          <a id="step1" href="#step-1" type="button"
          class="btn btn-primary btn-circle">1</a>
          <h5>Langkah 1</h5>
          <p class="description">Registrasi alamat emailmu</p>
        </div>
        <div class="stepwizard-step">
          <a id="step2" href="#step-2" type="button"
          class="btn btn-default btn-circle" disabled="disabled">2</a>
          <h5>Langkah 2</h5>
          <p class="description">Isi detail lengkapmu</p>
        </div>
        <div class="stepwizard-step">
          <a id="step3" href="#step-3" type="button"
          class="btn btn-default btn-circle" disabled="disabled">3</a>
          <h5>Langkah 3</h5>
          <p class="description">Upload karyamu</p>
        </div>
      </div>
    </div>
  </div>
</section>
-->
@extends('layouts.master-dashboard')

@section('title')
Tuan Di Bangarna - Profil
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Profile User</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Profile User</h1>
    </div>
  </div><!--/.row-->



  <div class="row">
			<div class="col-md-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Profile Anda</div>
					<div class="panel-body">
            <div class="col-md-5">
              <img class="img-border" src="{{ asset('img/customers-image/'.$customerAvatar.'') }}" alt="Avatar" width="90%" height="90%">
              <a href="/dashboard-profile-settings" type="button" class="btn btn-primary">Pengaturan Profil</a>
            </div>
            <div class="col-md-7">
              <ul class="user-profile">
                <li><span class="fa fa-id-card"></span></li>
                <li class="semicolon"><span>Nomor Identitas</span></li>
                <li><span>{{ $identity_no }}</span></li>
              </ul>
              <ul class="user-profile">
                <li><span class="fa fa-user"></span></li>
                <li class="semicolon"><span>Nama Lengkap</span></li>
                <li><span>{{ $fullname }}</span></li>
              </ul>
              <ul class="user-profile">
                <li><span class="fa fa-home"></span></li>
                <li class="semicolon"><span>Tempat Lahir</span></li>
                <li><span>{{ $birthplace }}</span></li>
              </ul>
              <ul class="user-profile">
                <li><span class="fa fa-birthday-cake"></span></li>
                <li class="semicolon"><span>Tanggal Lahir</span></li>
                <li><span>{{ $birthdate }}</span></li>
              </ul>
              <ul class="user-profile">
                <li><span class="fa fa-address-card"></span></li>
                <li class="semicolon"><span>Alamat</span></li>
                <li><span>{{ $address }}</span></li>
              </ul>
              <ul class="user-profile">
                <li><span class="fa fa-building"></span></li>
                <li class="semicolon"><span>Kota</span></li>
                <li><span>{{ $city }}</span></li>
              </ul>
              <ul class="user-profile">
                <li><span class="fa fa-user"></span></li>
                <li class="semicolon"><span>Tipe customer</span></li>
                <li><span>{{ $customer_type }}</span></li>
              </ul>
              <ul class="user-profile">
                <li><span class="fa fa-building-o"></span></li>
                <li class="semicolon"><span>Nama Instansi</span></li>
                <li><span>{{ $corporate_name }}</span></li>
              </ul>
              <ul class="user-profile">
                <li><span class="fa fa-home"></span></li>
                <li class="semicolon"><span>Agama</span></li>
                <li><span>{{ $religion }}</span></li>
              </ul>
              <ul class="user-profile">
                <li><span class="fa fa-venus-mars"></span></li>
                <li class="semicolon"><span>Jenis Kelamin</span></li>
                <li><span>
                  @if($sex == 'F') Perempuan
                  @endif
                  @if($sex == 'M') Laki-laki
                  @endif
                </span></li>
              </ul>
              <ul class="user-profile">
                <li><span class="fa fa-phone"></span></li>
                <li class="semicolon"><span>Nomor HP</span></li>
                <li><span>{{ $phone_number }}</span></li>
              </ul>
            </div>
					</div>
				</div>
			</div>
      <div class="col-md-5">
				<div class="panel panel-primary">
					<div class="panel-heading">Transaksi Terakhir</div>
					<div class="panel-body">
            <ul class="tsc">
              @forelse($transactions as $transaction)
							<li class="transaction clearfix">
								<div class="clearfix">
    						<div class="header"><small class="text-muted">{{ $transaction->created_at->diffForHumans() }}</small></div>
                  @if($transaction->is_debit == 1)
									<p>Anda menambahkan {{ $transaction->amount_kg }} Kg sampah seharga Rp. {{ number_format($transaction->amount_money, 2) }},-</p>
                  @else
                  <p>Anda melakukan penarikan sebanyak Rp. {{ number_format($transaction->amount_used, 2) }},-</p>
                  @endif
								</div>
							</li>
              @empty
              <p class="text-center">Transaksi Belum Ada, Silahkan menabung terlebih dahulu.</p>
              @endforelse
            </ul>
					</div>
				</div>
			</div>
		</div><!--/.row-->

</div>	<!--/.main-->
@endsection

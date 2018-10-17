@extends('emails.master');

@section('title')
  Konfirmasi Pendaftaran - Tuan Di Bangarna Bank
@endsection

@section('content')

<p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Halo, {{ $customer['fullname']  }}!</p>
<p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Selamat, Anda telah terdaftar sebagai nasabah Tuan Di Bangarna Bank.</p>
<p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Berikut detail akses akun Anda:</p>
<ul class="highlight" style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;background: #efefef;padding: 20px;border-radius: 5px;">
  <li style="list-style: none;">Nama Akun: {{ $user['email']  }}</li>
  <li style="list-style: none;">Password: {{$user['password']  }}</li>
</ul>
<p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Langkah selanjutnya adalah masuk ke dalam sistem untuk melihat saldo dan mutasi rekening Anda.</p>
<p><a style="  background-color: #ffffff;
  border: solid 1px #b71c1c;
  border-radius: 5px;
  box-sizing: border-box;
  color: #b71c1c;
  cursor: pointer;
  display: inline-block;
  font-size: 14px;
  font-weight: bold;
  margin: 0;
  padding: 12px 25px;
  text-decoration: none;
  text-transform: capitalize;" href="http://tdbangarna.com/login">Masuk ke dalam sistem</a>
</p>
  <p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Kami dengan senang hati akan menjawab tiap pertanyaan Anda.</p>


@endsection

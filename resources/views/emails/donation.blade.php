@extends('emails.master');

@section('title')
  Notifikasi Penerimaan Sumbangan - Tuan Di Bangarna Bank
@endsection

@section('content')

<p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Halo, {{ $customer['fullname']  }} ({{ $user['email'] }})!</p>
<p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Email ini merupakan pemberitahuan bahwa Anda telah menerima sumbangan sejumlah {{ 'Rp ' . number_format($amount_unit,2) }}.</p>
<p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Berikut ini adalah detail dari sumbangan yang Anda terima:</p>
<ul class="highlight" style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;background: #efefef;padding: 20px;border-radius: 5px;">
  <li style="list-style: none;">Jumlah Sumbangan: {{  'Rp ' . number_format($amount_unit,2) }}</li>
  <li style="list-style: none;">Pesan dari Bank: {{ $message_admin  }}</li>
  <li style="list-style: none;">Tanggal Penerimaan Sumbangan: {{ $transaction_date }}</li>
</ul>
<p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Anda dapat melakukan klaim sumbangan ini dengan melakukan kontak kepada pihak Tuan Di Bangarna Bank melalui nomor +62 811-263-1278 atau email ke info@tdbangarna.com.</p>
<p style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Kami dengan senang hati akan menjawab tiap pertanyaan Anda.</p>


@endsection

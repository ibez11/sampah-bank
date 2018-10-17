<header class="masthead">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-7 my-auto">
          <div class="header-content mx-auto">
            <h3 class="mb-5 title">Tuan Di Bangarna Bank</h3>
            <h1 class="mb-5">Ubah Sampahmu Menjadi Uang!</h1>
            <h2 class="mb-5">Kami mempunyai visi dalam memperlakukan sampah sebagai sumber kesejahteraan ekonomi</h2>
            <a href="/customer-type" class="btn btn-outline btn-xl js-scroll-trigger">Mulai Sekarang</a>
            <div class="marquee" style="margin-top: 20px; display: none;">
              <ul style="list-style: none;">
                  @foreach($transactions as $transaction)
                    <li class="my-overflow" style="display: inline; margin-left: 40px;">{{ $transaction->fullname }} telah menabung {{ round($transaction->amount_kg) }} Kg.</li>
                  @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-5 my-auto">
          <img class="responsive" src="{{ asset('img/macbook.png') }}"/>
        </div>
      </div>
    </div>
  </header>
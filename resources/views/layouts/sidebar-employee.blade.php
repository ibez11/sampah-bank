<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span></button>
        <!-- <a class="navbar-brand" href="#"><span>TUAN DI BANGARNA</span> BANK</a> -->
        <a class="navbar-brand" href="/"><img height="40" src="/img/tdb.png"/></a>
      </div>
    </div><!-- /.container-fluid -->
  </nav>
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar main-menu">
    <div class="profile-sidebar">
      <div class="profile-userpic">
        <img src="{{ asset('img/employees-image/'.$employeeAvatar.'') }}" class="img-responsive" alt="">
      </div>
      <div class="profile-usertitle">
        <div class="profile-usertitle-name">{{ $fullname }}</div>
        <div class="profile-usertitle-status">{{ $email }}</div>
      </div>
      <div class="clear"></div>
      <ul class="nav menu">
          @if($divisi == 2)
          <li class="@if(URL::current() == URL::to('/dashboard-employee')) active @endif">
            <a href="/dashboard-employee"><em class="fa fa-bar-chart">&nbsp;</em> Transaksi Terakhir</a>
          </li>
          <li class="@if(URL::current() == URL::to('/dashboard-employee/create') || URL::current() == URL::to('/dashboard-employee/store')) active @endif">
            <a href="/dashboard-employee/create"><em class="fa fa-retweet">&nbsp;</em> Tambah Transaksi</a>
          </li>
          <li class="@if(URL::current() == URL::to('/customer_list')) active @endif" >
            <a href="/customer_list"><em class="fa fa-user">&nbsp;</em> Lihat Nasabah</a>
          </li>
          <li class="@if(URL::current() == URL::to('/institution')) active @endif" >
            <a href="/institution"><em class="fa fa-building">&nbsp;</em> Daftar Institusi</a>
          </li>
          <li class="@if(URL::current() == URL::to('/donation') or
          URL::current() == URL::to('/donation/add') or
          URL::current() == URL::to('=/donation/delete')) active @endif">
            <a href="/donation"><em class="fa fa-handshake-o">&nbsp;</em> Daftar Sumbangan</a>
          </li>
          <li class="@if(URL::current() == URL::to('/employee-report') || URL::current() == URL::to('/generate-employee-report')) active @endif">
            <a href="/employee-report"><em class="fa fa-file-text">&nbsp;</em> Laporan Rekening</a>
          </li>
          <li class="@if(URL::current() == URL::to('/product-list') || strpos(URL::current(), '/edit-product') !== false || strpos(URL::current(), '/update-product') !== false || strpos(URL::current(), '/delete-product') !== false || strpos(URL::current(), '/add-product') !== false) active @endif" >
            <a href="/product-list"><em class="fa fa-bars">&nbsp;</em> Daftar Harga Sampah</a>
          </li>
          <li><a href="/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
          @endif
          @if($divisi == 1)
          <li class="@if(URL::current() == URL::to('/dashboard-employee')) active @endif">
            <a href="/dashboard-employee"><em class="fa fa-bar-chart">&nbsp;</em> Transaksi Terakhir</a>
          </li>
          <li class="@if(URL::current() == URL::to('/dashboard-employee/create') || URL::current() == URL::to('/dashboard-employee/store')) active @endif">
            <a href="/dashboard-employee/create"><em class="fa fa-retweet">&nbsp;</em> Tambah Transaksi</a>
          </li>
          <li class="@if(URL::current() == URL::to('/customer_list')) active @endif" >
            <a href="/customer_list"><em class="fa fa-user">&nbsp;</em> Lihat Nasabah</a>
          </li>
          <li class="@if(URL::current() == URL::to('/institution')) active @endif" >
            <a href="/institution"><em class="fa fa-building">&nbsp;</em> Daftar Institusi</a>
          </li>
          <li class="@if(URL::current() == URL::to('/employee-report') || URL::current() == URL::to('/generate-employee-report')) active @endif">
            <a href="/employee-report"><em class="fa fa-file-text">&nbsp;</em> Laporan Rekening</a>
          </li>
          <li class="@if(URL::current() == URL::to('/product-list') || strpos(URL::current(), '/edit-product') !== false || strpos(URL::current(), '/update-product') !== false || strpos(URL::current(), '/delete-product') !== false || strpos(URL::current(), '/add-product') !== false) active @endif" >
            <a href="/product-list"><em class="fa fa-bars">&nbsp;</em> Daftar Sampah</a>
          </li>
          <li class="@if(strpos(URL::current(), '/city-list-edit')  !== false or URL::current() == URL::to('/city-list') or URL::current() == URL::to('/settings') or URL::current() == URL::to('/save-settings')) active @endif">
            <a href="/city-list"><em class="fa fa-map-marker">&nbsp;</em> Daftar Kota &amp; Harga</a>
          </li>
          <li class="@if(URL::current() == URL::to('/operating-costs') or
          URL::current() == URL::to('/operating-costs-add') or
          URL::current() == URL::to('/operating-costs-delete')) active @endif">
            <a href="/operating-costs"><em class="fa fa-money">&nbsp;</em> Biaya Operasional</a>
          </li>
          <li class="@if(URL::current() == URL::to('/donation') or
          URL::current() == URL::to('/donation/add') or
          URL::current() == URL::to('=/donation/delete')) active @endif">
            <a href="/donation"><em class="fa fa-handshake-o">&nbsp;</em> Daftar Sumbangan</a>
          </li>
          <li class="@if(URL::current() == URL::to('/employee') or URL::current() == URL::to('/employee/create')) active @endif">
            <a href="/employee"><em class="fa fa-user">&nbsp;</em> Data Pegawai</a>
          </li>
          <li class="@if(URL::current() == URL::to('/gallery') or URL::current() == URL::to('/gallery/create')) active @endif">
            <a href="/gallery"><em class="fa fa-picture-o">&nbsp;</em> Galeri Foto</a>
          </li>
          <li><a href="/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
          @endif
          <li class="@if(URL::current() == URL::to('/help')) active @endif"><a href="/help"><em class="fa fa-help">&nbsp;</em> Need Help?</a></li>
        </ul>
    </div>
    
  </div><!-- /.container-fluid -->
</nav>
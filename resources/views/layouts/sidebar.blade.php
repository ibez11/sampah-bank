<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span></button> 
        <!-- <a class="navbar-brand" href="#"><span>TUAN DI BANGARNA</span> BANK</a> -->
        <a class="navbar-brand" href="/"><img height="40" src="{{$logo}}"/></a>
      </div>
    </div><!-- /.container-fluid -->
  </nav>
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
      <div class="profile-userpic">
        <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
      </div>
      <div class="profile-usertitle">
        <div class="profile-usertitle-name">{{ $fullname }}</div>
        <div class="profile-usertitle-status">{{ $email }}</div>
      </div>
      <div class="clear"></div>
    </div>
  </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <div class="profile-sidebar">
    <div class="profile-userpic">
      <img src="{{ asset('img/customers-image/'.$customerAvatar.'') }}" class="img-responsive" alt="">
    </div>
    <div class="profile-usertitle">
    <a href="{{route('dashboard-profile')}}" style="text-decoration: none; color: none;">
      <div class="profile-usertitle-name">{{ $fullname }}</div>
      <div class="profile-usertitle-status">{{ $email }}</div>
      <div class="profile-usertitle-status">{{ $type }}</div>
    </a>
    </div>
    <div class="clear"></div>
  </div>
  <div class="divider"></div>
  <ul class="nav menu">
    <li class="@if(URL::current() == URL::to('/dashboard-customer')) active @endif">
      <a href="{{route('dashboard-customer')}}"><em class="fa fa-bar-chart">&nbsp;</em> Informasi Saldo</a>
    </li>
    <li class="@if(URL::current() == URL::to('/dashboard-mutation') || URL::current() == URL::to('/dashboard-mutation-search')) active @endif">
      <a href="{{route('dashboard-mutation')}}"><em class="fa fa-retweet">&nbsp;</em> Mutasi Rekening</a>
    </li>
    <li class="@if(URL::current() == URL::to('/dashboard-profile')) active @endif">
      <a href="{{route('dashboard-profile')}}"><em class="fa fa-user">&nbsp;</em> Profil</a>
    </li>
    <li><a href="logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    <li class="@if(URL::current() == URL::to('/help')) active @endif"><a href="/help"><em class="fa fa-help">&nbsp;</em> Need Help?</a></li>
  </ul>
</div><!--/.sidebar-->

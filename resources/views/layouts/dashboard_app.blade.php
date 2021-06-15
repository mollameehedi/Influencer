<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- vendor css -->
    <link href="{{ asset('dashboard_asset') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('dashboard_asset') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('dashboard_asset') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset') }}/css/starlight.css">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{ url('/home') }}"><i class="icon ion-android-star-outline"></i>{{ env('APP_NAME') }}</a></div>
    <div class="sl-sideleft">

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="{{ route('home') }}" class="sl-menu-link @yield('dashboard')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('logo') }}" class="sl-menu-link @yield('logo')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Logo</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('banner.index') }}" class="sl-menu-link @yield('banner')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Banner</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('logo.index') }}" class="sl-menu-link @yield('partner')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Partner</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('benifit.index') }}" class="sl-menu-link @yield('benifit')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Benifit</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('offer.index') }}" class="sl-menu-link @yield('offer')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Offer</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('social.index') }}" class="sl-menu-link @yield('social')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Social</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('shops.index') }}" class="sl-menu-link @yield('shop')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Shop</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{ user()->name }}</span>
              <img src="{{ asset('uploads/profile_photos') }}/{{ user()->profile_photo }}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{ route('editprofile') }}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon ion-power"></i>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                     Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->
    @yield('dashboard_content')
    

    <script src="{{ asset('dashboard_asset') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('dashboard_asset') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('dashboard_asset') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('dashboard_asset') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="{{ asset('dashboard_asset') }}/js/starlight.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    
@yield('footer_scripts')

  </body>
</html>

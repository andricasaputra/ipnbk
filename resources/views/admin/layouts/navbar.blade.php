<nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
  <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
   {{--  <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="{{ asset('assets/images/logo-mini.svg') }}" /></a> --}}
    <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
      <i class="mdi mdi-menu"></i>
    </button>

    <ul class="navbar-nav navbar-nav-right ml-lg-auto">

      <li class="nav-item nav-profile dropdown border-0">
        <a href="{{ route('logout') }}" class="nav-link" id="profileDropdown">
          <span class="profile-name">Logout <i class="mdi mdi-logout mr-2 text-primary"></i></span>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
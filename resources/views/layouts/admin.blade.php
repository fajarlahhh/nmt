<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- <title>Nice Metavest</title> --}}
  <title>Nice Metavest</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />
  <link href="{{ asset('/admin/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('/admin/assets/js/loader.js') }}"></script>

  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
  <link href="{{ asset('/admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/admin/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->

  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
  <link href="{{ asset('/admin/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('/admin/plugins/font-icons/fontawesome/css/regular.css') }}">
  <link rel="stylesheet" href="{{ asset('/admin/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
  <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

  @stack('css')
  @livewireStyles
</head>

<body class="alt-menu sidebar-noneoverflow">
  <!-- BEGIN LOADER -->
  <div id="load_screen">
    <div class="loader">
      <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
      </div>
    </div>
  </div>
  <!--  END LOADER -->

  <!--  BEGIN NAVBAR  -->
  <div class="header-container">
    <header class="header navbar navbar-expand-sm">

      <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="feather feather-menu">
          <line x1="3" y1="12" x2="21" y2="12"></line>
          <line x1="3" y1="6" x2="21" y2="6"></line>
          <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg></a>

      <div class="nav-logo align-self-center">
        <a class="navbar-brand" href="/"><img alt="logo" src="/assets/img/logo.png"> <span
            class="navbar-brand-name">Nice Metavest</span></a>
      </div>

      <ul class="navbar-item flex-row mr-auto">
      </ul>

      <ul class="navbar-item flex-row nav-dropdowns">

        <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
          <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media">
              <img src="/assets/img/logo.png" class="img-fluid" alt="admin-profile">
              <div class="media-body align-self-center">
                <h6><span>Hi,</span> {{ auth()->user()->username }}</h6>
              </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-chevron-down">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </a>
          <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
            <div class="">
              <div class="dropdown-item">
                <a data-toggle="modal" data-target="#passwordModal" href="javascript:;"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-lock">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                  </svg> Password</a>
              </div>
              <div class="dropdown-item">
                <a class=""
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                  href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-log-out">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                  </svg> Sign Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </div>
          </div>

        </li>
      </ul>
    </header>
  </div>
  <!--  END NAVBAR  -->
  <!--  BEGIN MAIN CONTAINER  -->
  <div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN TOPBAR  -->
    <div class="topbar-nav header navbar" role="banner">
      <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row  text-center">
          <li class="nav-item theme-logo">
            <a href="/">
              <img src="/assets/img/logo.png" class="navbar-logo" alt="logo">
            </a>
          </li>
          <li class="nav-item theme-text">
            <a href="/" class="nav-link"> Nice Metavest </a>
          </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="topAccordion">

          <li class="menu single-menu">
            <a href="/admin-area/dashboard">
              <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span>Dashboard</span>
              </div>
            </a>
          </li>

          <li class="menu single-menu">
            <a href="/admin-area/member">
              <div class="">
                <span>Member</span>
              </div>
            </a>
          </li>

          <li class="menu single-menu">
            <a href="/admin-area/deposit">
              <div class="">
                <span>Deposit</span>
              </div>
            </a>
          </li>

          <li class="menu single-menu">
            <a href="/admin-area/withdrawal">
              <div class="">
                <span>Withdrawal</span>
              </div>
            </a>
          </li>

          <li class="menu single-menu">
            <a href="/admin-area/daily">
              <div class="">
                <span>Daily</span>
              </div>
            </a>
          </li>
          <li class="menu single-menu">
            <a href="/admin-area/pin">
              <div class="">
                <span>Pin</span>
              </div>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!--  END TOPBAR  -->
    @yield('content')
  </div>
  <!-- END MAIN CONTAINER -->

  @include('form.password')

  @livewireScripts
  <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
  <script src="/admin/assets/js/libs/jquery-3.1.1.min.js"></script>
  <script src="/admin/bootstrap/js/popper.min.js"></script>
  <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
  <script src="/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="/admin/assets/js/app.js"></script>
  <script>
    $(document).ready(function() {
      App.init();
    });
  </script>
  <script src="/admin/assets/js/custom.js"></script>
  <!-- END GLOBAL MANDATORY SCRIPTS -->

  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
  <script src="/admin/plugins/apex/apexcharts.min.js"></script>
  <script src="/admin/assets/js/dashboard/dash_2.js"></script>
  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

  @stack('scripts')
</body>

</html>

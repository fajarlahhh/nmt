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
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="/assets/css/google/app.min.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->

  @stack('css')
  @livewireStyles
</head>

<body>
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade show">
    <span class="spinner"></span>
  </div>
  <!-- end #page-loader -->


  <!-- begin #page-container -->
  <div id="page-container"
    class="fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar page-with-light-sidebar">
    @include('includes.header')
    @include('includes.side-menu')
    @yield('content')
    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
        class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
  </div>
  <!-- end page container -->

  @livewireScripts

  <!-- ================== BEGIN BASE JS ================== -->
  <script src="/assets/js/app.min.js"></script>
  <script src="/assets/js/theme/google.min.js"></script>
  <!-- ================== END BASE JS ================== -->

  @stack('scripts')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>{{ config('app.name') }}</title>
  <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta name="keywords" content="{{ config('app.name') }}">

  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="/assets/css/default/app.min.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->
  @livewireStyles
</head>

<body class="pace-top">
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade show">
    <span class="spinner"></span>
  </div>
  <!-- end #page-loader -->

  <!-- begin #page-container -->
  <div id="page-container" class="fade">

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
  <script src="/assets/js/theme/default.min.js"></script>
  <!-- ================== END BASE JS ================== -->
</body>

</html>

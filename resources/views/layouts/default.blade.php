<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }}</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="/assets/css/google/app.min.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->

  <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
  <link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" />
  <link href="/assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" />
  <link href="/assets/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
  <link href="/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
  <link href="/assets/plugins/@danielfarrell/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
  <link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
  <link href="/assets/plugins/tag-it/css/jquery.tagit.css" rel="stylesheet" />
  <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
  <link href="/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
  <link href="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet" />
  <link href="/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
  <link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
  <link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
  <link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
  <!-- ================== END PAGE LEVEL STYLE ================== -->

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
    @include('form.password')
    @include('includes.header')
    @include('includes.side-menu')
    <!-- begin #content -->
    <div id="content" class="content">
      @if (!auth()->user()->wallet || !auth()->user()->phone || !auth()->user()->security || !auth()->user()->googleAuthSecret)
        <div class="alert alert-warning border-0">
          <h5>Warning</h5>
          <ul>
            @if (!auth()->user()->wallet)
              <li>You have not added a wallet address. <a href="/profile" class="text-primary">Click here</a> to add it
              </li>
            @endif
            @if (!auth()->user()->phone)
              <li>You have not added a phone number. <a href="/profile" class="text-primary">Click here</a> to add it
              </li>
            @endif
            @if (!auth()->user()->security || !auth()->user()->googleAuthSecret)
              <li>You have not setup your security. <a href="/security" class="text-primary">Click here</a> to setup
              </li>
            @endif
          </ul>
        </div>
      @endif
      @yield('content')
    </div>
    <!-- end #content -->

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
  <script src="/assets/plugins/bootstrap-show-password/dist/bootstrap-show-password.js"></script>
  <script src="/assets/plugins/parsleyjs/dist/parsley.js"></script>
  <!-- ================== END BASE JS ================== -->

  @stack('scripts')
</body>

</html>

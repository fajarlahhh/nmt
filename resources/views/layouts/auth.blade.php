<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="{{ config('app.name') }}">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('assets/img/logo.svg') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/forms/switches.css">

    @livewireStyles
</head>

<body class="form">
    @yield('content')
    @livewireScripts
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/authentication/form-1.js') }}"></script>
    @stack('scripts')
</body>

</html>

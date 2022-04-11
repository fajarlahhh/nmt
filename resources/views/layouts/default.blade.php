<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="{{ config('app.name') }}">
    <title>{{ config('app.name') }}</title>
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" href="/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/app.css" />
    @livewireStyles
</head>
<body class="main">
    @include('includes.mobile-menu')
    <div class="flex">
        @include('includes.side-menu')
        <!-- BEGIN: Content -->
        <div class="content">
            @include('includes.top-bar', [
                'menu' => $menu
            ])
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    {{ ucfirst($menu) }}
                </h2>
            </div>
            @if (auth()->user()->role == 1)
            @if (!auth()->user()->google2fa_secret)
            <div class='alert intro-y alert-danger-soft text-1xl gap-6 show mt-2' role='alert'>
                You need to activate google authenticator <strong><a href='/security' class='text-danger'>here</a></strong>
            </div>
            @endif
            @if (!auth()->user()->wallet)
            <div class='alert intro-y alert-warning-soft text-1xl gap-6 show mt-2' role='alert'>
                Insert your USDT BEP-20 wallet address <strong><a href='/profile' class='text-danger'>here</a></strong>
            </div>
            @endif
            @endif
            @yield('content')
        </div>
        <!-- END: Content -->
    </div>

    @livewireScripts
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>

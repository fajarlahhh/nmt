@extends('layouts.auth')

@section('content')
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <img src="{{ asset('assets/img/logo.svg') }}" style="width: 120px" alt="">
                        <h1 class="">Sign In</h1>
                        <p class="">Log in to your account to continue.</p>

                        @livewire('login')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

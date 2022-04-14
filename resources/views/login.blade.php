@extends('layouts.auth')

@section('content')
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Log In to <a href="index.html"><span class="brand-name">Solution
                                    Stake</span></a>
                        </h1>
                        <p class="signup-link">New Here? <a href="javascript:;">Create an account</a></p>

                        @livewire('login')
                        <p class="terms-conditions">© 2021 All Rights Reserved.<a href="javascript:void(0);">. Cookie
                                Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a
                                href="javascript:void(0);">Terms</a>.</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>
@endsection

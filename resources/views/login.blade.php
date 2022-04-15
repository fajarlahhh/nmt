@extends('layouts.auth')

@section('content')
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content text-center">
                        <img src="/assets/img/logo.svg" alt="" class="w-25">
                        <h4 class=""><span class="brand-name">Solution
                                    Stake</span>
                        </h4>
                        <p class="signup-link">New Here? <a
                                href="/registration?ref=214bc50d85ad8fa9cda686145cf1f8aca0">Create an account</a></p>

                        @livewire('login')
                        <p class="terms-conditions">© 2021 All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="bg-dark vh-100 text-center">
                <img src="/assets/img/logo.svg" alt="" class="w-75" style="margin-top: 80px">
            </div>
        </div>
    </div>
@endsection

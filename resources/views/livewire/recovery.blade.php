<div>
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content text-center">

                        <img src="/assets/img/logo.svg" alt="" class="w-25">
                        <h4 class="">Reset Password{{ $data? ' for '.$data->user->username: '' }}</h4>
                        <p class="signup-link">Enter your new password here!</p>

                        @if (session()->has('message'))
                        <div class="alert alert-success border-0">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg></button>
                            {!! session('message') !!}
                        </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger border-0">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg></button>
                                {!! session('error') !!}
                            </div>
                        @endif
                        <form class="text-left mb-5" wire:submit.prevent="submit">
                            <div class="form">
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" wire:model.defer="password" type="password" class="form-control"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit"
                                        data-sitekey="{{env('RECAPTCHAV3_SITEKEY')}}"
                                        data-callback='handle'
                                        data-action='submit' class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <p class="terms-conditions mt-4">© 2021 All Rights Reserved.</p>
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

    {{-- <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <div class="my-auto">
                <img alt="{{ config('app.name') }}" class="-intro-x w-1/2 -mt-16" src="/images/logo.svg">
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                @if ($data)
                <form wire:submit.prevent="submit">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        New Password
                    </h2>
                    <p class="intro-x">New password for <strong>{{ $username }}</strong></p>
                    <div class="intro-x mt-5">
                        <div class="input-group">
                            <input type="{{ $type }}" class="w-full form-control text-gray-700" wire:model.defer="new_password" aria-describedby="input-group-1" placeholder="New Password" autocomplete="off">
                            <a href="javascript:;" id="input-group-1" wire:click="showHide('{{ $show }}')" class="input-group-text">{{ $show }}</a>
                        </div>
                        @error('new_password')
                        <div class="text-theme-6 mt-2">This field is required</div>
                        @enderror
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Submit</button>&nbsp;
                        <a class="btn btn-default py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" href="/login">Sign In</a>
                    </div>
                    @if ($error)
                        {!! $error !!}
                    @endif
                </form>
                @else
                <h2 class="intro-x font-bold text-theme-6 text-2xl xl:text-3xl text-center xl:text-left">
                    Link expired!!!
                </h2>
                @endif
                @include('includes.footer')
            </div>
        </div>
        <!-- END: Login Form -->
    </div> --}}
</div>

<div>


    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content text-center">

                        <img src="/assets/img/logo.svg" alt="" class="w-25">
                        <h4 class="">Password Recovery</h4>
                        <p class="signup-link">Enter your username and instructions will sent to you!</p>

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
                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="username" wire:model.defer="username" type="text" class="form-control"
                                        placeholder="Username">
                                    @error('username')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Reset</button>
                                        <a href="/login" class="btn btn-warning">Login Here</a>
                                    </div>
                                </div>

                            </div>
                        </form>
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
                @if ($success)
                    {!! $success !!}
                @else
                <form wire:submit.prevent="recover">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Forgot Password
                    </h2>
                    <div class="intro-x mt-8">
                        <input type="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Enter Your Registered Email" wire:model.defer="email" required>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Recover</button>&nbsp;
                        <a class="btn btn-default py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" href="/login">Sign In</a>
                    </div>
                    @if ($error)
                        {!! $error !!}
                    @endif
                </form>
                @endif
                @include('includes.footer')
            </div>
        </div>
        <!-- END: Login Form -->
    </div> --}}
</div>

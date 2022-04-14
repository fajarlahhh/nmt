<div>
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Get started</h1>
                        <p class="signup-link">Already have an account? <a href="/login">Log in</a></p>
                        <form class="text-left" wire:submit.prevent="submit">
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
                                <div id="fullname-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    <input id="name" wire:model.defer="name" type="text" class="form-control"
                                        placeholder="Full Name">
                                    @error('name')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>
                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-at-sign">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" wire:model.defer="email" type="text" value="" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>
                                <div id="password-field" class="field-wrapper input ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" wire:model.defer="password" type="password" value=""
                                        placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>

                                <select class="form-control form-control-sm" wire:model.defer="contract">
                                    <option value="" selected>-- Choose Package --</option>
                                    @foreach ($data_contract as $item)
                                        <option value="{{ $item->getKey() }}">{{ $item->name }} - $
                                            {{ number_format($item->value) }}</option>
                                    @endforeach
                                </select>
                                @error('contract')
                                    <span class="text-danger">This field is required</span>
                                @enderror
                                <div class="field-wrapper terms_condition mt-4">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="checkbox" class="new-control-input">
                                            <span class="new-control-indicator"></span><span>I agree to the <a
                                                    href="javascript:void(0);"> terms and conditions </a></span>
                                        </label>
                                    </div>
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
                                        <button type="submit" class="btn btn-primary" value="">Get Started!</button>
                                    </div>
                                </div>
                                @if (session()->has('error'))
                                    <div class="text-danger">{!! session('error') !!}</div>
                                @endif

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
            <a href="/" class="-intro-x flex items-center pt-5">
                <img alt="{{ config('app.name') }}" class="w-10" src="/images/logo-full.png">
                <span class="text-white text-lg ml-3">
                    Solution <span class="font-medium">Stake</span>
                    <hr class="text-white">
                </span>
            </a>
            <div class="-intro-x grid font-medium grid-cols-12 gap-6 mt-2 text-dark">
                <div class="intro-y col-span-12 lg:col-span-8 box p-5" style="max-height: 600px; overflow-y: auto;">
                    <div class="text-center"><strong>MARKETING PLAN</strong></div>
                    <hr class="mt-2 mb-2">
                    <strong>Contract :</strong>
                    <p><i data-feather="check"></i> $100 Get $160</p>
                    <p><i data-feather="check"></i> $500 Get $800</p>
                    <p><i data-feather="check"></i> $1000 Get $1600</p>
                    <p><i data-feather="check"></i> $2000 Get $3200</p>
                    <p><i data-feather="check"></i> $5000 Get $8000</p>
                    <p><i data-feather="check"></i> $10000 Get $19000</p>
                    <p><i data-feather="check"></i> $15000 Get $28500</p>
                    <p><i data-feather="check"></i> $20000 Get $38000</p>
                    <p><i data-feather="check"></i> $25000 Get $47500</p>
                    <p><i data-feather="check"></i> $30000 Get $57000</p>
                </div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <form wire:submit.prevent="submit">
                    <div class="intro-y mt-2 xl:hidden">
                        <div class="alert alert-dark show">

                            <h3 class="text-2xl text-center">

                                <a href="/" class="-intro-x flex text-center">
                                    <img alt="{{ config('app.name') }}" class="w-20" style="margin:auto"
                                        src="/images/logo.png">
                                </a>
                                Marketing Plan
                            </h3>
                            <hr class="mt-2 mb-2">
                            <strong>Contract :</strong>
                            <p><i data-feather="check"></i> $100 Get $160</p>
                            <p><i data-feather="check"></i> $500 Get $800</p>
                            <p><i data-feather="check"></i> $1000 Get $1600</p>
                            <p><i data-feather="check"></i> $2000 Get $3200</p>
                            <p><i data-feather="check"></i> $5000 Get $8000</p>
                            <p><i data-feather="check"></i> $10000 Get $19000</p>
                            <p><i data-feather="check"></i> $15000 Get $28500</p>
                            <p><i data-feather="check"></i> $20000 Get $38000</p>
                            <p><i data-feather="check"></i> $25000 Get $47500</p>
                            <p><i data-feather="check"></i> $30000 Get $57000</p>
                        </div>
                    </div>
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left mt-5">
                        Sign Up Here
                    </h2>
                    <div class="intro-x mt-8">
                        <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block"
                            wire:model.defer="username" placeholder="Username" required>
                        <input type="text"
                            class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                            placeholder="Full Name" wire:model.defer="name" required>
                        <input type="email"
                            class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                            placeholder="Email" wire:model.defer="email" required>
                        <input type="password"
                            class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                            wire:model.defer="password" placeholder="Password" required>
                        <select data-placeholder="Contract" wire:model.defer="contract"
                            class="intro-x login__input form-select py-3 px-4 border-gray-300 mt-4" required>
                            <option value="" selected>-- Choose Contract --</option>
                            @foreach ($data_contract as $item)
                                <option value="{{ $item->getKey() }}">{{ $item->name }} - $
                                    {{ number_format($item->value) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
                        <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top"
                            type="button" wire:click="login">Sign in</button>
                    </div>
                    @if ($message)
                        {!! $message !!}
                    @endif
                </form>
                @if ($error)
                    <div class="alert alert-danger show mt-3 mb-2" role="alert">
                        {!! $error !!}
                    </div>
                @endif
                @include('includes.footer')
            </div>
        </div>
        <!-- END: Login Form -->
    </div> --}}
</div>

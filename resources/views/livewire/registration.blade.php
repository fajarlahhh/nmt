<div>
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content text-center">

                        <img src="/assets/img/logo.svg" alt="" class="w-25">
                        <h4 class="">Registration</h4>
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
                                <div id="phone-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    <input id="phone" wire:model.defer="phone" type="text" class="form-control"
                                        placeholder="Phone Number">
                                    @error('phone')
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
                                @if (!$ref)
                                <div id="referral-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                    <input id="referral" wire:model.defer="referral" type="text" class="form-control"
                                        placeholder="Referral">
                                    @error('referral')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>
                                @endif
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
                                        <button type="submit"
                                        data-sitekey="{{env('RECAPTCHAV3_SITEKEY')}}"
                                        data-callback='handle'
                                        data-action='submit' class="btn btn-primary" value="">Get Started!</button>
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
    @push('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{env('RECAPTCHAV3_SITEKEY')}}"></script>
    <script>
        function handle(e) {
            grecaptcha.ready(function () {
                grecaptcha.execute('{{env('RECAPTCHAV3_SITEKEY')}}', {action: 'submit'})
                    .then(function (token) {
                        @this.set('captcha', token);
                    });
            })
        }
    </script>
</div>

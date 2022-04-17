<div>
    <div class="form">
        <form wire:submit.prevent="login" class="text-left">

            <div id="username-field" class="field-wrapper input">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <input id="username" type="text" class="form-control" wire:model.defer="username"
                    placeholder="Username">
                @error('username')
                    <span class="text-danger">This field is required</span>
                @enderror
            </div>

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
                    data-action='submit' class="btn btn-primary" value="">Log In</button>
                </div>

            </div>
            @if (session()->has('error'))
                <div class="text-danger">{!! session('error') !!}</div>
            @endif

            <div class="field-wrapper text-center keep-logged-in">
                <div class="n-chk new-checkbox checkbox-outline-primary">
                    <label class="new-control new-checkbox checkbox-outline-primary">
                        <input type="checkbox" class="new-control-input">
                        <span class="new-control-indicator"></span>Keep me logged in
                    </label>
                </div>
            </div>
        </form>

        <div class="field-wrapper">
            <a href="/forgot" class="forgot-pass-link">Forgot Password?</a>
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

    @endpush
</div>

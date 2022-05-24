<div>
  <div class="form-container">
    <div class="form-form">
      <div class="form-form-wrap">
        <div class="form-container">
          <div class="form-content text-center">

            <img src="/assets/img/logo.png" alt="" class="w-25">
            <h4 class="">Password Recovery</h4>
            <p class="signup-link">Enter your username and instructions will sent to you!</p>

            @if (session()->has('message'))
              <div class="alert alert-success border-0">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x close" data-dismiss="alert">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                  </svg></button>
                {!! session('message') !!}
              </div>
            @endif
            @if (session()->has('error'))
              <div class="alert alert-danger border-0">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x close" data-dismiss="alert">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                  </svg></button>
                {!! session('error') !!}
              </div>
            @endif
            <form class="text-left mb-5" wire:submit.prevent="submit">
              <div class="form">
                <div id="username-field" class="field-wrapper input">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user">
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
                    <button type="submit" data-sitekey="{{ env('RECAPTCHAV3_SITEKEY') }}" data-callback='handle'
                      data-action='submit' class="btn btn-primary">Send Recovery</button>
                    <a href="/login" class="btn btn-warning">Login Here</a>
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
        <img src="/assets/img/logo.png" alt="" class="w-75" style="margin-top: 80px">
      </div>
    </div>
  </div>
</div>

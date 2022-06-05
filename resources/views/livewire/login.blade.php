<div>
  <!-- begin login -->
  <div class="login login-with-news-feed">
    <!-- begin news-feed -->
    <div class="news-feed">
      <div class="news-image" style="background-image: url(../assets/img/login-bg/login-bg-11.jpg)"></div>
      <div class="news-caption">
        <h4 class="caption-title"><b>Nice</b> Metavest</h4>
      </div>
    </div>
    <!-- end news-feed -->
    <!-- begin right-content -->
    <div class="right-content">
      <!-- begin login-header -->
      <div class="login-header text-center">
        <img src="/assets/img/logo.png" class="width-100">
        <div class="brand">
          <b>Nice</b> Metavest
        </div>
      </div>
      <!-- end login-header -->
      <!-- begin login-content -->
      <div class="login-content">
        @if (session()->has('error'))
          <div class="alert alert-danger ">
            <span class="close" data-dismiss="alert">×</span>
            {!! session('error') !!}
          </div>
        @endif
        <form wire:submit.prevent="login" class="margin-bottom-0">
          <div class="form-group m-b-15">
            <input type="text" class="form-control form-control-lg" wire:model.defer="username" required
              placeholder="Username">
            @error('username')
              <span class="text-danger">This field is required</span>
            @enderror
          </div>
          <div class="form-group m-b-15">
            <input data-toggle="password" data-placement="after" class="form-control form-control-lg" type="password"
              wire:model.defer="password" placeholder="Password" />
          </div>
          <div class="login-buttons text-center">
            <button type="submit" class="btn btn-success btn-lg">Sign me in</button>
          </div>
        </form>
      </div>
      <div class="m-t-20 m-b-40 p-b-40 text-inverse text-center">
        Forgot Password? Click <a href="/forgot">here</a>.
      </div>
    </div>
    <!-- end login-content -->
  </div>
  <!-- end login -->
</div>

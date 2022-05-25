<div>
  @push('css')
  @endpush

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Profile</li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Profile </h1>
  <!-- end page-header -->

  @include('includes.message')
  <form wire:submit.prevent="submit">
    <div class="card">
      <div class="card-body">
        <div class="form-group mb-2">
          <label for="username" class="form-label">Username</label>
          <input id="username" type="text" class="form-control" value="{{ $username }}" readonly>
        </div>
        <div class="form-group mb-2">
          <label for="name" class="form-label">Full Name</label>
          <input id="name" type="text" class="form-control" wire:model.defer="name">
          @error('name')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        <div class="form-group mb-2">
          <label for="phone" class="form-label">Phone</label>
          <input id="phone" type="text" class="form-control" wire:model.defer="phone">
          @error('phone')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        <div class="form-group mb-2">
          <label for="email" class="form-label">Email</label>
          <input id="email" type="text" class="form-control" wire:model.defer="email">
          @error('email')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        <div class="form-group mb-2">
          <label for="referralProfile" class="form-label">Upline</label>
          <input id="referralProfile" type="text" class="form-control"
            value="{{ $upline ? $upline->username : '' }}" readonly>
        </div>
        <hr>
        <div class="form-group mb-2">
          <label for="wallet" class="form-label">USDT Wallet <small class="text-danger">(BEP
              20)</small></label>
          <input id="wallet" type="text" class="form-control text-gray-700" wire:model.defer="wallet"
            placeholder="USDT Wallet">
          @error('wallet')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        @if (auth()->user()->googleAuthSecret)
          <hr class="mb-1">
          <div class="form-group mb-2">
            <label for="pin" class="form-label">Google Auth PIN</label>
            <input id="pin" type="text" class="form-control" wire:model.defer="pin"
              placeholder="Enter Your Google Authenticator PIN" autocomplete="off">
            @error('pin')
              <span class="text-danger">This field is required</span>
            @enderror
          </div>
        @endif
      </div>
      <div class="card-footer text-center">
        <input type="submit" class="btn btn-primary " value="Update">
      </div>
    </div>
  </form>
</div>

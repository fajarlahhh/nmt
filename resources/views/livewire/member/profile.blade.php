<div>
  @push('css')
  @endpush

  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </div>
    <div class="col-xs-12">
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
              <label for="wallet" class="form-label">USDT Wallet </label>
              <input id="wallet" type="text" class="form-control text-gray-700" wire:model.defer="wallet">
              @error('wallet')
                <span class="text-danger">This field is required</span>
              @enderror
            </div>
            @if (auth()->user()->security)
              <hr class="mb-1">
              <div class="form-group mb-2">
                <label for="security" class="form-label">Security Pin</label>
                <input id="security" type="text" class="form-control" wire:model.defer="security" autocomplete="off"
                  s>
                @error('security')
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
  </div>
</div>

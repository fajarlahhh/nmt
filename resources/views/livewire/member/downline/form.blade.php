<div>
  @push('css')
    <link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
  @endpush

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="/downline">Downline</a></li>
    <li class="breadcrumb-item active">New</li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Downline <small>New</small></h1>
  <!-- end page-header -->

  @include('includes.message')
  <form wire:submit.prevent="submit">
    <div class="card">
      <div class="card-body">
        <div class="form-group mb-2">
          <label for="username" class="form-label">Username</label>
          <input id="username" type="text" class="form-control" autocomplete="off" wire:model.defer="username">
          @error('username')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        <div class="form-group mb-2">
          <label for="name" class="form-label">Name</label>
          <input id="name" type="text" class="form-control" autocomplete="off" wire:model.defer="name">
          @error('name')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        <div class="form-group mb-2">
          <label for="phone" class="form-label">Phone</label>
          <input id="phone" type="text" class="form-control" autocomplete="off" wire:model.defer="phone">
          @error('phone')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        <div class="form-group mb-2">
          <label for="email" class="form-label">Email</label>
          <input id="email" type="email" class="form-control" autocomplete="off" wire:model.defer="email">
          @error('email')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        <div class="form-group mb-2">
          <label for="oldPassword" class="form-label">Password</label>
          <input data-toggle="password" data-placement="after" class="form-control" wire:model.defer="password"
            type="password" />
          @error('email')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        <hr>
        <div class="form-group mb-2">
          <label for="upline" class="form-label">Upline</label>
          <select wire:model.defer="upline" class="form-control selectpicker" data-size="10" data-live-search="true"
            data-style="btn-white">
            <option value="{{ auth()->id() }}" selected>{{ auth()->user()->username }}
              ({{ auth()->user()->name }})
            </option>
            @foreach ($dataUpline as $row)
              <option value="{{ $row->getKey() }}">{{ $row->username }} ({{ $row->name }})
              </option>
            @endforeach
          </select>
          @error('upline')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        <div class="form-group mb-2">
          <label for="contract" class="form-label">Contract</label>
          <select class="form-control selectpicker" wire:model.defer="contract" data-size="10" data-live-search="true"
            data-style="btn-white">
            <option value="" selected>-- Choose Contract --</option>
            @foreach ($dataContract as $row)
              <option value="{{ $row->getKey() }}">{{ $row->name }} - $ {{ number_format($row->value) }}</option>
            @endforeach
          </select>
          @error('contract')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>

      </div>
      <div class="card-footer text-center">
        <input type="submit" class="btn btn-primary" value="Submit">
      </div>
    </div>
  </form>

  @push('scripts')
    <script>
      Livewire.on('reinitialize', id => {
        $('.selectpicker').selectpicker();
      });
    </script>
    <script src="/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  @endpush
</div>

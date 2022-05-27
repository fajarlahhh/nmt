<div>
  @push('css')
    <link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
  @endpush

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="/downline">Downline</a></li>
    <li class="breadcrumb-item active">Enrollment</li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Downline <small>Enrollment</small></h1>
  <!-- end page-header -->

  @include('includes.message')
  @if (isset($deposit))
    <form wire:submit.prevent="done">
      <div class="intro-y box text-center overflow-x-auto">
        <h5 class="text-2xl">Waiting For Fund . . .</h5>
        <table class="table">
          <tr>
            <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-right">
              Amount (USDT BEP-20)
            </td>
            <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
              {{ number_format($deposit->first()->amount, 5) }}
            </td>
          </tr>
          <tr>
            <td colspan="2" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">
              <small>(The amount of USDT to be transferred must match the
                amount)</small>
            </td>
          </tr>
          <tr>
            <td colspan="2" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">
              Send To <strong>{{ $deposit->wallet }}</strong>
              <br>
              <div style="display: flex; justify-content: center;" class="mt-3">
                {!! QrCode::size(200)->generate($deposit->wallet) !!}
              </div><br>
            </td>
          </tr>
          <tr>
            <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-right">
              Description
            </td>
            <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
              {{ $deposit->first()->requisite . ' for member ' . $deposit->first()->user->username . " (contract $ " . number_format($deposit->first()->user->contract->value) . ')' }}
            </td>
          </tr>
          <tr>
            <td colspan="2" class="border border-b-2 dark:border-dark-5 whitespace-nowrapt text-center">
              <form wire:submit.prevent="done">
                <input wire:model.defer="information" class="form-control" cols="30" rows="2"
                  placeholder="Insert TX ID Here" />
                @error('information')
                  <span class="text-danger">This field is required</span><br>
                @enderror

                <input type="submit" class="btn btn-success mt-3 m-r-20" value="Done">
                <button type="button" class="btn btn-danger mt-3 "
                  wire:click="cancel({{ $deposit->first()->user_id }})">Cancel</button>
              </form>
            </td>
          </tr>
        </table>
        <br>
      </div>
    </form>
  @else
    <form wire:submit.prevent="submit">
      <a href="/pin" class="text-decoration-none">
        <div class="widget widget-stats bg-info">
          <div class="stats-icon stats-icon-lg"><i class="fas fa-xs fa-fw fa-ticket-alt"></i></div>
          <div class="stats-content">
            <div class="stats-title">PIN</div>
            <div class="stats-number">{{ number_format(auth()->user()->available_pin) }}</div>
          </div>
        </div>
      </a>
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
                <option value="{{ $row->getKey() }}">$ {{ number_format($row->value) }} - {{ $row->name }}
                </option>
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
      </div>x
    </form>
  @endif

  @push('scripts')
    <script>
      Livewire.on('reinitialize', id => {
        $('.selectpicker').selectpicker();
      });
    </script>
    <script src="/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  @endpush
</div>

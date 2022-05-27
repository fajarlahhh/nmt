<div>
  @push('css')
  @endpush

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Withdrawal</li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Withdrawal </h1>
  <!-- end page-header -->

  @include('includes.message')
  <div class="alert alert-warning border-0">
    Rules:
    <ul>
      <li>
        Available every weekdays (07.00 - 13.00 UTC+2)
      </li>
      <li>
        $ {{ auth()->user()->contract->fee_withdrawal }} Fee
      </li>
      <li>
        Max. Claim $ {{ auth()->user()->contract->minimum_withdrawal }}
      </li>
      <li>
        Min. Claim $ {{ number_format(auth()->user()->contract->maximum_withdrawal) }}
      </li>
      <li>
        1 x 24 hours proccess
      </li>
    </ul>
  </div>
  <form wire:submit.prevent="submit">
    <div class="card">
      <div class="card-body">
        <div class="form-group mb-2">
          <label for="available" class="form-label text-dark">Available Bonus</label>
          <input id="available" type="text" class="form-control" readonly
            value="{{ number_format(auth()->user()->available_bonus) }}">
          @error('available')
            <span class="text-danger">This field is required</span>
          @enderror
        </div>
        <div class="form-group mb-2">
          <label for="amount" class="form-label text-dark">Withdrawal Amount</label>
          <input id="amount" type="number" min="0" step="1" autocomplete="off" class="form-control"
            wire:model.defer="amount">
          @error('amount')
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
        <input type="submit" class="btn btn-primary " value="Submit">
      </div>
    </div>
  </form>
</div>

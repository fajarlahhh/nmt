<div>
  @push('css')
    <link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
  @endpush

  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Contract Renewal</li>
      </ol>
    </div>
    <div class="col-xs-12">
      @include('includes.message')
      <div class="alert alert-info">
        <ul>
          <li><strong>Available Pin: {{ number_format(auth()->user()->available_pin) }}</strong></li>
          <li><strong>Available Balance: {{ number_format(auth()->user()->available_balance) }} USDT </strong></li>
        </ul>
      </div>
      <form wire:submit.prevent="submit">
        <div class="card">
          <div class="card-body">
            <div class="form-group mb-2">
              <label for="contract" class="form-label">Contract</label>
              <select class="form-control selectpicker" wire:model.defer="contract" data-size="10"
                data-live-search="true" data-style="btn-white">
                <option value="" selected>-- Choose Contract --</option>
                @foreach ($dataContract as $row)
                  @php
                    $aktif = ($row->value * 15000) / 14500 < auth()->user()->available_balance ? '' : 'disabled';
                  @endphp
                  <option value="{{ $row->getKey() }}" {{ $aktif }}>$ {{ number_format($row->value) }} =
                    {{ number_format(round(($row->value * 15000) / 14500)) }} USDT -
                    {{ $row->name }}
                  </option>
                @endforeach
              </select>
              @error('contract')
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
            <input type="submit" class="btn btn-primary" value="Submit">
          </div>
        </div>
      </form>
    </div>
  </div>
  @push('scripts')
    <script>
      Livewire.on('reinitialize', id => {
        $('.selectpicker').selectpicker();
      });
    </script>
    <script src="/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  @endpush
</div>

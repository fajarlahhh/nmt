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
      <div class="alert alert-warning border-0">

      </div>
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
                  <strong>{{ number_format($deposit->amount, 5) }}</strong>
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
                  Please send <strong>{{ number_format($deposit->amount, 5) }}</strong> USDT
                  <small>BEP-20</small> to address
                  <strong>{{ $deposit->wallet }}</strong>
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
                  {{ $deposit->requisite . ' for member ' . $deposit->user->username . " (contract $ " . number_format($deposit->user->contract->value) . ')' }}
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
                    <button type="button" class="btn btn-danger mt-3"
                      wire:click="cancel({{ $deposit->user_id }})">Cancel</button>
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
                <label for="contract" class="form-label">Contract</label>
                <select class="form-control selectpicker" wire:model.defer="contract" data-size="10"
                  data-live-search="true" data-style="btn-white">
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
              <hr>
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
      @endif
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
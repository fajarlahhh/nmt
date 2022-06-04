<div>
  @push('css')
  @endpush

  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Withdrawal</li>
      </ol>
    </div>
    <div class="col-xs-12">
      @include('includes.message')
      @include('form.bonus')
      <div class="card">
        <div class="card-body">
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
                Min. Claim $ {{ auth()->user()->contract->minimum_withdrawal }}
              </li>
              <li>
                Max. Claim $ {{ number_format(auth()->user()->contract->maximum_withdrawal) }}
              </li>
              <li>
                1 x 24 hours proccess
              </li>
            </ul>
          </div>
          @if (auth()->user()->withdrawal_today->count() === 0)
            @if ($today < 1 || $today > 5)
            @else
              @if ((int) date('Hms') < 70000 || (int) date('Hms') > 150000)
              @else
                <form wire:submit.prevent="submit">
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group mb-2">
                        <label for="available" class="form-label text-dark">Available Bonus</label>
                        <input id="available" type="text" class="form-control" readonly
                          value="{{ number_format(auth()->user()->available_bonus) }}">
                      </div>
                      <div class="form-group mb-2">
                        <label for="amount" class="form-label text-dark">Withdrawal Amount</label>
                        <input id="amount" type="number" min="0" step="1" autocomplete="off" class="form-control"
                          wire:model.defer="amount">
                        @error('amount')
                          <span class="text-danger">This field is required</span>
                        @enderror
                      </div>

                      @if (auth()->user()->security)
                        <hr class="mb-1">
                        <div class="form-group mb-2">
                          <label for="security" class="form-label">Security Pin</label>
                          <input id="security" type="text" class="form-control" wire:model.defer="security"
                            autocomplete="off" s>
                          @error('security')
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
                <div class="modal fade" wire:ignore.self id="confirmationModal" tabindex="-1" role="dialog"
                  aria-labelledby="confirmationModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <form wire:submit.prevent="confirmation">
                        <div class="modal-header">
                          <h5 class="modal-title" id="confirmationModalLabel">Withdrawal Confirmation</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            x
                          </button>
                        </div>
                        @if (auth()->user()->withdrawal_today->count() === 0)
                          <div class="modal-body text-center">
                            <h5>
                              You Got {{ $usdtWd }} USDT <small>(After Fee $
                                {{ auth()->user()->contract->fee_withdrawal }})</small><br>To<br>
                              <small> {{ auth()->user()->wallet }}</small>
                              <br>
                              <small class="text-danger">Make sure your wallet address is right</small>
                            </h5>
                          </div>
                          <div class="modal-footer text-center">
                            <input type="submit" class="mt-4 btn btn-success" value="Submit">
                          </div>
                        @endif
                      </form>
                    </div>
                  </div>
                </div>
                @push('scripts')
                  <script>
                    window.livewire.on('confirmation', () => {
                      $('#confirmationModal').modal('show');
                    });
                  </script>
                @endpush
              @endif
            @endif
          @else
            <div class="alert alert-danger border-0 text-center">
              You have made a withdrawal today
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

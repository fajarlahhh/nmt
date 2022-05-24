<div class="modal fade" wire:ignore.self id="bonusModal" tabindex="-1" role="dialog"
  aria-labelledby="bonusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title" id="bonusModalLabel">Claim Bonus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            x
          </button>
        </div>
        @if (!auth()->user()->withdrawal_active_today)
          <div class="modal-body">
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
                  Max. Claim {{ auth()->user()->contract->minimum_withdrawal }}
                </li>
                <li>
                  Min. Claim {{ auth()->user()->contract->maximum_withdrawal }}
                </li>
                <li>
                  1 x 24 hours proccess
                </li>
              </ul>
            </div>
            {{-- @if ($today < 1 || $today > 5)
            @else
              @if ((int) date('Hms') < 70000 || (int) date('Hms') > 150000)
              @else --}}
            <div class="form-group mb-2">
              <label for="availableActive" class="form-label text-dark">Available</label>
              <input id="availableActive" type="text" class="form-control text-gray-700" readonly
                value="$ {{ number_format($availableActive) }}">
              @error('availableActive')
                <span class="text-danger">This field is required</span>
              @enderror
            </div>
            <div class="form-group mb-2">
              <label for="amountActive" class="form-label text-dark">Amount</label>
              <input id="amountActive" type="number" min="0" autocomplete="off" class="form-control text-gray-700"
                wire:model="amountActive">
              @error('amountActive')
                <span class="text-danger">This field is required</span>
              @enderror
            </div>
            {{-- @endif
            @endif --}}
          </div>
          {{-- @if ($today < 1 || $today > 5)
          @else
            @if ((int) date('Hms') < 70000 || (int) date('Hms') > 150000)
            @else --}}
          <div class="modal-footer text-center">
            <input type="submit" wire:click.prevent="activeCount" class="btn btn-primary " value="Submit">
          </div>
          {{-- @endif
          @endif --}}
        @else
          <div class="modal-body text-center">
            <h5 class="text-danger">Withdrawals can only be done once a day</h5>
          </div>
        @endif
      </form>
    </div>
  </div>
</div>

<div class="modal fade" wire:ignore.self id="activeSubmit" tabindex="-1" role="dialog"
  aria-labelledby="activeSubmitLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title" id="activeSubmitLabel">Claim Active Income</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            x
          </button>
        </div>
        @if (!auth()->user()->withdrawal_active_today)
          <div class="modal-body text-center">
            <h5>
              You Got {{ $usdtWd }} USDT <small>(After Fee 10%)</small><br>
              <small>Your Wallet {{ auth()->user()->wallet }}</small>
            </h5>
          </div>
          <div class="modal-footer text-center">
            <input type="submit" wire:click.prevent="activeSubmit" class="mt-4 btn btn-success" value="Claim Now">
          </div>
        @endif
      </form>
    </div>
  </div>
</div>

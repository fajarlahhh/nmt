<div class="modal fade" wire:ignore.self id="activeModal" tabindex="-1" role="dialog"
    aria-labelledby="activeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="activeModalLabel">Claim Active Income</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                @if (auth()->user()->withdrawal_active_today->count() === 0)
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="availableActive" class="form-label">Available Balance</label>
                            <input id="availableActive" type="text" class="form-control text-gray-700" readonly
                                value="$ {{ number_format($availableActive) }}">
                            @error('availableActive')
                                <span class="text-danger">This field is required</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="amountActive" class="form-label">Amount</label>
                            <input id="amountActive" type="number" min="0" autocomplete="off"
                                class="form-control text-gray-700" wire:model="amountActive">
                            @error('amountActive')
                                <span class="text-danger">This field is required</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" wire:click.prevent="activeCount" class="mt-4 btn btn-primary "
                            value="Submit">
                    </div>
                @else
                    <div class="modal-body text-center">
                        <h3 class="text-danger">Withdrawals can only be done once a day</h3>
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
                @if (auth()->user()->withdrawal_active_today->count() === 0)
                    <div class="modal-body text-center">
                        <h5>
                            You Got {{ $usdtWd }} USDT <small>(After Fee 10%)</small><br>
                            <small>Your Wallet {{ auth()->user()->wallet }}</small>
                        </h5>
                    </div>
                    <div class="modal-footer text-center">
                        <input type="submit" wire:click.prevent="activeSubmit" class="mt-4 btn btn-success"
                            value="Claim Now">
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

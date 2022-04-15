<div class="modal fade" wire:ignore.self id="contractModal" tabindex="-1" role="dialog"
    aria-labelledby="contractModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="contractModalLabel">Claim Fund ${{ auth()->user()->contract->value }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                @if (auth()->user()->invalid_at < now())
                    <div class="modal-body text-center">
                        <h5>
                            You Got {{ $usdtWd }} USDT <br>
                            <small>Your Wallet {{ auth()->user()->wallet }}</small>
                        </h5>
                    </div>
                    <div class="modal-footer text-center">
                        <input type="submit" wire:click.prevent="contractSubmit" class="mt-4 btn btn-success"
                            value="Claim Now">
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

<div class="modal fade" wire:ignore.self id="restakeModal" tabindex="-1" role="dialog"
    aria-labelledby="restakeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="restakeModalLabel">Restake</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                @if (!auth()->user()->invalid_at)
                    <div class="modal-body text-center">
                        <div class="form-group mb-2">
                            <label for="username" class="form-label">Package</label>
                            <select data-placeholder="Package" wire:model="contract"
                                class="form-control form-control-sm">
                                <option value="" selected>-- Choose Package --</option>
                                @if ($dataContract)
                                @foreach ($dataContract as $item)
                                    <option value="{{ $item->getKey() }}">{{ $item->name }} - $
                                        {{ number_format($item->value) }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('contract')
                                <span class="text-danger">This field is required</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <input type="submit" wire:click.prevent="restakeSubmit" class="mt-4 btn btn-success"
                            value="Claim Now">
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

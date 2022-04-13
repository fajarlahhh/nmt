<div class="modal fade" wire:ignore.self id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profilModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="profilModalLabel">My Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" type="text" class="form-control" value="{{ auth()->user()->username }}"
                            placeholder="Username" readonly>
                        @error('username')
                            <span class="text-danger">This field is required</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="nameProfile" class="form-label">Full Name</label>
                        <input id="nameProfile" type="text" class="form-control" wire:model.defer="nameProfile"
                            placeholder="Name">
                        @error('nameProfile')
                            <span class="text-danger">This field is required</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="emailProfile" class="form-label">Email</label>
                        <input id="emailProfile" type="text" class="form-control" wire:model.defer="emailProfile"
                            placeholder="Email">
                        @error('emailProfile')
                            <span class="text-danger">This field is required</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="walletProfile" class="form-label">USDT Wallet <small
                                class="text-danger">(BEP
                                20)</small></label>
                        <input id="walletProfile" type="text" class="form-control text-gray-700"
                            wire:model.defer="walletProfile" placeholder="BEP-20 Wallet">
                        @error('walletProfile')
                            <span class="text-danger">This field is required</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="referralProfile" class="form-label">Upline</label>
                        <input id="referralProfile" type="text" class="form-control" value="{{ auth()->user()->upline->username }}"
                            placeholder="Upline" readonly>
                    </div>
                    @if (auth()->user()->google2fa_secret)
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
                <div class="modal-footer">
                    <input type="submit" wire:click.prevent="profileSubmit" class="mt-4 btn btn-primary " value="Update">
                </div>
            </form>
        </div>
    </div>
</div>

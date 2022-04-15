<div class="modal fade" wire:ignore.self id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="profilModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="profilModalLabel">Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="oldPassword" class="form-label">Old Password</label>
                        <input id="oldPassword" type="password" class="form-control" wire:model.defer="oldPassword" placeholder="Old Password" autocomplete="off">
                        @error('oldPassword')
                        <span class="text-danger">This field is required</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input id="newPassword" type="password" class="form-control" wire:model.defer="newPassword" placeholder="New Password" autocomplete="off">
                        @error('newPassword')
                        <span class="text-danger">This field is required</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" wire:click.prevent="passwordSubmit" class="mt-4 btn btn-primary " value="Update">
                </div>
            </form>
        </div>
    </div>
</div>

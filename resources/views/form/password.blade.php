<div class="modal fade" wire:ignore.self id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="profilModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
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
                        <label for="old_password" class="form-label">Old Password</label>
                        <input id="old_password" type="password" class="form-control" wire:model.defer="old_password" placeholder="Old Password" autocomplete="off">
                        @error('old_password')
                        <span class="text-danger">This field is required</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="new_password" class="form-label">New Password</label>
                        <input id="new_password" type="password" class="form-control" wire:model.defer="new_password" placeholder="New Password" autocomplete="off">
                        @error('new_password')
                        <span class="text-danger">This field is required</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" wire:click.prevent="submitPassword" class="mt-4 btn btn-primary " value="Update">
                </div>
            </form>
        </div>
    </div>
</div>

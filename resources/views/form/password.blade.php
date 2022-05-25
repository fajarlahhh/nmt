<div class="modal fade" wire:ignore.self id="passwordModal" tabindex="-1" role="dialog"
  aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="{{ route('gantisandi') }}" method="POST" data-parsley-validate="true">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="profilModalLabel">Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            x
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-2">
            <label for="oldPassword" class="form-label">Old Password</label>
            <input data-toggle="password" data-placement="after" class="form-control" required type="password"
              name="oldPassword" placeholder="Old Password" data-parsley-errors-container="#errors-oldPassword" />
            <div id="errors-oldPassword"></div>
          </div>
          <div class="form-group mb-2">
            <label for="newPassword" class="form-label">New Password</label>
            <input data-toggle="password" data-placement="after" class="form-control" required type="password"
              name="newPassword" placeholder="New Password" data-parsley-errors-container="#errors-newPassword" />
            <div id="errors-newPassword"></div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="mt-4 btn btn-primary" value="Update">
        </div>
      </form>
    </div>
  </div>
</div>

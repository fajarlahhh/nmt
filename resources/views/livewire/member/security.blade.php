<div>
  @push('css')
  @endpush

  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Security</li>
      </ol>
    </div>
    <div class="col-xs-12">
      @include('includes.message')
      <div class="card">
        <div class="card-header pointer-cursor d-flex align-items-center " data-toggle="collapse"
          data-target="#collapseTwo">
          <i class="fa fa-circle fa-fw text-indigo mr-2 f-s-8"></i> Pin
        </div>
        <div id="collapseTwo" class="collapse show" data-parent="#accordion">
          <form wire:submit.prevent="submit">
            <div class="card-body">
              <div class="form-group mb-2">
                <label for="newPin" class="form-label">New Security PIN</label>
                <input id="newPin" type="text" class="form-control" wire:model.defer="newPin">
                @error('newPin')
                  <span class="text-danger">This field is required</span>
                @enderror
              </div>
              @if (auth()->user()->security)
                <div class="form-group mb-2">
                  <label for="oldPin" class="form-label">Old Security PIN</label>
                  <input id="oldPin" type="text" class="form-control" wire:model.defer="oldPin">
                  @error('oldPin')
                    <span class="text-danger">This field is required</span>
                  @enderror
                </div>
              @endif
            </div>
            <div class="card-footer text-center">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

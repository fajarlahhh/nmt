<div>
  @push('css')
  @endpush

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Pin</li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Pin <a href="javascript:;" data-toggle="modal" data-target="#pinModal"
      class="pull-right btn btn-primary btn-sm">Send</a>
  </h1>
  <!-- end page-header -->

  <!-- begin panel -->
  <div class="panel panel-inverse" data-sortable-id="index-5">
    <div class="panel-heading">
      <h4 class="panel-title">History</h4>
    </div>
    <div class="panel-body">
      <div class="height-sm" data-scrollbar="true">
        <ul class="media-list media-list-with-divider media-messaging">
          @foreach (auth()->user()->pin->sortByDesc('created_at')
    as $row)
            <li class="media media-sm">
              <div class="media-body">
                <h5 class="media-heading">{{ number_format($row->nilai) }}
                  <small>{{ $row->waktu }}</small>
                </h5>
                <p>{{ $row->description }}</p>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="panel-footer">
      <h5>Available : {{ number_format(auth()->user()->available_pin) }}</h5>
    </div>
  </div>
  <!-- end panel -->

  <div class="modal fade" wire:ignore.self id="pinModal" tabindex="-1" role="dialog" aria-labelledby="pinModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <form wire:submit.prevent="submit">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="profilModalLabel">Send Pin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              x
            </button>
          </div>
          <div class="modal-body">
            @include('includes.message')
            <div class="form-group mb-2">
              <label for="amount" class="form-label">Amount</label>
              <input id="amount" type="number" step="1" class="form-control" autocomplete="off"
                wire:model.defer="amount">
              @error('amount')
                <span class="text-danger">This field is required</span>
              @enderror
            </div>
            <div class="form-group mb-2">
              <label for="username" class="form-label">Username</label>
              <input id="username" type="text" class="form-control" autocomplete="off" wire:model.defer="username">
              @error('username')
                <span class="text-danger">This field is required</span>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="mt-4 btn btn-primary" value="Send Pin">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

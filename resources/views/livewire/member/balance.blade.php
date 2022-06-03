<div>
  @push('css')
  @endpush

  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Balance</li>
      </ol>
    </div>
    <div class="col-xs-12">
      <div class="card border-0 mb-3 ">
        <!-- begin card-body -->
        <div class="card-body">
          <!-- begin title -->
          <div class="mb-3 f-s-13">
            <b>AVAILABLE BALANCE</b>
            <span class="ml-2 text-muted"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover"
                data-title="Sales by social source" data-placement="top"
                data-content="Total online store sales that came from a social referrer source." data-original-title=""
                title=""></i></span>
          </div>
          <!-- end title -->
          <!-- begin sales -->
          <h3 class="m-b-10"><span data-animation="number"
              data-value="{{ auth()->user()->available_balance }}">{{ number_format(auth()->user()->available_balance) }}</span><a
              href="javascript:;" data-toggle="modal" data-target="#balanceModal"
              class="pull-right btn btn-primary btn-sm">Send
              Balance</a>
          </h3>
          <!-- end sales -->
        </div>
        <!-- end card-body -->
        <!-- begin widget-list -->
        <div class="widget-list widget-list-rounded">
          @foreach ($data as $row)
            <!-- begin widget-list-item -->
            <a href="#" class="widget-list-item border-left-0 border-right-0 bg-transparent">
              <div class="widget-list-media icon">
                @if ($row->nilai > 0)
                  <i class="fas fa-plus-circle bg-success text-white"></i>
                @else
                  <i class="fas fa-minus-circle bg-red text-white"></i>
                @endif
              </div>
              <div class="widget-list-content">
                <div class="widget-list-title">{{ $row->description }}<br>
                  <small>{{ $row->waktu }}</small>
                </div>
              </div>
              <div class="widget-list-action text-nowrap">
                <span data-animation="number"
                  data-value="{{ $row->nilai < 0 ? -1 * $row->nilai : $row->nilai }}"></span>
              </div>
            </a>
          @endforeach
        </div>
        <!-- end widget-list -->
        <!-- begin card-body -->
        <div class="card-body text-center">
          {{ $data->links() }}
        </div>
        <!-- end card-body -->
      </div>
      <div class="modal fade" wire:ignore.self id="balanceModal" tabindex="-1" role="dialog"
        aria-labelledby="balanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
          <div class="modal-content">
            <form wire:submit.prevent="submit">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title" id="profilModalLabel">Send Balance</h5>
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
                  <input id="username" type="text" class="form-control" autocomplete="off"
                    wire:model.defer="username">
                  @error('username')
                    <span class="text-danger">This field is required</span>
                  @enderror
                </div>
                @if (auth()->user()->security)
                  <hr class="mb-1">
                  <div class="form-group mb-2">
                    <label for="security" class="form-label">Security Balance</label>
                    <input id="security" type="text" class="form-control" wire:model.defer="security"
                      autocomplete="off" s>
                    @error('security')
                      <span class="text-danger">This field is required</span>
                    @enderror
                  </div>
                @endif
              </div>
              <div class="modal-footer">
                <input type="submit" class="mt-4 btn btn-primary" value="Send Balance">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div>
  @push('css')
  @endpush

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Withdrawal</li>
  </ol>
  <!-- end breadcrumb -->

  @include('includes.message')
  <div id="accordion" class="accordion">
    <!-- begin card -->
    <div class="card">
      <div class="card-header pointer-cursor d-flex align-items-center " data-toggle="collapse"
        data-target="#collapseTwo">
        <i class="fa fa-circle fa-fw text-indigo mr-2 f-s-8"></i> History
      </div>
      <div id="collapseTwo" class="collapse show" data-parent="#accordion">
        <!-- begin widget-list -->
        <div class="widget-list widget-list-rounded">
          @foreach ($data as $row)
            <!-- begin widget-list-item -->
            <a href="#" class="widget-list-item border-left-0 border-right-0 bg-transparent">
              <div class="widget-list-media icon">
                @if ($row->nilai > 0)
                  <i class="fas fa-plus-circle bg-success text-white"></i>
                @else
                  <i class="fas fa-download bg-red text-white"></i>
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
    </div>
    <!-- end card -->
    <!-- begin card -->
    <div class="card">
      <div class="card-header pointer-cursor d-flex align-items-center collapsed" data-toggle="collapse"
        data-target="#collapseOne">
        <i class="fa fa-circle fa-fw text-red mr-2 f-s-8"></i> Form
      </div>
      <div id="collapseOne" class="collapse " data-parent="#accordion">
        <div class="card-body">
          <div class="alert alert-warning border-0">
            Rules:
            <ul>
              <li>
                Available every weekdays (07.00 - 13.00 UTC+2)
              </li>
              <li>
                $ {{ auth()->user()->contract->fee_withdrawal }} Fee
              </li>
              <li>
                Min. Claim $ {{ auth()->user()->contract->minimum_withdrawal }}
              </li>
              <li>
                Max. Claim $ {{ number_format(auth()->user()->contract->maximum_withdrawal) }}
              </li>
              <li>
                1 x 24 hours proccess
              </li>
            </ul>
          </div>
          @if (auth()->user()->withdrawal_today->count() === 0)
            @if ($today < 1 || $today > 5)
            @else
              @if ((int) date('Hms') < 70000 || (int) date('Hms') > 150000)
              @else
                <form wire:submit.prevent="submit">
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group mb-2">
                        <label for="available" class="form-label text-dark">Available Bonus</label>
                        <input id="available" type="text" class="form-control" readonly
                          value="{{ number_format(auth()->user()->available_bonus) }}">
                        @error('available')
                          <span class="text-danger">This field is required</span>
                        @enderror
                      </div>
                      <div class="form-group mb-2">
                        <label for="amount" class="form-label text-dark">Withdrawal Amount</label>
                        <input id="amount" type="number" min="0" step="1" autocomplete="off" class="form-control"
                          wire:model.defer="amount">
                        @error('amount')
                          <span class="text-danger">This field is required</span>
                        @enderror
                      </div>
                      @if (auth()->user()->googleAuthSecret)
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
                    <div class="card-footer text-center">
                      <input type="submit" class="btn btn-primary " value="Submit">
                    </div>
                  </div>
                </form>
                <div class="modal fade" wire:ignore.self id="confirmationModal" tabindex="-1" role="dialog"
                  aria-labelledby="confirmationModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <form wire:submit.prevent="confirmation">
                        <div class="modal-header">
                          <h5 class="modal-title" id="confirmationModalLabel">Withdrawal Confirmation</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            x
                          </button>
                        </div>
                        @if (auth()->user()->withdrawal_today->count() === 0)
                          <div class="modal-body text-center">
                            <h5>
                              You Got {{ $usdtWd }} USDT <small>(After Fee $
                                {{ auth()->user()->contract->fee_withdrawal }})</small><br>To<br>
                              <small> {{ auth()->user()->wallet }}</small>
                              <br>
                              <small class="text-danger">Make sure your wallet address is right</small>
                            </h5>
                          </div>
                          <div class="modal-footer text-center">
                            <input type="submit" class="mt-4 btn btn-success" value="Submit">
                          </div>
                        @endif
                      </form>
                    </div>
                  </div>
                </div>
                @push('scripts')
                  <script>
                    window.livewire.on('confirmation', () => {
                      $('#confirmationModal').modal('show');
                    });
                  </script>
                @endpush
              @endif
            @endif
          @else
            <div class="alert alert-danger border-0">
              <h5 class="text-danger">Withdrawals can only be done once a day</h5>
            </div>
          @endif
        </div>
      </div>
    </div>
    <!-- end card -->
  </div>
</div>

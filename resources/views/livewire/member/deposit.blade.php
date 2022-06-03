<div>
  @push('css')
  @endpush

  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Deposit</li>
      </ol>
    </div>
    <div class="col-xs-12">@include('includes.message')
      @if (isset($deposit))
        <form wire:submit.prevent="done">
          <div class="intro-y box text-center overflow-x-auto">
            <h5 class="text-2xl">Waiting For Fund . . .</h5>
            <table class="table">
              <tr>
                <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-right">
                  Amount (USDT BEP-20)
                </td>
                <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                  <strong>{{ number_format($deposit->amount, 5) }}</strong>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">
                  <small>(The amount of USDT to be transferred must match the
                    amount)</small>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">
                  Please send <strong>{{ number_format($deposit->amount, 5) }}</strong> USDT
                  <small>BEP-20</small> to address
                  <strong><small>{{ $deposit->wallet }}</small></strong>
                  <br>
                  <div style="display: flex; justify-content: center;" class="mt-3">
                    {!! QrCode::size(200)->generate($deposit->wallet) !!}
                  </div><br>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="border border-b-2 dark:border-dark-5 whitespace-nowrapt text-center">
                  <form wire:submit.prevent="done">
                    <input wire:model.defer="information" class="form-control" cols="30" rows="2"
                      placeholder="Insert TX ID Here" />
                    @error('information')
                      <span class="text-danger">This field is required</span><br>
                    @enderror

                    <input type="submit" class="btn btn-success mt-3 m-r-20" value="Done">
                    <button type="button" class="btn btn-danger mt-3"
                      wire:click="cancel({{ $deposit->id }})">Cancel</button>
                  </form>
                </td>
              </tr>
            </table>
            <br>
          </div>
        </form>
      @else
        <div class="card border-0 mb-3 ">
          @if ($process)
            <div class="card-body text-center">
              <h5 class="text-danger">Your previews request is being processed and takes 1 x 24 hours</h5>
            </div>
          @else
            <div class="card-body">
              <form wire:submit.prevent="submit">
                <div class="form-group">
                  <label for="amount" class="form-label">Deposit USDT Amount</label>
                  <input id="amount" type="number" min="0" step="1" class="form-control" autocomplete="off"
                    wire:model.defer="amount">
                  @error('amount')
                    <span class="text-danger">This field is required</span>
                  @enderror
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
              </form>
            </div>
          @endif
          <div class="widget-list widget-list-rounded">
            @foreach ($data as $row)
              <!-- begin widget-list-item -->
              <a href="#" class="widget-list-item border-left-0 border-right-0 bg-transparent">
                <div class="widget-list-media icon">
                  @if ($row->processed_at)
                    <i class="fas fa-check bg-success text-white"></i>
                  @else
                    <i class="fas fa-spinner bg-red text-white"></i>
                  @endif
                </div>
                <div class="widget-list-content">
                  <div class="widget-list-title"><small>Submitted {{ $row->created_at }}</small><br>
                    <small>{{ $row->processed_at ?: 'Waiting...' }}</small>
                  </div>
                </div>
                <div class="widget-list-action text-nowrap">
                  {{ number_format($row->amount, 5) }}
                </div>
              </a>
            @endforeach
          </div>
          <div class="card-body text-center">
            {{ $data->links() }}
          </div>
        </div>
      @endif
    </div>
  </div>
</div>

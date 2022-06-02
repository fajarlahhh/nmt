<div>
  @push('css')
    <link href="{{ asset('/admin/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/admin/plugins/select2/select2.min.css">
  @endpush
  @include('form.password')
  <div id="content" class="main-content">
    <div class="layout-px-spacing">

      <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
          <div class="widget widget-table-two">

            <div class="widget-heading">
              <h5 class="">Pin</h5>
            </div>

            <div class="widget-content">
              @if (\App\Models\Daily::where('created_at', 'like', date('Y-m-d') . '%')->count() == 0)
                <div class="input-group mb-3">
                  <select class="form-control basic" wire:model.defer="user">
                    <option value="">-- Choose Username --</option>
                    @foreach ($dataUser as $row)
                      <option value="{{ $row->getKey() }}">{{ $row->username }}</option>
                    @endforeach
                  </select>
                  <input type="number" step="any" min="0" max="10" class="form-control" wire:model.defer="amount"
                    aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" wire:click="send"
                      id="button-addon2">Send</button>
                  </div>
                </div>
              @endif
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        <div class="th-content">#</div>
                      </th>
                      <th>
                        <div class="th-content">Date</div>
                      </th>
                      <th>
                        <div class="th-content">Username</div>
                      </th>
                      <th>
                        <div class="th-content">Amount</div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $row)
                      <tr>
                        <td>
                          <div class="td-content">{{ ++$no }}</div>
                        </td>
                        <td>
                          <div class="td-content">{{ $row->created_at }}</div>
                        </td>
                        <td>
                          <div class="td-content">{{ $row->user->username }}</div>
                        </td>
                        <td>
                          <div class="td-content">{{ number_format($row->credit) }}</div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{ $data->links() }}
            </div>
          </div>
        </div>
      </div>

      <div class="footer-wrapper text-center">
        <div class="footer-section f-section-1">
          <p class="">Copyright © 2021 <a target="_blank"
              href="https://solutionstake.com">SolutionStake</a>, All rights reserved.</p>
        </div>
      </div>

    </div>
  </div>
  @push('scripts')
    <script src="/admin/plugins/select2/select2.min.js"></script>
    <script>
      var ss = $(".basic").select2({
        tags: true,
      }).on('change', function(e) {
        window.livewire.emit('set:setuser', $(this).val());
      });
      window.livewire.on('passwordModalClose', () => {
        $('#passwordModal').modal('hide');
      });
      Livewire.on('reinitialize', id => {
        var ss = $(".basic").select2({
          tags: true,
        }).on('change', function(e) {
          window.livewire.emit('set:setuser', $(this).val());
        });
      });
    </script>
  @endpush
</div>

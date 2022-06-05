<div>
  @push('css')
    <link href="{{ asset('/admin/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link href="/admin/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
  @endpush
  @include('form.password')
  <div id="content" class="main-content">
    <div class="layout-px-spacing">

      <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
          <div class="widget widget-table-two">

            <div class="widget-heading form-inline">
              <h5 class="pt-3">Daily Bonus</h5>&nbsp;
              @if (\App\Models\Daily::where('created_at', 'like', date('Y-m-d') . '%')->count() == 0)
                <div class="input-group input-group-sm">
                  <input id="basicFlatpickr" wire:model.defer="date"
                    class="form-control flatpickr flatpickr-input active" type="text">
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
                        <div class="th-content">Value</div>
                      </th>
                      <th>
                        <div class="th-content">Operator</div>
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
                          <div class="td-content">{{ $row->date }}</div>
                        </td>
                        <td>
                          <div class="td-content">{{ $row->value }} %</div>
                        </td>
                        <td>
                          <div class="td-content">{{ $row->operator->username }}</div>
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
    <script src="/admin/plugins/flatpickr/flatpickr.js"></script>
    <script>
      var f1 = flatpickr(document.getElementById('basicFlatpickr'));
      window.livewire.on('passwordModalClose', () => {
        $('#passwordModal').modal('hide');
      });
    </script>
  @endpush
</div>

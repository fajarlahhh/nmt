<div>
  @push('css')
    <link href="{{ asset('/admin/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/admin/plugins/select2/select2.min.css">
  @endpush
  @include('form.password')
  <div id="content" class="main-content">
    <div class="layout-px-spacing">
      <br>
      @include('includes.message')

      <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
          <div class="widget widget-table-two">

            <div class="widget-heading form-inline">
              <h5 class="pt-3">Pin</h5>
            </div>

            <div class="widget-content">
              <div class="alert alert-primary mb-4" role="alert">
                <h5>Form Send Pin</h5>
                <hr>
                <div class="input-group">
                  <select class="form-control basic form-control-sm" wire:model.defer="user">
                    <option value="">-- Choose Username --</option>
                    @foreach ($dataUser as $row)
                      <option value="{{ $row->getKey() }}">{{ $row->username }}</option>
                    @endforeach
                  </select>
                  <input type="number" step="any" class="form-control" wire:model.defer="amount" placeholder="amount"
                    aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" wire:click="send"
                      id="button-addon2">Send</button>
                  </div>
                </div>
              </div>
              <div class="form-inline">
                Data&nbsp;
                <div class="input-group input-group-sm">
                  <select wire:model="month" class="form-control">
                    @for ($i = 1; $i < 13; $i++)
                      <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                  <select wire:model="year" class="form-control">
                    @for ($i = 2022; $i <= date('Y'); $i++)
                      <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                </div>
              </div>
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
                          <div class="td-content">{{ $row->created_at }}</div>
                        </td>
                        <td>
                          <div class="td-content">{{ $row->user->username }}</div>
                        </td>
                        <td>
                          <div class="td-content">
                            {{ number_format($row->nilai) }}
                          </div>
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

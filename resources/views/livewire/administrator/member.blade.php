<div>
  @push('css')
    <link href="{{ asset('/admin/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
  @endpush
  @include('form.password')
  <div id="content" class="main-content">
    <div class="layout-px-spacing">

      <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
          <div class="widget widget-table-two">

            <div class="widget-heading">
              <h5 class="">Member</h5>
            </div>

            <div class="widget-content">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        <div class="th-content">#</div>
                      </th>
                      <th>
                        <div class="th-content">Username</div>
                      </th>
                      <th>
                        <div class="th-content">Email/Phone</div>
                      </th>
                      <th>
                        <div class="th-content">Name</div>
                      </th>
                      <th>
                        <div class="th-content">Contract</div>
                      </th>
                      <th>
                        <div class="th-content">Wallet</div>
                      </th>
                      <th>
                        <div class="th-content">Status</div>
                      </th>
                      <th>
                        <div class="th-content"></div>
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
                          <div class="td-content">{{ $row->username }}</div>
                        </td>
                        <td>
                          <div class="td-content">{{ $row->email }} / {{ $row->phone }}</div>
                        </td>
                        <td>
                          <div class="td-content">{{ $row->name }}</div>
                        </td>
                        <td>
                          <div class="td-content">{{ number_format($row->contract->value) }}</th>
                        <td>
                          <div class="td-content">
                            {{ $row->wallet }}
                          </div>
                        </td>
                        <td>
                          <div class="td-content">
                            @if ($row->activated_at)
                              <span class="badge outline-badge-success">Active</span>
                            @else
                              <span class="badge outline-badge-danger">Inactive</span>
                            @endif
                          </div>
                        </td>
                        <td>
                          <div class="td-content">
                            @if (!$row->actived_at)
                              @if ((int) $key === $row->getKey())
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="javascript:;" wire:click="delete()" class="btn btn-sm btn-danger">Yes</a>
                                  <a wire:click="cancel()" href="javascript:;" class="btn btn-sm btn-warning">Cancel</a>
                                </div>
                              @else
                                <a href="javascript:;" wire:click="setKey({{ $row->getKey() }})"
                                  class="btn btn-sm btn-warning">Delete</a>
                              @endif
                            @endif
                          </div>
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
    <script>
      window.livewire.on('passwordModalClose', () => {
        $('#passwordModal').modal('hide');
      });
    </script>
  @endpush
</div>

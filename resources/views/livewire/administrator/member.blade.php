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

            <div class="widget-heading form-inline">
              <h5 class="pt-3">Member</h5>
              &nbsp;
              <div class="input-group input-group-sm">
                <select wire:model="status" class="form-control">
                  <option value="1">Active</option>
                  <option value="2">Non Active</option>
                  <option value="3">Deleted</option>
                </select>
              </div>
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
                                @if ($delete)
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="javascript:;" wire:click="delete()" class="btn btn-sm btn-danger">Yes,
                                      Delete</a>
                                    <a wire:click="cancel()" href="javascript:;"
                                      class="btn btn-sm btn-success">Cancel</a>
                                  </div>
                                @endif
                                @if ($resetPin)
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="javascript:;" wire:click="resetPin()" class="btn btn-sm btn-danger">Yes,
                                      Reset Pin</a>
                                    <a wire:click="cancel()" href="javascript:;"
                                      class="btn btn-sm btn-success">Cancel</a>
                                  </div>
                                @endif
                                @if ($resetPassword)
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="javascript:;" wire:click="resetPassword()"
                                      class="btn btn-sm btn-danger">Yes,
                                      Reset Password</a>
                                    <a wire:click="cancel()" href="javascript:;"
                                      class="btn btn-sm btn-success">Cancel</a>
                                  </div>
                                @endif
                              @else
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="javascript:;" wire:click="setResetPin({{ $row->getKey() }})"
                                    class="btn btn-sm btn-warning">Reset Pin</a>
                                  <a href="javascript:;" wire:click="setResetPassword({{ $row->getKey() }})"
                                    class="btn btn-sm btn-info">Reset Pswd</a>
                                  <a href="javascript:;" wire:click="setDelete({{ $row->getKey() }})"
                                    class="btn btn-sm btn-danger">Delete</a>
                                </div>
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

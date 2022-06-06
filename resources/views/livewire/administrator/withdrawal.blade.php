<div>
  @push('css')
    <link href="{{ asset('/admin/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
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
              <h5 class="pt-3">Withdrawal</h5>
              &nbsp;
              <div class="input-group input-group-sm">
                <select wire:model="status" class="form-control">
                  <option value="1">Not Yet Process</option>
                  <option value="2">Processed</option>
                  <option value="3">Deleted</option>
                </select>
                @if ($status == '2')
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
                @endif
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
                        <div class="th-content">Created At</div>
                      </th>
                      <th>
                        <div class="th-content">Username</div>
                      </th>
                      <th>
                        <div class="th-content">Wallet</div>
                      </th>
                      <th>
                        <div class="th-content">USDT Amount</div>
                      </th>
                      @if ($status == 2)
                        <th>
                          <div class="th-content">Operator</div>
                        </th>
                      @endif
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
                          <div class="td-content">{{ $row->created_at }}</div>
                        </td>
                        <td>
                          <div class="td-content customer-name">{{ $row->user->username }}</div>
                        </td>
                        <td>
                          <div class="td-content customer-name">{{ $row->wallet }}</div>
                        </td>
                        <td>
                          <div class="td-content">{{ number_format($row->amount, 5) }}</div>
                        </td>
                        @if ($status == 2)
                          <td>
                            <div class="td-content">{{ $row->operator->username }}</div>
                          </td>
                        @endif
                        <td>
                          <div class="td-content">
                            @if ($status == 1)
                              @if ((int) $key === $row->getKey())
                                @if ($delete)
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="javascript:;" wire:click="delete()" class="btn btn-sm btn-danger">Yes,
                                      Delete</a>
                                    <a wire:click="cancel()" href="javascript:;"
                                      class="btn btn-sm btn-success">Cancel</a>
                                  </div>
                                @endif
                                @if ($process)
                                  <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" wire:model.defer="information"
                                      @error('information') placeholder="TX ID is required" @enderror>
                                    <div class="input-group-append">
                                      <button wire:click="process()" type="button" class="btn btn-sm btn-danger">Yes,
                                        Proccess</button>
                                      <a wire:click="cancel()" href="javascript:;"
                                        class="btn btn-sm btn-success">Cancel</a>
                                    </div>
                                  </div>
                                @endif
                              @else
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="javascript:;" wire:click="setProses({{ $row->getKey() }})"
                                    class="btn btn-sm btn-primary">Proccess</a>
                                  <a href="javascript:;" wire:click="setDelete({{ $row->getKey() }})"
                                    class="btn btn-sm btn-danger">Delete</a>
                                </div>
                              @endif
                            @endif
                            @if ($status == 3)
                              <a href="javascript:;" wire:click="restore({{ $row->getKey() }})"
                                class="btn btn-sm btn-info">Restore</a>
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

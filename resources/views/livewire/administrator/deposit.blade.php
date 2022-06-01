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
              <h5 class="">Payment</h5>
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
                        <div class="th-content">Requisite</div>
                      </th>
                      <th>
                        <div class="th-content">Amount</div>
                      </th>
                      <th>
                        <div class="th-content">TX ID</div>
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
                          <div class="td-content customer-name">{{ $row->owner->username }}</div>
                        </td>
                        <td>
                          <div class="td-content">{{ $row->requisite }} {{ $row->user->username }} ($
                            {{ number_format($row->user->contract->value) }})</div>
                        </td>
                        <td>
                          <div class="td-content pricing"><span class="">{{ $row->amount }}</span></div>
                        </td>
                        <td>
                          <div class="td-content">{{ $row->information }}</div>
                        </td>
                        <td>
                          <div class="td-content">
                            @if ((int) $key === $row->getKey())
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button wire:click="process()" type="button" class="btn btn-sm btn-success">Yes,
                                  Process</button>
                                <button wire:click="delete()" type="button"
                                  class="btn btn-sm btn-danger">Delete</button>
                                <button wire:click="cancel()" type="button"
                                  class="btn btn-sm btn-warning">Cancel</button>
                              </div>
                            @else
                              <a href="javascript:;" wire:click="setKey({{ $row->getKey() }})"
                                class="btn btn-sm btn-primary">Proccess</a>
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

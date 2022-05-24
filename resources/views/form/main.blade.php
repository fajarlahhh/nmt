<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
  <div class="overlay"></div>
  <div class="search-overlay"></div>

  <div id="content" class="main-content">
    <div class="layout-px-spacing">

      <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          @if (!auth()->user()->wallet)
            <div class="alert alert-danger border-0">
              You have not added a wallet address. <a href="javascript:;" wire:click="profileMount" data-toggle="modal"
                class="text-primary" data-target="#profileModal">Click here</a> to add it
            </div>
          @endif
          @if (!auth()->user()->phone)
            <div class="alert alert-danger border-0">
              You have not added a phone number. <a href="javascript:;" wire:click="profileMount" data-toggle="modal"
                class="text-primary" data-target="#profileModal">Click here</a> to add it
            </div>
          @endif
          @if (session()->has('message'))
            <div class="alert alert-success border-0">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg
                  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-x close" data-dismiss="alert">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg></button>
              {!! session('message') !!}
            </div>
          @endif
          @if (session()->has('error'))
            <div class="alert alert-danger border-0">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg
                  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-x close" data-dismiss="alert">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg></button>
              {!! session('error') !!}
            </div>
          @endif
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
          <div class="widget widget-account-invoice-three">

            <div class="widget-heading">
              <div class="wallet-usr-info">
                <div class="usr-name">
                  <span><img src="/assets/img/logo.png" alt="admin-profile" class="img-fluid">
                    {{ auth()->user()->username }} - $ {{ number_format(auth()->user()->contract->value) }}</span>
                </div>
              </div>
              <br>
              <div class="wallet-balance">
                <p>Contract</p>
                @if (auth()->user()->invalid_at)
                  <h5><span class="w-currency">$ </span>{{ number_format(auth()->user()->contract->benefit) }}
                  </h5>
                @else
                  <div class="float-right">
                    <a class="btn btn-sm btn-warning btn-rounded" wire:click="restakeMount" data-toggle="modal"
                      data-target="#restakeModal" href="javascript:;">Restake</a>
                  </div>
                @endif
              </div>
            </div>
            @if (auth()->user()->invalid_at)
              <div class="widget-amount width-100">

                <a data-toggle="modal" wire:click="bonusMount" data-target="#bonusModal" href="javascript:;">
                  <div class="w-a-info bg-success">
                    <span>Bonus</span>
                    <p>{{ number_format($bonus) }}
                    </p>
                  </div>
                </a>
              </div>
            @endif

            <div class="widget-content">

              <div class="bills-stats">
                <span>Entrant</span>
              </div>

              <div class="invoice-list">

                <div class="inv-detail">
                  <div class="info-detail-1">
                    <p>Sponsor</p>
                    <p>
                      <span class="bill-amount">
                        {{ number_format($entrant->whereNotNull('activated_at')->where('level', 1)->count()) }}
                      </span>
                    </p>
                  </div>
                  <div class="info-detail-2">
                    <p>Level 1</p>
                    <p>
                      <span class="bill-amount">
                        {{ number_format($entrant->whereNotNull('activated_at')->where('level', 2)->count()) }}
                      </span>
                    </p>
                  </div>
                  <div class="info-detail-3">
                    <p>Level 2</p>
                    <p>
                      <span class="bill-amount">
                        {{ number_format($entrant->whereNotNull('activated_at')->where('level', 3)->count()) }}
                      </span>
                    </p>
                  </div>
                  <div class="info-detail-4">
                    <p>Level 3</p>
                    <p>
                      <span class="bill-amount">
                        {{ number_format($entrant->whereNotNull('activated_at')->where('level', 4)->count()) }}
                      </span>
                    </p>
                  </div>
                  <div class="info-detail-4">
                    <p>Level 4</p>
                    <p>
                      <span class="bill-amount">
                        {{ number_format($entrant->whereNotNull('activated_at')->where('level', 5)->count()) }}
                      </span>
                    </p>
                  </div>
                </div>
                <div class="inv-action mt-3">
                  @if (auth()->user()->activated_at)
                    <a href="/enrollment" class="btn btn-outline-primary view-details">+
                      Enrollment</a>
                  @else
                    <a href="/enrollment" class="btn btn-outline-warning">+
                      Restake</a>
                  @endif
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing ">
          <div id="toggleAccordion">
            <div class="card">
              <div class="card-header" id="...">
                <section class="mb-0 mt-0">
                  <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionOne"
                    aria-expanded="true" aria-controls="defaultAccordionOne">
                    <strong class="text-warning">Pending Income</strong>
                  </div>
                </section>
              </div>

              <div id="defaultAccordionOne" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                <div class="card-body">
                  <div class="widget widget-table-one">
                    <div class="widget-content overflow-auto" style="height: 300px">
                      @foreach ($entrant->whereNull('activated_at') as $key => $row)
                        <div class="transactions-list t-info">
                          <div class="t-item">
                            <div class="t-company-name">
                              <div class="t-icon">
                                <div class="avatar avatar-xl">
                                  <span class="avatar-title">
                                    @switch($row->level)
                                      @case(1)
                                        Ref.
                                      @break

                                      @case(2)
                                        Lv.1
                                      @break

                                      @case(3)
                                        Lv.2
                                      @break

                                      @case(4)
                                        Lv.3
                                      @break

                                      @case(5)
                                        Lv.4
                                      @break
                                    @endswitch
                                  </span>
                                </div>
                              </div>
                              <div class="t-name">
                                <h4>{{ $row->username }} <small>{{ $row->phone }}</small></h4>
                                <p class="meta-date">{{ $row->created_at }}
                                </p>
                              </div>
                            </div>
                            <div class="t-rate rate-inc">
                              <p><span>+ $@switch($row->level)
                                    @case(1)
                                      {{ number_format($row->contract->sponsorship_benefits) }}
                                    @break

                                    @case(2)
                                      {{ number_format($row->contract->first_level_benefits) }}
                                    @break

                                    @case(3)
                                      {{ number_format($row->contract->second_level_benefits) }}
                                    @break

                                    @case(4)
                                      {{ number_format($row->contract->third_level_benefits) }}
                                    @break

                                    @case(5)
                                      {{ number_format($row->contract->forth_level_benefits) }}
                                    @break
                                  @endswitch
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="...">
                <section class="mb-0 mt-0">
                  <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionTwo"
                    aria-expanded="true" aria-controls="defaultAccordionTwo">
                    <strong class="text-info">Recent Withdrawal</strong>
                  </div>
                </section>
              </div>

              <div id="defaultAccordionTwo" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                <div class="card-body">
                  <div class="widget widget-table-two">
                    <div class="widget-content">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>
                                <div class="th-content">Time</div>
                              </th>
                              <th>
                                <div class="th-content">Kind</div>
                              </th>
                              <th>
                                <div class="th-content">Wallet</div>
                              </th>
                              <th>
                                <div class="th-content">USDT</div>
                              </th>
                              <th>
                                <div class="th-content">Status</div>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($history as $row)
                              <tr>
                                <td class="text-nowrap pr-3">
                                  <div class="td-content pricing">
                                    {{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                  </div>
                                </td>
                                <td class="text-nowrap pr-3">
                                  <div class="td-content pricing">
                                    @switch($row->type)
                                      @case('active')
                                        Active Income
                                      @break

                                      @case('contract')
                                        Fund
                                      @break

                                      @case('bonus')
                                        Passive Income
                                      @break

                                      @default
                                    @endswitch
                                  </div>
                                </td>
                                <td class="text-nowrap pr-3">
                                  <div class="td-content product-invoice">
                                    {{ $row->wallet }}
                                  </div>
                                </td>
                                <td class="text-nowrap pr-3 text-right">
                                  <div class="td-content text-right "><span
                                      class="">{{ $row->usdt_amount }}</span>
                                  </div>
                                </td>
                                <td class="text-nowrap pr-3">
                                  @if ($row->processed_at)
                                    <div class="td-content"><span class="badge outline-badge-success">Paid,
                                        TX
                                        ID :
                                        {{ $row->txid }}</span>
                                    </div>
                                  @else
                                    <div class="td-content"><span class="badge outline-badge-danger">Pending</span>
                                    </div>
                                  @endif
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
</div>
<!-- END MAIN CONTAINER -->

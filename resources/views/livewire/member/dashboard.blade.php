<div>
  @push('css')
  @endpush

  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item active"><a href="javascript:;">Home</a></li>
      </ol>
    </div>
    <div class="col-xs-12">
      @include('includes.message')

      <div class="row">
        <div class="col-xs-12">
          <div class="card border-0 mb-3 overflow-hidden ">
            <!-- begin card-body -->
            <div class="card-body">
              <!-- begin row -->
              <div class="row">
                <!-- begin col-7 -->
                <div class="col-xl-7 col-lg-8">
                  <!-- begin title -->
                  <div class="mb-3 f-s-13">
                    <b>CONTRACT</b>
                  </div>
                  <!-- end title -->
                  <div class="d-flex mb-1">
                    <h2 class="mb-0">{{ strtoupper(auth()->user()->contract->name) }} <small>
                        <span data-animation="number"
                          data-value="{{ auth()->user()->contract->value }}">{{ auth()->user()->contract->value }}</span>
                        USDT
                      </small>
                    </h2>
                  </div>
                  <div class="stats-progress progress">
                    <div class="progress-bar"
                      style="width: {{ (auth()->user()->available_contract / auth()->user()->contract->benefit) * 100 }}%;">
                    </div>
                  </div>
                  <div class="stats-desc">Available {{ number_format(auth()->user()->available_contract) }} USDT
                  </div>
                  <hr>
                  <!-- begin row -->
                  <div class="row text-truncate">
                    <!-- begin col-6 -->
                    <div class="col-4">
                      <div class="f-s-12">Turnover</div>
                      <div class="f-s-18 m-b-5 f-w-600 p-b-1"><span data-animation="number"
                          data-value="{{ auth()->user()->turnover->sum('value') }}">{{ auth()->user()->turnover->sum('value') }}</span>
                        USDT
                      </div>
                    </div>
                    <!-- end col-6 -->
                    <!-- begin col-6 -->
                    <div class="col-8">
                      <div class="f-s-12">Current Bonus</div>
                      <div class="f-s-18 m-b-5 f-w-600 p-b-1"><span data-animation="number"
                          data-value="{{ auth()->user()->available_bonus }}">{{ auth()->user()->available_bonus }}</span>
                        <a href="/withdrawal" class="btn btn-sm btn-white pull-right">WD</a> USDT
                      </div>
                    </div>
                    <!-- end col-6 -->
                  </div>
                  <!-- end row -->
                </div>
                <!-- end col-7 -->
                <!-- begin col-5 -->
                <div class="col-xl-5 col-lg-4 align-items-center d-flex justify-content-center">
                  <img src="../assets/img/svg/img-1.svg" height="150px" class="d-none d-lg-block">
                </div>
                <!-- end col-5 -->
              </div>
              <!-- end row -->
            </div>
            <!-- end card-body -->
          </div>
        </div>
        <div class="col-xs-12">
          <!-- begin card -->
          <div class="card border-0 text-truncate mb-3 ">
            <!-- begin card-body -->
            <div class="card-body">
              <!-- begin title -->
              <div class="mb-3  f-s-13">
                <b class="mb-3">BALANCE</b>
              </div>
              <!-- end title -->
              <!-- begin conversion-rate -->
              <div class="d-flex align-items-center mb-1">
                <h2 class="mb-0 "><span>{{ auth()->user()->available_balance }}
                  </span> USDT
                </h2>
              </div>
            </div>
          </div>
          <!-- end card -->
        </div>
        <div class="col-xs-8">
          <div class="widget widget-stats bg-info">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-users fa-fw"></i></div>
            <div class="stats-content">
              <div class="stats-title"><a href="/downline" class="text-decoration-none text-white">TOTAL
                  DOWNLINE</a>
              </div>
              <div class="stats-number">{{ number_format(auth()->user()->downline->count()) }}
                <a href="/downline/new" class="btn btn-warning btn-xs pull-right m-t-20">Enrollment</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <a href="/pin" class="text-decoration-none">
            <div class="widget widget-stats bg-info">
              <div class="stats-icon stats-icon-lg"><i class="fas fa-xs fa-fw fa-ticket-alt"></i></div>
              <div class="stats-content">
                <div class="stats-title">PIN</div>
                <div class="stats-number">{{ number_format(auth()->user()->available_pin) }}</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xs-12">
          <!-- begin card -->
          <div class="card border-0 mb-3 ">
            <!-- begin card-body -->
            <div class="card-body"
              style="background: no-repeat bottom right; background-image: url(../assets/img/svg/img-4.svg); background-size: auto 60%;">
              <!-- begin title -->
              <div class="mb-3 f-s-13">
                <b>ACHIEVEMENT</b>
              </div>
              <!-- end title -->
            </div>
            <!-- end card-body -->
            <!-- begin widget-list -->
            <div class="widget-list widget-list-rounded">
              @foreach (auth()->user()->achievement->sortDesc()
    as $row)
                <!-- begin widget-list-item -->
                <a href="#" class="widget-list-item rounded-0 p-t-3 border-left-0 border-right-0 bg-transparent">
                  <div class="widget-list-media icon">
                    @if (isset($row->processed_at))
                      <i class="fas fa-check bg-success text-white"></i>
                    @else
                      <i class="fas fa-spinner bg-warning text-white"></i>
                    @endif
                  </div>
                  <div class="widget-list-content">
                    <div class="widget-list-title">{{ $row->description }}<br>
                      <small>{{ $row->waktu }}</small>
                    </div>
                  </div>
                  <div class="widget-list-action text-nowrap">
                    <span data-animation="number"
                      data-value="{{ number_format($row->value) }}">{{ number_format($row->value) }}</span> USDT
                  </div>
                </a>
                <!-- end widget-list-item -->
              @endforeach
            </div>
            <!-- end widget-list -->
          </div>
          <!-- end card -->
        </div>
      </div>
    </div>
  </div>

</div>

<div>
  @push('css')
  @endpush

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item active"><a href="javascript:;">Home</a></li>
  </ol>
  <!-- end breadcrumb -->

  @include('includes.message')

  <!-- begin row -->
  <div class="row">
    <!-- begin col-12 -->
    <div class="col-xs-12">
      <div class="widget widget-stats bg-blue">
        <div class="stats-icon stats-icon-lg"><i class="fa fa-file-contract fa-fw"></i></div>
        <div class="stats-content">
          <div class="stats-title">CONTRACT</div>
          <div class="stats-number">{{ auth()->user()->contract_value }}</div>
          <div class="stats-progress progress">
            <div class="progress-bar"
              style="width: {{ (auth()->user()->available_contract / auth()->user()->contract->benefit) * 100 }}%;">
            </div>
          </div>
          <div class="stats-desc">Available $ {{ number_format(auth()->user()->available_contract) }}</div>
        </div>
      </div>
    </div>
    <!-- end col-12 -->
    <!-- begin col-12 -->
    <div class="col-xs-8">
      <a href="/downline" class="text-decoration-none">
        <div class="widget widget-stats bg-info">
          <div class="stats-icon stats-icon-lg"><i class="fa fa-users fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">TOTAL DOWNLINE</div>
            <div class="stats-number">{{ number_format(auth()->user()->downline->count()) }}</div>
          </div>
        </div>
      </a>
    </div>
    <!-- end col-12 -->
    <!-- begin col-12 -->
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
    <!-- end col-12 -->
    <div class="col-xs-12">
      <!-- begin card -->
      <div class="card border-0 mb-3 ">
        <!-- begin card-body -->
        <div class="card-body"
          style="background: no-repeat bottom right; background-image: url(../assets/img/svg/img-4.svg); background-size: auto 60%;">
          <!-- begin title -->
          <div class="mb-3 f-s-13">
            <b>CURRENT BONUS</b>
            <span class="ml-2 text-muted"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover"
                data-title="Sales by social source" data-placement="top"
                data-content="Total online store sales that came from a social referrer source." data-original-title=""
                title=""></i></span>
          </div>
          <!-- end title -->
          <!-- begin sales -->
          <h3 class="m-b-10">$<span data-animation="number"
              data-value="{{ auth()->user()->available_bonus }}">{{ auth()->user()->available_bonus }}</span></h3>
          <!-- end sales -->
        </div>
        <!-- end card-body -->
        <!-- begin widget-list -->
        <div class="widget-list widget-list-rounded height-300 overflow-auto">
          @foreach (auth()->user()->bonus->sortDesc()
    as $row)
            <!-- begin widget-list-item -->
            <a href="#" class="widget-list-item rounded-0 p-t-3 border-left-0 border-right-0 bg-transparent">
              <div class="widget-list-media icon">
                @if ($row->nilai > 0)
                  <i class="fas fa-plus-circle bg-success text-white"></i>
                @else
                  <i class="fas fa-minus-circle bg-red text-white"></i>
                @endif
              </div>
              <div class="widget-list-content">
                <div class="widget-list-title">{{ $row->description }}<br>
                  <small>{{ $row->waktu }}</small>
                </div>
              </div>
              <div class="widget-list-action text-nowrap">
                $ <span data-animation="number"
                  data-value="{{ number_format($row->nilai < 0 ? -1 * $row->nilai : $row->nilai) }}">{{ number_format($row->nilai < 0 ? -1 * $row->nilai : $row->nilai) }}</span>
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
  <!-- end row -->

  {{-- @include('form.main')
  @include('form.profile')
  @include('form.bonus')
  @include('form.restake')
  @include('form.contract')
  @include('form.active-history')
  @push('scripts')
    <script>
      window.livewire.on('profileModalClose', () => {
        $('#profileModal').modal('hide');
      });

      window.livewire.on('passwordModalClose', () => {
        $('#passwordModal').modal('hide');
      });

      window.livewire.on('contractModalClose', () => {
        $('#contractModal').modal('hide');
      });

      window.livewire.on('restakeModalClose', () => {
        $('#restakeModal').modal('hide');
      });

      window.livewire.on('activeModalClose', (next) => {
        $('#activeModal').modal('hide');
        if (next === true) {
          $('#activeSubmit').modal('show');
        }
      });

      window.livewire.on('activeSubmitClose', () => {
        $('#activeSubmit').modal('hide');
      });

      // $("#amountActive").on('change keyup', function (e) {
      //     window.livewire.emit('set:activeupdate', this.value);
      // })
    </script>
  @endpush --}}
</div>

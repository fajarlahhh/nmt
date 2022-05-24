<div>
  @push('css')
  @endpush

  <!-- begin #content -->
  <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
      <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Dashboard </h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
      <!-- begin col-3 -->
      <div class="col-xl-12 col-md-12">
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
      <!-- end col-3 -->
      <!-- begin col-3 -->
      <div class="col-xl-12 col-md-12">
        <div class="widget widget-stats bg-blue">
          <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
          <div class="stats-content">
            <div class="stats-title">TODAY'S PROFIT</div>
            <div class="stats-number">180,200</div>
            <div class="stats-progress progress">
              <div class="progress-bar" style="width: 40.5%;"></div>
            </div>
            <div class="stats-desc">Better than last week (40.5%)</div>
          </div>
        </div>
      </div>
      <!-- end col-3 -->
    </div>
    <!-- end row -->
  </div>
  <!-- end #content -->

  {{-- @include('form.main')
  @include('form.profile')
  @include('form.password')
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

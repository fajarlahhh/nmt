<div>
  @push('css')
  @endpush

  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Downline</li>
      </ol>
    </div>
    <div class="col-xs-12">
      @include('includes.message')
      <div class="card border-0 mb-3 ">
        <!-- begin card-body -->
        <div class="card-body">
          <!-- begin title -->
          <div class="mb-3 f-s-13">
            <b>TOTAL DOWNLINE</b>
            <span class="ml-2 text-muted"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover"
                data-title="Sales by social source" data-placement="top"
                data-content="Total online store sales that came from a social referrer source." data-original-title=""
                title=""></i></span>
          </div>
          <!-- end title -->
          <!-- begin sales -->
          <h3 class="m-b-10"><span data-animation="number"
              data-value="{{ auth()->user()->downline->count() }}">{{ number_format(auth()->user()->downline->count()) }}</span>
            <a href="/downline/new" class="pull-right btn btn-primary btn-sm">Enrollment</a>
          </h3>
          <!-- end sales -->
        </div>
        <!-- end card-body -->
        <div class="table-responsive col-xs-12">
          <!-- begin widget-table -->
          <table class="table" data-id="widget">
            <thead>
              <tr>
                <th>Username</th>
                <th class="text-nowrap">Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Wallet</th>
                <th>Contract</th>
                <th>Level</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $row)
                <tr>
                  <td class="text-nowrap align-middle">{{ $row->username }}</td>
                  <td class="text-nowrap align-middle">{{ $row->name }}</td>
                  <td class="text-nowrap align-middle">{{ $row->email }}</td>
                  <td class="text-nowrap align-middle">{{ $row->phone }}</td>
                  <td class="text-nowrap align-middle">{{ $row->wallet }}</td>
                  <td class="text-nowrap align-middle text-right">{{ number_format($row->contract->value) }}</td>
                  <td class="text-nowrap align-middle">{{ $row->level == 0 ? 'Referral' : 'Lvl. ' . $row->level }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <!-- end widget-table -->
        </div>
        <div class="card-body">
          {{ $data->links() }}
        </div>
      </div>
    </div>
  </div>

</div>

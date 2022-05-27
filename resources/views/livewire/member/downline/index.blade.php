<div>
  @push('css')
  @endpush

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Downline</li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Downline <a href="/downline/new" class="pull-right btn btn-primary btn-sm">Enrollment</a>
  </h1>
  <!-- end page-header -->

  @include('includes.message')
  <div class="table-responsive">
    <!-- begin widget-table -->
    <table class="table table-bordered widget-table widget-table-rounded" data-id="widget">
      <thead>
        <tr>
          <th width="1%">Username</th>
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
            <td class="text-nowrap align-middle">{{ $row->contract->value }}</td>
            <td class="text-nowrap align-middle">{{ $row->level == 0 ? 'Referral' : $row->level }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <!-- end widget-table -->
  </div>
</div>

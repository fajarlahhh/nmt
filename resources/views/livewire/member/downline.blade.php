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
  <h1 class="page-header">Downline <button class="pull-right btn btn-primary btn-sm">New</button></h1>
  <!-- end page-header -->

  @include('includes.message')
  <div class="table-responsive">
    <!-- begin widget-table -->
    <table class="table table-bordered widget-table widget-table-rounded" data-id="widget">
      <thead>
        <tr>
          <th width="1%">Username</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Wallet</th>
          <th>Contract</th>
          <th>Level</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="widget-table-img" style="background-image: url(../assets/img/product/product-6.png);"></div>
          </td>
          <td>
            <h4 class="widget-table-title">Mavic Pro Combo</h4>
            <p class="widget-table-desc m-b-15">Portable yet powerful, the Mavic Pro is your personal drone, ready to go
              with you everywhere.</p>
            <div class="progress progress-sm rounded-corner m-b-5">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-orange f-s-10 f-w-600"
                style="width: 30%;">30%</div>
            </div>
            <div class="clearfix f-s-10">
              status:
              <b class="text-inverse" data-id="widget-elm" data-light-class="text-inverse"
                data-dark-class="text-white">Shipped</b>
            </div>
          </td>
          <td class="text-nowrap">
            <b class="text-inverse" data-id="widget-elm" data-light-class="text-inverse"
              data-dark-class="text-white">$999</b><br>
            <small class="text-inverse text-line-through" data-id="widget-elm"
              data-light-class="text-inverse text-line-through"
              data-dark-class="text-white text-line-through">$1,202</small>
          </td>
          <td>1</td>
          <td>999.00</td>
          <td>
            <a href="#" class="btn btn-inverse btn-sm width-80 rounded-corner" data-id="widget-elm"
              data-light-class="btn btn-inverse btn-sm width-80 rounded-corner"
              data-dark-class="btn btn-default btn-sm width-80 rounded-corner">Edit</a>
          </td>
        </tr>
        <tr>
          <td>
            <div class="widget-table-img" style="background-image: url(../assets/img/product/product-7.png);"></div>
          </td>
          <td>
            <h4 class="widget-table-title">Inspire 2</h4>
            <p class="widget-table-desc m-b-15">Cinematic aerial performance for filmmakers.</p>
            <div class="progress progress-sm rounded-corner m-b-5">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success f-s-10 f-w-600"
                style="width: 100%;">100%</div>
            </div>
            <div class="clearfix f-s-10">
              status:
              <b class="text-inverse" data-id="widget-elm" data-light-class="text-inverse"
                data-dark-class="text-white">received</b>
            </div>
          </td>
          <td class="text-nowrap">
            <b class="text-inverse" data-id="widget-elm" data-light-class="text-inverse"
              data-dark-class="text-white">$999</b><br>
            <small class="text-inverse text-line-through" data-id="widget-elm"
              data-light-class="text-inverse text-line-through"
              data-dark-class="text-white text-line-through">$1,202</small>
          </td>
          <td>1</td>
          <td>999.00</td>
          <td>
            <a href="#" class="btn btn-inverse btn-sm width-80 rounded-corner" data-id="widget-elm"
              data-light-class="btn btn-inverse btn-sm width-80 rounded-corner"
              data-dark-class="btn btn-default btn-sm width-80 rounded-corner">Edit</a>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- end widget-table -->
  </div>
</div>

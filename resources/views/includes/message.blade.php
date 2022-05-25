@if (Session::has('danger'))
  <div class="alert alert-danger fade show m-b-10">
    <span class="close" data-dismiss="alert">×</span>
    {!! Session::get('danger') !!}
  </div>
@endif
@if (Session::has('success'))
  <div class="alert alert-success fade show m-b-10">
    <span class="close" data-dismiss="alert">×</span>
    {!! Session::get('success') !!}
  </div>
@endif

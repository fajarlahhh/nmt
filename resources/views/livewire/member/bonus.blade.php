<div>
  @push('css')
  @endpush

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Bonus</li>
  </ol>
  <!-- end breadcrumb -->

  @include('includes.message')

  <div class="card border-0 mb-3 ">
    <div class="widget-list widget-list-rounded">
      @foreach ($data as $row)
        <!-- begin widget-list-item -->
        <a href="#" class="widget-list-item border-left-0 border-right-0 bg-transparent">
          <div class="widget-list-media icon">
            @if ($row->nilai > 0)
              <i class="fas fa-plus-circle bg-success text-white"></i>
            @else
              <i class="fas fa-download bg-red text-white"></i>
            @endif
          </div>
          <div class="widget-list-content">
            <div class="widget-list-title">{{ $row->description }}<br>
              <small>{{ $row->waktu }}</small>
            </div>
          </div>
          <div class="widget-list-action text-nowrap">
            <span data-animation="number" data-value="{{ $row->nilai < 0 ? -1 * $row->nilai : $row->nilai }}"></span>
          </div>
        </a>
      @endforeach
    </div>
    <div class="card-body text-center">
      {{ $data->links() }}
    </div>
  </div>
</div>

<div>
  @push('css')
  @endpush

  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Bonus</li>
      </ol>
    </div>
    <div class="col-xs-12">

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
                  @if ($row->withdrawal->processed_at)
                    <i class="fas fa-check bg-red text-white"></i>
                  @else
                    <i class="fas fa-spinner bg-warning text-white"></i>
                  @endif
                @endif
              </div>
              <div class="widget-list-content">
                <div class="widget-list-title">{{ $row->description }} on
                  {{ $row->withdrawal ? $row->withdrawal->created_at : '' }}<br>
                  <small>{{ $row->withdrawal ? ($row->withdrawal->processed_at ?: 'Waiting..') : $row->created_at }}</small>
                </div>
              </div>
              <div class="widget-list-action text-nowrap f-w-600 text-right">
                <span data-animation="number"
                  data-value="{{ $row->nilai < 0 ? -1 * $row->nilai : $row->nilai }}">{{ number_format($row->nilai < 0 ? -1 * $row->nilai : $row->nilai) }}</span>
              </div>
            </a>
          @endforeach
        </div>
        <div class="card-body text-center">
          {{ $data->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

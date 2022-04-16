<div class="modal fade" wire:ignore.self id="passiveModal" tabindex="-1" role="dialog"
    aria-labelledby="passiveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="passiveModalLabel">Passive Income</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="widget widget-table-one text-left">
                        <div class="widget-content overflow-auto">
                            @if ($passiveData)
                                @foreach ($passiveData as $key => $row)
                                    <div class="transactions-list t-info">
                                        <div class="t-item">
                                            <div class="t-company-name">
                                                <div class="t-name">
                                                    <h4>$ {{ number_format($row->amount) }}</h4>
                                                    @if ($row->valid_at > date('Y-m-d H:m:s'))
                                                    <p class="meta-date">Available in {{ \Carbon\Carbon::parse($row->valid_at)->diffForHumans() }}
                                                    </p>
                                                    @else
                                                    @if (!$row->withdrawal)
                                                    Available Now
                                                    @else
                                                    Claimed
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="t-rate rate-inc">
                                                @if ($row->valid_at < now())
                                                    @if ($row->withdrawal)
                                                        @if ($row->withdrawal->processed_at)
                                                            <span
                                                            class="badge outline-badge-success">Paid,
                                                            TX
                                                            ID :
                                                            {{ $row->txid }}</span>
                                                        @else
                                                            <span class="badge outline-badge-danger">Pending</span>
                                                        @endif
                                                    @else
                                                    @if ($today < 0 || $today > 5)
                                                    @else
                                                    @if ((int)date('Hms') < 70000 || (int)date('Hms') > 150000)
                                                    @else
                                                    <button type="button" class="btn btn-sm btn-rounded btn-success"
                                                        wire:click="passiveSubmit({{ $row->getKey() }})">Claim</button>
                                                    @endif
                                                    @endif
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

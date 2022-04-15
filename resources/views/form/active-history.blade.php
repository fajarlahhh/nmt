<div class="modal fade" wire:ignore.self id="activeRecentModal" tabindex="-1" role="dialog"
    aria-labelledby="activeRecentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="activeRecentModalLabel">Active Income</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="widget widget-table-one text-left">
                        <div class="widget-content overflow-auto" style="height: 400px">
                            @if ($activeData)
                                @foreach ($activeData as $key => $row)
                                    <div class="transactions-list t-info">
                                        <div class="t-item">
                                            <div class="t-company-name">
                                                <div class="t-name">
                                                    <h4>{{ $row->description }}</h4>
                                                    <p class="meta-date">{{ $row->created_at }}
                                                    </p>
                                                </div>
                                            </div>
                                                @if ($row->credit)
                                                <div class="t-rate rate-inc">
                                                    <p><span>
                                                        + ${{ number_format($row->credit) }}
                                                    </span>
                                                </p>
                                                </div>
                                                @else
                                                <div class="t-rate rate-dec">
                                                    <p><span>
                                                - ${{ number_format($row->credit) }}
                                            </span>
                                        </p>
                                        </div>
                                                @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <a data-toggle="modal" wire:click="activeMount" data-dismiss="modal" data-target="#activeModal"
                        href="javascript:;" class="btn btn-sm btn-danger mt-3">Claim
                        Active</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div>
    <div class="grid grid-cols-12 gap-6 mt-5 ">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                <h3>Passive Income</h3>
                <hr class="mt-2">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Time</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Amount</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($benefit as $key => $row)
                            <tr>
                                <td class="border-b whitespace-nowrap">{{ ++$key }}</td>
                                <td class="border-b whitespace-nowrap">{{ $row->valid_at }}</td>
                                <td class="border-b whitespace-nowrap text-right">{{ number_format($row->amount, 2) }}
                                </td>
                                <td class="border-b whitespace-nowrap text-right">
                                    @if (!$row->id_withdrawal)
                                        <button class="btn btn-xs btn-success"
                                            wire:click="claimPassive({{ $row->getKey() }})">
                                            Claim
                                        </button>
                                    @else
                                        @if ($row->withdrawal->processed_at)
                                            Withdrawal success, {{ $row->withdrawal->processed_at }} :
                                            {{ $row->withdrawal->txid }}
                                        @else
                                            Waiting for admin process
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-4">
            <div class="alert alert-dark show intro-x">
                <form wire:submit.prevent="claimContract">
                    <div class="mt-3">
                        <label for="contract" class="form-label">Contract</label>
                        <input id="contract" type="text" class="form-control text-gray-700" readonly
                            value="{{ number_format($contract) }}" placeholder="contract">
                        @error('contract')
                            <div class="text-theme-6 mt-2">This field is required</div>
                        @enderror
                    </div>
                    @if (auth()->user()->invalid_at < now())
                        <button class="btn btn-primary mt-5" type="submit">Claim</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    @if ($error)
        <div class="alert alert-danger show col-span-12 lg:col-span-6 mt-2" role="alert">
            {!! $error !!}
        </div>
    @endif
</div>

<div>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 sm:col-span-12 xl:col-span-8 intro-y">
            <div class="mt-5 box" id="responsive-table">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Time</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Description</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Debit</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Credit</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $row)
                            @php
                                $balance += $row->credit - $row->debit;
                            @endphp
                            <tr>
                                <td class="border-b whitespace-nowrap">{{ ++$no }}</td>
                                <td class="border-b whitespace-nowrap">{{ $row->created_at }}</td>
                                <td class="border-b whitespace-nowrap">{{ $row->description }}</td>
                                <td class="border-b whitespace-nowrap text-righr">{{ number_format($row->debit, 2) }}</td>
                                <td class="border-b whitespace-nowrap text-right">{{ number_format($row->credit, 2) }}</td>
                                <td class="border-b whitespace-nowrap text-right">{{ number_format($balance, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y">
            <div class="mt-5 alert alert-dark show intro-x">
                @if (!auth()->user()->withdrawal_active_today)
                <form wire:submit.prevent="submit">
                    <h3><strong>Withdrawal Form</strong></h3>
                    <hr>
                    <div class="mt-3">
                        <label for="available" class="form-label text-white">Available Balance</label>
                        <input id="available" type="text" class="form-control text-gray-700" readonly value="$ {{ number_format($available, 2) }}">
                        @error('available')
                        <div class="text-theme-6 mt-2">This field is required</div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="amount" class="form-label text-white">Withdrawal Amount</label>
                        <input id="amount" type="number" min="0" autocomplete="off" class="form-control text-gray-700" wire:model="amount">
                        <h5>
                            USDT = {{ $usdt }} <small>(After Fee 10%)</small><br>
                            <small>Wallet = {{ auth()->user()->wallet }}</small>
                        </h5>
                        @error('amount')
                        <div class="text-theme-6 mt-2">This field is required</div>
                        @enderror
                    </div>
                    @if (auth()->user()->google2fa_secret)
                    <hr class="mt-5">
                    <div class="mt-3">
                        <label for="username" class="form-label">Google Auth PIN</label>
                        <input id="username" type="text" class="form-control" wire:model.defer="pin" placeholder="Enter Your Google Authenticator PIN" autocomplete="off">
                        @error('pin')
                        <div class="text-theme-6 mt-2">This field is required</div>
                        @enderror
                    </div>
                    @endif
                    <button class="btn btn-secondary mt-5" type="submit">Submit</button>
                </form>
                @else
                <h4>You have made a withdrawal today</h4>
                @endif
            </div>
        </div>
    </div>
    @if ($error)
    <div class="alert alert-danger show col-span-12 lg:col-span-6 mt-2" role="alert">
        {!! $error !!}
    </div>
    @endif
</div>

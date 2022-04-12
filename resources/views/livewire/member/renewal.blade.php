<div>
    <div class="grid grid-cols-12 gap-6 mt-5 ">
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                @if (auth()->user()->invalid_at <= date('Y-m-d H:m:s'))
                    @if (auth()->user()->renewal_waiting_fund->count() > 0)
                        <div class="intro-y box p-5 text-center overflow-x-auto">
                            <h5 class="text-2xl">Waiting For Fund . . .</h5>
                            <br>
                            <table class="table">
                                <tr>
                                    <td width="50%"
                                        class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-right">
                                        Amount (USDT BEP-20)
                                    </td>
                                    <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                        {{ number_format($deposit->first()->amount, 5) }}
                                        <small>(The amount of USDT to be transferred must match the
                                            amount)</small>&nbsp;<button type="button" class="btn btn-xs btn-danger"
                                            wire:click="cancel()">Cancel</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"
                                        class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">
                                        Send To {{ $payment_name }} Address
                                        <br>
                                        <div style="display: flex; justify-content: center;" class="mt-3">
                                            {!! QrCode::size(200)->generate(config('constants.wallet')) !!}
                                        </div><br>
                                        {{ config('constants.wallet') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%"
                                        class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-right">
                                        Description
                                    </td>
                                    <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                        {{ $deposit->first()->requisite .' for member ' .$deposit->first()->user->username ." (contract $ " .number_format($deposit->first()->user->contract->value) .')' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"
                                        class="border border-b-2 dark:border-dark-5 whitespace-nowrapt text-center">
                                        <form wire:submit.prevent="done">
                                            <input wire:model.defer="information" class="form-control mt-3" cols="30"
                                                rows="2" placeholder="Insert TX ID Here" />
                                            @error('information')
                                                <div class="text-theme-6 mt-2">This field is required</div>
                                            @enderror
                                            <input type="submit" class="btn btn-success mt-3" value="Done">
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <small>The amount of {{ $name }} to be transferred must match the amount
                                above</small>
                        </div>
                    @else
                        @if (auth()->user()->renewal_waiting_process->count() > 0)
                            <div class="alert alert-success show">
                                <h1 class="text-center"><strong>We have received your funds.</strong><br>Account
                                    activation process takes at least 2 x 24 hours</h1>
                            </div>
                        @else
                            <form wire:submit.prevent="submit">
                                <div class="mt-3">
                                    <label for="contract" class="form-label">Contract</label>
                                    <select data-placeholder="Contract" wire:model="contract"
                                        class="form-select w-full">
                                        <option value="" selected>-- Choose Contract --</option>
                                        @foreach ($data_contract as $item)
                                            <option value="{{ $item->getKey() }}">{{ $item->name }} - $
                                                {{ number_format($item->value) }}</option>
                                        @endforeach
                                    </select>
                                    @error('contract')
                                        <div class="text-theme-6 mt-2">This field is required</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary mt-5">Submit</button>
                            </form>
                        @endif
                    @endif
                    @if ($error)
                        <div class="alert alert-danger show mt-3 mb-2" role="alert">
                            {!! $error !!}
                        </div>
                    @endif
                @else
                    <div class="alert alert-success show">
                        <h1 class="text-center">You don't need to do this action</h1>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-span-12 lg:col-span-6">
            <div class="alert alert-dark show intro-x">
                <h3>History</h3>
                <hr class="mt-2">
                <div style="overflow-y: auto; max-height: 300px; height: 300px">
                    <table class="table">
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->requisite }}</td>
                                    <td class="text-right">{{ number_format($row->amount) }}
                                        {{ $row->coin_name }}</td>
                                    <td>{{ $row->processed_at ? 'Success' : '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

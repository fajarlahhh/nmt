<div>
    <div class="grid grid-cols-12 gap-6 mt-5 ">
        <div class="intro-y box p-5 col-span-12 lg:col-span-12">
            @if ($deposit->count() > 0)
            <div class="intro-y box p-5 text-center overflow-x-auto">
                <h5 class="text-2xl">Waiting For Fund . . .</h5>
                <br>
                <table class="table">
                    <tr>
                        <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-right">
                            Amount (USDT BEP-20)
                        </td>
                        <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                            {{ number_format($deposit->first()->amount, 5) }}
                            <small>(The amount of USDT to be transferred must match the amount)</small>&nbsp;<button type="button" class="btn btn-xs btn-danger" wire:click="cancel()">Cancel</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">
                            Send To {{ $payment_name }} Address
                            <br>
                            <div style="display: flex; justify-content: center;" class="mt-3">
                                {!! QrCode::size(200)->generate(config('constants.wallet')); !!}
                            </div><br>
                            {{ config('constants.wallet') }}
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-right">
                            Description
                        </td>
                        <td width="50%" class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                            {{ $deposit->first()->requisite." for member ".$deposit->first()->user->username. " (contract $ ".number_format($deposit->first()->user->contract->value).")" }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border border-b-2 dark:border-dark-5 whitespace-nowrapt text-center" >
                            <form wire:submit.prevent="done">
                                <input wire:model.defer="information" class="form-control mt-3" cols="30" rows="2" placeholder="Insert TX ID Here"/>
                                @error('information')
                                <div class="text-theme-6 mt-2">This field is required</div>
                                @enderror
                                <input type="submit" class="btn btn-success mt-3" value="Done">
                            </form>
                        </td>
                    </tr>
                </table>
                <br>
            </div>
            @else
            <form wire:submit.prevent="submit" >
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-6">
                        <div>
                            <label for="username" class="form-label">Username</label>
                            <input id="username" type="text" class="form-control" autocomplete="off" wire:model.defer="username" placeholder="Username" required>
                            @error('username')
                            <div class="text-theme-6 mt-2">This field is required</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text" class="form-control" autocomplete="off" wire:model.defer="name" placeholder="Name" required>
                            @error('name')
                            <div class="text-theme-6 mt-2">This field is required</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control" autocomplete="off" wire:model.defer="email" placeholder="Email" required>
                            @error('email')
                            <div class="text-theme-6 mt-2">This field is required</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input id="crud-form-3" type="{{ $type }}" class="form-control" wire:model.defer="password" aria-describedby="input-group-1" placeholder="Password" autocomplete="off">
                                <a href="javascript:;" id="input-group-1" wire:click="showHide('{{ $show }}')" class="input-group-text">{{ $show }}</a>
                            </div>
                            @error('password')
                            <div class="text-theme-6 mt-2">This field is required</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <div class="alert alert-primary show">
                            <div wire:ignore>
                                <label for="upline" class="form-label">Referral</label>
                                <select data-placeholder="Contract" id="upline" class="form-select text-gray-700 border-gray-300" onchange="setUpline(this)" required>
                                    <option value="{{ auth()->id() }}">{{ auth()->user()->username }}</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="contract" class="form-label">Contract</label>
                                <select data-placeholder="Contract" id="contract" wire:model.defer="contract" class="form-select text-gray-700 border-gray-300" required>
                                    <option value="" selected>-- Choose Contract --</option>
                                    @foreach ($data_contract as $item)
                                    <option value="{{ $item->getKey() }}">{{ ($item->name) }} - $ {{ number_format($item->value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-5">Submit</button>
                @if ($error)
                <div class="alert alert-danger show col-span-12 lg:col-span-6 mt-2" role="alert">
                    {!! $error !!}
                </div>
                @endif
            </form>
            @endif
        </div>
    </div>
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tail.select.js@0.5.21/js/tail.select-full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
        function setUpline(select) {
            var value = $(select).find(':selected').val();
            window.livewire.emit('set:setupline', value);
        }

        tail.select('#upline', {
            search: true
        });

        Livewire.on('reinitialize', () => {
            tail.select('#upline', {
                search: true
            });
        });
    </script>
    @endpush
</div>

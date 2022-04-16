<div>
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">

                        <div class="widget-heading">
                            <h5 class="">Withdraw</h5>
                        </div>

                        <div class="widget-content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><div class="th-content">#</div></th>
                                            <th><div class="th-content">Username</div></th>
                                            <th><div class="th-content">Wallet</div></th>
                                            <th><div class="th-content">USDT Amount</div></th>
                                            <th><div class="th-content"></div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                        <tr>
                                            <td><div class="td-content">{{ ++$no }}</div></td>
                                            <td><div class="td-content customer-name">{{ $row->user->username }}</div></td>
                                            <td><div class="td-content customer-name">{{ $row->wallet }}</div></td>
                                            <td><div class="td-content">$ {{ number_format($row->usdt_amount, 4) }}</div></td>
                                            <td><div class="td-content">
                                                @if((int)$key===$row->getKey())
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <form wire:submit.prevent="send" class="form-inline">
                                                        <input type="text" class="form-control" wire:model.defer="information" placeholder="Information">&nbsp;
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="submit" class="btn btn-sm btn-primary">Done</button>
                                                        <button wire:click="cancel()" type="button" class="btn btn-sm btn-warning">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                @else
                                                <a href="javascript:;" wire:click="setKey({{ $row->getKey() }})" class="btn btn-sm btn-primary">Proccess</a>
                                                @endif
                                            </div></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-wrapper text-center">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2021 <a target="_blank"
                            href="https://solutionstake.com">SolutionStake</a>, All rights reserved.</p>
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                <select data-placeholder="Contract" wire:model="process" class="form-select w-full">
                    <option value="0" selected>Not Processed</option>
                    <option value="1" selected>Processed</option>
                </select>
            </div>
        </div>
        <div class="p-5 overflow-x-auto" id="responsive-table">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Time</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Username</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Wallet</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">USDT Amount</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td class="border-b whitespace-nowrap">{{ ++$no }}</td>
                            <td class="border-b whitespace-nowrap">{{ $row->created_at }}</td>
                            <td class="border-b whitespace-nowrap">{{ $row->user->username }}</td>
                            <td class="border-b whitespace-nowrap">{{ $row->user->wallet }}</td>
                            <td class="border-b whitespace-nowrap text-right">{{ number_format($row->usdt_amount,4) }}</td>
                            <td class="border-b whitespace-nowrap text-right">
                                @if ($process == 1)
                                {{ $row->processed_at }}, {{ $row->txid }}
                                @else
                                @if((int)$key===$row->getKey())
                                <form wire:submit.prevent="send">
                                    @error('information')
                                    <div class="text-theme-6">This field is required</div>
                                    @enderror
                                    <input type="text" class="form-control" wire:model.defer="information" placeholder="Information"><br>
                                    <button class="btn btn-primary mt-1">Done</button>
                                    <a wire:click="cancel()" href="javascript:;" class="btn btn-success">Cancel</a>
                                </form>
                                @else
                                <a href="javascript:;" wire:click="setKey({{ $row->getKey() }})" class="btn btn-danger">Proccess</a>
                                @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col sm:flex-row items-center mt-5">
                <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                {{ $data->links() }}
                </div>
            </div>
        </div>
    </div> --}}
</div>

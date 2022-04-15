<div>
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">

                        <div class="widget-heading">
                            <h5 class="">Payment</h5>
                        </div>

                        <div class="widget-content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><div class="th-content">#</div></th>
                                            <th><div class="th-content">Username</div></th>
                                            <th><div class="th-content">Requisite</div></th>
                                            <th><div class="th-content">Amount</div></th>
                                            <th><div class="th-content">TX ID</div></th>
                                            <th><div class="th-content"></div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                        <tr>
                                            <td><div class="td-content">{{ ++$no }}</div></td>
                                            <td><div class="td-content customer-name">{{ $row->owner->username }}</div></td>
                                            <td><div class="td-content">{{ $row->requisite }} {{ $row->user->username }} ($ {{ number_format($row->user->contract->value) }})</div></td>
                                            <td><div class="td-content pricing"><span class="">{{ $row->amount }}</span></div></td>
                                            <td><div class="td-content">{{ $row->information }}</div></td>
                                            <td><div class="td-content">
                                                @if((int)$key===$row->getKey())
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button wire:click="process()" type="button" class="btn btn-sm btn-success">Yes, Process</button>
                                                    <button wire:click="delete()" type="button" class="btn btn-sm btn-danger">Delete</button>
                                                    <button wire:click="cancel()" type="button" class="btn btn-sm btn-warning">Cancel</button>
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
                    <option value="2">Not Processed</option>
                    <option value="1">Processed</option>
                </select>
            </div>
        </div>
        <div class="p-5 overflow-x-auto" id="responsive-table">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Username</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Requisite</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Amount</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Time</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">TX ID</th>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                        </tr>
                    </thead>
                    <tbody>
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

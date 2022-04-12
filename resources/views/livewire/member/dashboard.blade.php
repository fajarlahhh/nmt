<div>
    @include('includes.mobile-menu')
    <div class="flex">
        @include('includes.side-menu')
        <!-- BEGIN: Content -->
        <div class="content">
            @include('includes.top-bar', [
                'menu' => $menu,
            ])
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xxl:col-span-12">
                    <div class="grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Dashboard
                                </h2>
                                <a href="" class="ml-auto flex items-center text-theme-1 dark:text-theme-10"> <i
                                        data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload </a>
                            </div>
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-12 md:col-span-12 xl:col-span-12">
                                    @if (!auth()->user()->google2fa_secret)
                                        <div class='alert intro-y alert-danger-soft text-1xl gap-6 show mt-2'
                                            role='alert'>
                                            You need to activate google authenticator <strong><a href='/security'
                                                    class='text-danger'>here</a></strong>
                                        </div>
                                    @endif
                                    @if (!auth()->user()->wallet)
                                        <div class='alert intro-y alert-warning-soft text-1xl gap-6 show mt-2'
                                            role='alert'>
                                            Insert your USDT BEP-20 wallet address <strong><a href='/profile'
                                                    class='text-danger'>here</a></strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-12 md:col-span-12 xl:col-span-12 intro-y">
                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-12 sm:col-span-12 xl:col-span-3 intro-y">
                                            <div class="report-box zoom-in">
                                                <div class="box p-5">
                                                    <div class="flex">
                                                        Contract
                                                    </div>
                                                    <div class="text-2xl font-bold leading-8 mt-6 text-right">$
                                                        {{ number_format($contract, 2) }} + <small>$
                                                            {{ number_format($benefit, 2) }}</small></div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="report-box zoom-in">
                                                <div class="box p-5 bg-slate-700">
                                                    <div class="flex">
                                                        <a href="/gift">Active Income</a>
                                                        <div class="ml-auto">
                                                            <i data-feather="inbox"
                                                                class="report-box__icon text-theme-11"></i>
                                                        </div>
                                                    </div>
                                                    <div class="text-2xl font-bold leading-8 mt-6 text-right">$
                                                        {{ number_format($active_income->sum('credit') - $active_income->sum('debit'), 2) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-12 sm:col-span-12 xl:col-span-9 intro-y">
                                            <div class="alert alert-dark show intro-x">
                                                <h3>Withdrawal History</h3>
                                                <hr>
                                                <div class="overflow-x-auto" id="responsive-table">
                                                    <table class="table">
                                                        @foreach ($history as $row)
                                                            <tr>
                                                                <td
                                                                    class="border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                                    {{ $row->created_at }}
                                                                </td>
                                                                <th
                                                                    class="border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                                    @if ($row->income)
                                                                        Active Income
                                                                    @else
                                                                        @if ($row->passive->type == 'contract')
                                                                            Contract
                                                                        @else
                                                                            Passive Income
                                                                        @endif
                                                                    @endif
                                                                </th>
                                                                <td
                                                                    class="border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                                    {{ $row->wallet }} =
                                                                    {{ number_format($row->usdt_amount, 4) }} USDT
                                                                </td>
                                                                <td
                                                                    class="border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                                    @if ($row->processed_at)
                                                                        Success at {{ $row->processed_at }}, TX ID :
                                                                        {{ $row->txid }}
                                                                    @else
                                                                        Waiting...
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
</div>

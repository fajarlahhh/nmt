<div>
    @push('css')
        <link rel="stylesheet" type="text/css" href="assets/css/widgets/modules-widgets.css">
        <link href="/assets/css/components/tabs-accordian/custom-accordions.css" rel="stylesheet" type="text/css" />
    @endpush
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <div class="page-title">
                    <h5>Dashboard </h5>
                </div>
            </div>

            <div class="row layout-top-spacing">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">

                    <div class="widget widget-account-invoice-three">

                        <div class="widget-heading">
                            <div class="wallet-usr-info">
                                <div class="usr-name">
                                    <span><img src="/assets/img/logo.svg" alt="admin-profile" class="img-fluid">
                                        {{ auth()->user()->username }}</span>
                                </div>
                            </div>
                            <div class="wallet-balance">
                                <p>Fund</p>
                                <h5 class=""><span class="w-currency">$</span>
                                    {{ number_format(auth()->user()->contract->value) }}</h5>
                            </div>
                            <div class="float-right">
                                @if (auth()->user()->invalid_at < now())
                                    <button class="btn btn-sm btn-default" type="submit">Claim</button>
                                @endif
                            </div>
                        </div>

                        <div class="widget-amount">
                            <div class="w-a-info funds-spent">
                                <span>Active <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift">
                                        <polyline points="20 12 20 22 4 22 4 12"></polyline>
                                        <rect x="2" y="7" width="20" height="5"></rect>
                                        <line x1="12" y1="22" x2="12" y2="7"></line>
                                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                                    </svg></span>
                                <p>{{ number_format($active_income->sum('credit') - $active_income->sum('debit')) }}
                                </p>
                                <small class="text-center"><a href="/active">Claim Here</a></small>
                            </div>

                            <div class="w-a-info funds-received">
                                <span>Passive <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg></span>
                                <p>{{ number_format($benefit) }}
                                </p>
                                <small class="text-center"><a href="/passive">Claim Here</a></small>
                            </div>
                        </div>

                        <div class="widget-content">

                            <div class="bills-stats">
                                <span>Entrant</span>
                            </div>

                            <div class="invoice-list">

                                <div class="inv-detail">
                                    <div class="info-detail-1">
                                        <p>Referral</p>
                                        <p>
                                            <span class="bill-amount">
                                                {{ number_format($entrant->whereNotNull('activated_at')->where('level', 1)->count()) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="info-detail-2">
                                        <p>Level 1</p>
                                        <p>
                                            <span class="bill-amount">
                                                {{ number_format($entrant->whereNotNull('activated_at')->where('level', 2)->count()) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="info-detail-3">
                                        <p>Level 2</p>
                                        <p>
                                            <span class="bill-amount">
                                                {{ number_format($entrant->whereNotNull('activated_at')->where('level', 3)->count()) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="info-detail-4">
                                        <p>Level 3</p>
                                        <p>
                                            <span class="bill-amount">
                                                {{ number_format($entrant->whereNotNull('activated_at')->where('level', 4)->count()) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="info-detail-4">
                                        <p>Level 4</p>
                                        <p>
                                            <span class="bill-amount">
                                                {{ number_format($entrant->whereNotNull('activated_at')->where('level', 5)->count()) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="inv-action">
                                    <a href="/enrollment" class="btn btn-outline-primary view-details">+ Enrollment</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div id="toggleAccordion">
                        <div class="card">
                            <div class="card-header" id="...">
                                <section class="mb-0 mt-0">
                                    <div role="menu" class="collapsed" data-toggle="collapse"
                                        data-target="#defaultAccordionOne" aria-expanded="true"
                                        aria-controls="defaultAccordionOne">
                                        Pending Income
                                    </div>
                                </section>
                            </div>

                            <div id="defaultAccordionOne" class="collapse" aria-labelledby="..."
                                data-parent="#toggleAccordion">
                                <div class="card-body">
                                    <div class="widget widget-table-one">
                                        <div class="widget-content overflow-auto" style="height: 300px">
                                            @foreach ($entrant->whereNull('activated_at') as $key => $row)
                                                <div class="transactions-list t-info">
                                                    <div class="t-item">
                                                        <div class="t-company-name">
                                                            <div class="t-icon">
                                                                <div class="avatar avatar-xl">
                                                                    <span class="avatar-title">
                                                                        @switch($row->level)
                                                                            @case(1)
                                                                                Ref.
                                                                            @break

                                                                            @case(2)
                                                                                Lv.1
                                                                            @break

                                                                            @case(3)
                                                                                Lv.2
                                                                            @break

                                                                            @case(4)
                                                                                Lv.3
                                                                            @break

                                                                            @case(5)
                                                                                Lv.4
                                                                            @break
                                                                        @endswitch
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="t-name">
                                                                <h4>{{ $row->username }}</h4>
                                                                <p class="meta-date">{{ $row->created_at }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="t-rate rate-inc">
                                                            <p><span>+ $@switch($row->level)
                                                                        @case(1)
                                                                            {{ number_format($row->contract->sponsorship_benefits) }}
                                                                        @break

                                                                        @case(2)
                                                                            {{ number_format($row->contract->first_level_benefits) }}
                                                                        @break

                                                                        @case(3)
                                                                            {{ number_format($row->contract->second_level_benefits) }}
                                                                        @break

                                                                        @case(4)
                                                                            {{ number_format($row->contract->third_level_benefits) }}
                                                                        @break

                                                                        @case(5)
                                                                            {{ number_format($row->contract->forth_level_benefits) }}
                                                                        @break
                                                                    @endswitch
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="...">
                                <section class="mb-0 mt-0">
                                    <div role="menu" class="collapsed" data-toggle="collapse"
                                        data-target="#defaultAccordionTwo" aria-expanded="true"
                                        aria-controls="defaultAccordionTwo">
                                        Recent Withdrawal
                                    </div>
                                </section>
                            </div>

                            <div id="defaultAccordionTwo" class="collapse" aria-labelledby="..."
                                data-parent="#toggleAccordion">
                                <div class="card-body">
                                    <div class="widget widget-table-two">
                                        <div class="widget-content">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="th-content">Time</div>
                                                            </th>
                                                            <th>
                                                                <div class="th-content">Kind</div>
                                                            </th>
                                                            <th>
                                                                <div class="th-content">Wallet</div>
                                                            </th>
                                                            <th>
                                                                <div class="th-content">USDT</div>
                                                            </th>
                                                            <th>
                                                                <div class="th-content">Status</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($history as $row)
                                                            <tr>
                                                                <td class="text-nowrap pr-3">
                                                                    <div class="td-content pricing">
                                                                        {{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap pr-3">
                                                                    <div class="td-content pricing">
                                                                        @if ($row->income)
                                                                            Active Income
                                                                        @else
                                                                            @if ($row->passive->type == 'contract')
                                                                                Contract
                                                                            @else
                                                                                Passive Income
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap pr-3">
                                                                    <div class="td-content product-invoice">
                                                                        {{ $row->wallet }}
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap pr-3 text-right">
                                                                    <div class="td-content text-right "><span
                                                                            class="">{{ $row->usdt_amount }}</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap pr-3">
                                                                    @if ($row->processed_at)
                                                                        <div class="td-content"><span
                                                                                class="badge outline-badge-success">Paid,
                                                                                TX
                                                                                ID :
                                                                                {{ $row->txid }}</span>
                                                                        </div>
                                                                    @else
                                                                        <div class="td-content"><span
                                                                                class="badge outline-badge-danger">Pending</span>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
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

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2021 <a target="_blank"
                            href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg></p>
                </div>
            </div>

        </div>
    </div>
    <!--  END CONTENT PART  -->
    {{-- @include('includes.mobile-menu')
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
    </div> --}}
</div>

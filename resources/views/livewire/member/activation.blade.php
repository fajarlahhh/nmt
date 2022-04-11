<div>
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="{{ config('app.name') }}" class="w-6" src="/images/logo.png">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-theme-29 py-5 hidden">
            <li>
                <a href="/activation" class="menu @if ($menu == 'activation') menu--active @endif">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Activation </div>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Mobile Menu -->

    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="{{ config('app.name') }}" class="w-6" src="/images/logo.png">
                <span class="hidden xl:block text-white text-lg ml-3"> Solution<span class="font-medium">Stake</span> </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="/activation" class="side-menu  @if ($menu == 'activation') side-menu--active @endif">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="side-menu__title"> Activation </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Activation</a> </div>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">
                        <img src="/images/profile-6.jpg">
                    </div>
                    <div class="dropdown-menu w-56">
                        <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                            <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                                <div class="font-medium">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">{{ auth()->user()->email }}</div>
                            </div>
                            <div class="p-2">
                                <a href="mailto:support@solutionsystem  .com" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                            </div>
                            <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                                <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Activation
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-12 mt-5">
                <div class="intro-y col-span-12 lg:col-span-12">
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
                                    <small>(The amount of USDT to be transferred must match the amount)</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">
                                    Send To Address
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
                        <small>The amount of {{ $name }} to be transferred must match the amount above</small>
                    </div>
                    @endif
                    @if (auth()->user()->registration_waiting_activated->count() > 0)
                    <div class="alert alert-success show">
                        <h1 class="text-center"><strong>We have received your funds.</strong><br>Account activation process takes at least 2 x 24 hours</h1>
                    </div>
                    @else
                    @if (!auth()->user()->activated_at)
                    <div class="alert alert-warning show">
                        <h1 class="text-center">Your account has not been activated. Please contact admin</h1>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
</div>

<div>
    @push('css')
        <link href="/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    @endpush
    @include('includes.header')

    @include('form.profile')
    @include('form.password')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="page-header">
                <div class="page-title">
                    <h5>Activation</h5>
                </div>
            </div>
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            @if ($deposit->count() > 0)
                                <div class="intro-y box text-center overflow-x-auto">
                                    <h5 class="text-2xl">Waiting For Fund . . .</h5>
                                    <br>
                                    <table class="table">
                                        <tr>
                                            <td width="50%"
                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-right">
                                                Amount (USDT BEP-20)
                                            </td>
                                            <td width="50%"
                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                {{ number_format($deposit->first()->amount, 5) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"
                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">
                                                <small>(The amount of USDT to be transferred must match the
                                                    amount)</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"
                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">
                                                Send To Address
                                                <br>
                                                <div style="display: flex; justify-content: center;"
                                                    class="mt-3">
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
                                            <td width="50%"
                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                                {{ $deposit->first()->requisite .' for ' .$deposit->first()->user->username ." (contract $ " .number_format($deposit->first()->user->contract->value) .')' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"
                                                class="border border-b-2 dark:border-dark-5 whitespace-nowrapt text-center">
                                                <form wire:submit.prevent="done">
                                                    <input wire:model.defer="information" class="form-control"
                                                        cols="30" rows="2" placeholder="Insert TX ID Here" />
                                                    @error('information')
                                                        <span class="text-danger">This field is required</span>
                                                    @enderror
                                                    <br>
                                                    <input type="submit" class="btn btn-success" value="Done">
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                </div>
                            @else
                            @if (auth()->user()->registration_waiting_activated->count() > 0)
                                <div class="alert alert-warning show" style="margin-top: 100px; margin-bottom: 100px">
                                    <h6 class="text-center"><strong>We have received your
                                            funds.</strong><br><small>Account
                                            activation process takes at least 2 x 24 hours</small></h6>
                                </div>
                            @else
                                @if (!auth()->user()->activated_at)
                                    <div class="alert alert-success show"
                                        style="margin-top: 100px; margin-bottom: 100px; margin-bottom: 100px">
                                        <h6 class="text-center">Your account has not been activated. Please contact
                                            admin
                                        </h6>
                                    </div>
                                @endif
                            @endif
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center">
            <div class="footer-section f-section-1">
                Copyright © 2021 <a target="_blank" href="https://solutionstake.com">Solution Stake</a>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
    @push('scripts')
    @endpush
</div>

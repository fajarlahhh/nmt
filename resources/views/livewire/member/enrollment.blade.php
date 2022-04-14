<div>
    @push('css')
        <link href="/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    @endpush
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="page-header">
                <div class="page-title">
                    <h5>Enrollment</h5>
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
                                                Send To {{ $payment_name }} Address
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
                                                {{ $deposit->first()->requisite .' for member ' .$deposit->first()->user->username ." (contract $ " .number_format($deposit->first()->user->contract->value) .')' }}
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
                                                    <input type="submit" class="btn btn-success mt-3"
                                                        value="Done">&nbsp;<button type="button"
                                                        class="btn btn-xs btn-danger mt-3"
                                                        wire:click="cancel({{ $deposit->first()->id_user }})">Cancel</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                </div>
                            @else
                                <form wire:submit.prevent="submit">
                                    <div class="form-group mb-2">
                                        <label for="username" class="form-label">Username</label>
                                        <input id="username" type="text" class="form-control" autocomplete="off"
                                            wire:model.defer="username" placeholder="Username" required>
                                        @error('username')
                                            <span class="text-danger">This field is required</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" type="text" class="form-control" autocomplete="off"
                                            wire:model.defer="name" placeholder="Name" required>
                                        @error('name')
                                            <span class="text-danger">This field is required</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control" autocomplete="off"
                                            wire:model.defer="email" placeholder="Email" required>
                                        @error('email')
                                            <span class="text-danger">This field is required</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input id="crud-form-3" type="{{ $type }}" class="form-control"
                                                wire:model.defer="password" aria-describedby="input-group-1"
                                                placeholder="Password" autocomplete="off">
                                            <a href="javascript:;" id="input-group-1"
                                                wire:click="showHide('{{ $show }}')"
                                                class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" id="toggle-password"
                                                    class="feather feather-eye">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg></a>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">This field is required</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="contract" class="form-label">Package</label>
                                        <select class="form-control" wire:model.defer="contract"
                                            id="exampleFormControlSelect1">
                                            <option value="" selected>-- Choose Package --</option>
                                            @foreach ($data_contract as $item)
                                                <option value="{{ $item->getKey() }}">{{ $item->name }}
                                                    - $
                                                    {{ number_format($item->value) }}</option>
                                            @endforeach
                                        </select>
                                        @error('contract')
                                            <span class="text-danger">This field is required</span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary ">
                                        <a href="/" class="btn btn-danger">Cancel</a>
                                    </div>
                                </form>
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

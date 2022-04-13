<div>
    @push('css')
        <link href="/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    @endpush
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="page-header">
                <div class="page-title">
                    <h5>Profile</h5>
                </div>
            </div>
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <form wire:submit.prevent="submit">
                                <div class="form-group mb-2">
                                    <label for="username" class="form-label">Username</label>
                                    <input id="username" type="text" class="form-control" value="{{ $username }}"
                                        placeholder="Username" readonly>
                                    @error('username')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" type="text" class="form-control" wire:model.defer="name"
                                        placeholder="Name">
                                    @error('name')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="text" class="form-control" wire:model.defer="email"
                                        placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="wallet" class="form-label">USDT Wallet <small
                                            class="text-danger">(BEP
                                            20)</small></label>
                                    <input id="wallet" type="text" class="form-control text-gray-700"
                                        wire:model="wallet" placeholder="BEP-20 Wallet">
                                    @error('wallet')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="referral" class="form-label">Referral Link</label>
                                    <div class="input-group">
                                        <input id="crud-form-3" type="text" class="form-control text-gray-700" readonly
                                            value="{{ $referral }}" aria-describedby="input-group-1">
                                        <a href="javascript:;" id="input-group-1" class="input-group-text"
                                            onclick="copyToClipboard('{{ $referral }}')">Copy</a>
                                    </div>
                                </div>
                                <hr class="mb-1">
                                <div class="form-group mb-2">
                                    <label for="contract" class="form-label">Contract</label>
                                    <input id="contract" type="text" class="form-control text-right"
                                        value="$ {{ number_format($contract) }}" placeholder="Contract" readonly>
                                    @error('contract')
                                        <span class="text-danger">This field is required</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="upline" class="form-label">Referral</label>
                                    <input id="upline" type="text" class="form-control" value="{{ $upline }}"
                                        placeholder="Upline" readonly>
                                </div>
                                @if (auth()->user()->google2fa_secret)
                                    <hr class="mb-1">
                                    <div class="form-group mb-2">
                                        <label for="username" class="form-label">Google Auth PIN</label>
                                        <input id="username" type="text" class="form-control" wire:model.defer="pin"
                                            placeholder="Enter Your Google Authenticator PIN" autocomplete="off">
                                        @error('pin')
                                            <span class="text-danger">This field is required</span>
                                        @enderror
                                    </div>
                                @endif
                                <div class="text-center">
                                    <input type="submit" class="mt-4 btn btn-primary ">
                                    <a href="/" class="mt-4 btn btn-danger">Cancel</a>
                                </div>
                            </form>
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
        <script>
            function copyToClipboard(text) {
                var input = document.body.appendChild(document.createElement("input"));
                input.value = text;
                input.focus();
                input.select();
                document.execCommand('copy');
                input.parentNode.removeChild(input);
                alert('Referral Copied');
            }
        </script>
    @endpush
</div>

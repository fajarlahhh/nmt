<div>
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="/" class="-intro-x flex items-center pt-5">
                <img alt="{{ config('app.name') }}" class="w-10" src="/images/logo-full.png">
                <span class="text-white text-lg ml-3">
                    Solution <span class="font-medium">Stake</span>
                    <hr class="text-white">
                </span>
            </a>
            <div class="-intro-x grid font-medium grid-cols-12 gap-6 mt-2 text-dark">
                <div class="intro-y col-span-12 lg:col-span-8 box p-5"  style="max-height: 600px; overflow-y: auto;">
                    <div class="text-center"><strong>MARKETING PLAN</strong></div>
                    <hr class="mt-2 mb-2">
                    <strong>Contract :</strong>
                    <p><i data-feather="check"></i> $100 Get $160</p>
                    <p><i data-feather="check"></i> $500 Get $800</p>
                    <p><i data-feather="check"></i> $1000 Get $1600</p>
                    <p><i data-feather="check"></i> $2000 Get $3200</p>
                    <p><i data-feather="check"></i> $5000 Get $8000</p>
                    <p><i data-feather="check"></i> $10000 Get $19000</p>
                    <p><i data-feather="check"></i> $15000 Get $28500</p>
                    <p><i data-feather="check"></i> $20000 Get $38000</p>
                    <p><i data-feather="check"></i> $25000 Get $47500</p>
                    <p><i data-feather="check"></i> $30000 Get $57000</p>
                </div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <form wire:submit.prevent="submit">
                    <div class="intro-y mt-2 xl:hidden">
                        <div class="alert alert-dark show">

                            <h3 class="text-2xl text-center">

                            <a href="/" class="-intro-x flex text-center">
                                <img alt="{{ config('app.name') }}" class="w-20" style="margin:auto" src="/images/logo.png">
                            </a>
                            Marketing Plan</h3>
                            <hr class="mt-2 mb-2">
                            <strong>Contract :</strong>
                            <p><i data-feather="check"></i> $100 Get $160</p>
                            <p><i data-feather="check"></i> $500 Get $800</p>
                            <p><i data-feather="check"></i> $1000 Get $1600</p>
                            <p><i data-feather="check"></i> $2000 Get $3200</p>
                            <p><i data-feather="check"></i> $5000 Get $8000</p>
                            <p><i data-feather="check"></i> $10000 Get $19000</p>
                            <p><i data-feather="check"></i> $15000 Get $28500</p>
                            <p><i data-feather="check"></i> $20000 Get $38000</p>
                            <p><i data-feather="check"></i> $25000 Get $47500</p>
                            <p><i data-feather="check"></i> $30000 Get $57000</p>
                        </div>
                    </div>
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left mt-5">
                        Sign Up Here
                    </h2>
                    <div class="intro-x mt-8">
                        <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" wire:model.defer="username" placeholder="Username" required>
                        <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Full Name" wire:model.defer="name" required>
                        <input type="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Email" wire:model.defer="email" required>
                        <input type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" wire:model.defer="password" placeholder="Password" required>
                        <select data-placeholder="Contract" wire:model.defer="contract" class="intro-x login__input form-select py-3 px-4 border-gray-300 mt-4" required>
                            <option value="" selected>-- Choose Contract --</option>
                            @foreach ($data_contract as $item)
                            <option value="{{ $item->getKey() }}">{{ ($item->name) }} - $ {{ number_format($item->value) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
                        <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top" type="button" wire:click="login">Sign in</button>
                    </div>
                    @if ($message)
                        {!! $message !!}
                    @endif
                </form>
                @if ($error)
                <div class="alert alert-danger show mt-3 mb-2" role="alert">
                    {!! $error !!}
                </div>
                @endif
                @include('includes.footer')
            </div>
        </div>
        <!-- END: Login Form -->
    </div>
</div>

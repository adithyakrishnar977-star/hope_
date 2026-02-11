<x-guest-layout>
<link rel="stylesheet" href="{{ asset('../resources/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('../resources/css/bootstrap.min.css') }}">

        <div class="login-container">
            <div class="login-inner">
                <div class="row align-items-center gx-5">
                    <div class="col-6">
                        <div class="head-1">
                            <div class="d-flex justify-content-center">
                                <img src="images/logo.svg">
                            </div>
                            <div class="forgot-pwd mt-4">
                               <h5>{{ __('Forgot your password? No problem. Just let us know your email address and we will
                                 email you a password reset link that will allow you to choose a new one.') }}</h5> 
                            </div>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class = "mb-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class = "d-flex justify-content-center align-items-center mt-4">
                                    <x-primary-button class="btn-primary rounded-pill">
                                        {{ __('Email Password Reset Link') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="login-image">
                            <img src="images/5665299_57814.jpg" class="w-100 h-100">
                            <h1 class="text-white text-center">FORGOT PASSWORD</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>























    
</x-guest-layout>

<x-guest-layout>
<link rel="stylesheet" href="{{ asset('../resources/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('../resources/css/bootstrap.min.css') }}">
    <div class="login-container">
        <div class="login-inner">
            <div class="row align-items-center gx-5">
                <div class="col-6">
                    <div class="head-1">
                        <div class="d-flex justify-content-center">
                            <img src="../images/logo.svg" alt="">
                        </div>
                        <div class="forgot-pwd mt-4">
                               <h5>{{ __('Reset Your Password') }}</h5> 
                        </div>
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>
                                    {{ __('Reset Password') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                        <div class="login-image">
                            <img src="../images/5665299_57814.jpg" class="w-100 h-100">
                            <h1 class="text-white text-center">RESET PASSWORD</h1>
                        </div>
                </div>
            </div>
        </div>
    </div>



    
</x-guest-layout>

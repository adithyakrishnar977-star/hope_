<link rel="stylesheet" href="{{ asset('../resources/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('../resources/css/bootstrap.min.css') }}">



<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class= "login-container">
        <div class="login-inner">
            <div class="row align-items-center gx-5">
                <div class="col-6">
                    <div class= "head-1">
                        <div class="d-flex justify-content-center">
                            <img src="images/logo.svg">
                        </div>
                         <form method="POST" action="{{ route('login') }}">
                             @csrf
                                <div class="mb-5 d-flex flex-column gap-2">
                                     <x-input-label for="email" :value="__('Email')" class="form-label mb-0" />
                                     <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                     <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="d-flex flex-column gap-2">
                                    <x-input-label for="password" :value="__('Password')" class="form-label mb-0"/>

                                    <x-text-input id="password" class="form-control" 
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="current-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"  name="remember">
                                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                            <h1>{{ __('Forgot your password?') }}</h1>
                                        </a>
                                    @endif

                                    <x-primary-button class="ms-3">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                </div>

                                <div class="flex items-center mt-4">
                                    @if (Route::has('register'))
                                        <a class="underline  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                                           <h1>{{ __('New ? Sign Up') }}</h1> 
                                        </a>
                                    @endif

                                </div>
                         </form>
                    </div>
                </div>
                <div class="col-6">
                    <div class="login-image">
                        <img src="images/5665299_57814.jpg" class="w-100 h-100">
                        <h1 class="text-white">LOGIN</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <form method="POST" action="{{ route('login') }}">
        @csrf

        Email Address
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        Password
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        Remember Me
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> -->
</x-guest-layout>

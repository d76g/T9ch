@section('title', 'Login')
@php
    $locale = app()->getLocale();
@endphp
<x-guest-layout>
    <div class="relative h-screen w-screen">
    <div class="absolute inset-0 sm:h-screen sm:w-full md:bg-cover bg-center bg-no-repeat login-background-blur"
     style="background-image: url({{URL::asset('/image/login-background-3.png')}})"></div>
    <div class="absolute w-full h-screen flex flex-col justify-center items-center z-20 {{textDirection($locale)}}">
        <div class="absolute bottom-5 bg-white w-80 py-4 px-8 sm:w-96 md:w-[500px] h-auto md:py-6 md:px-14 rounded-md {{fontNameForArabic($locale, 'font-plex','font-space')}} drop-shadow-sm">
            <div class="text-xl sm:text-2xl  w-full text-center py-1">
                <a href="/" class="hover:text-blue-600"><p>{{__('Welcome to T9chnih')}}</p></a> 
            </div>
            @if($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: @json(__('Whoops! Something went wrong.')),
                        text: @json(__('Check email and password and try again.')),
                        icon: 'error',
                        iconColor: '#dc3545',
                        timer: 5000,
                        width: '25rem',
                        toast: true,
                        position: 'top-end',
                        confirmButtonText: @json(__('OK'))
                    });
                });
            </script>
            @endif
            <p class="text-xs sm:text-sm py-1">{{__('Sign in using')}}</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-xs sm:text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
        
    </div>
</x-guest-layout>

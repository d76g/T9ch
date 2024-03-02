@section('title', 'Reset Password')
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        @if($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var errorMessage = @json($errors->first('email'));
                
                // Localizing the errorMessage if it matches certain keys
                if (errorMessage === 'passwords.token') {
                    errorMessage = @json(__('Token is invalid. Please request a new link.'));
                } else {
                    // Default to translating the errorMessage directly
                    errorMessage = @json(__($errors->first('email')));
                }
        
                Swal.fire({
                    title: @json(__('Whoops! Something went wrong.')),
                    text: errorMessage,
                    icon: 'error',
                    timer: 5000,
                    confirmButtonText: @json(__('OK'))
                });
            });
        </script>
        @endif
        <div class="pb-4">
            <h2 class="text-2xl font-bold text-center text-slate-800">{{ __('Reset Password') }}</h2>
            <p class="mt-2 text-sm text-center text-slate-600">{{ __('Enter your email and new password to reset your password.') }}</p>
        </div>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div>
                <p class="mt-2 text-xs text-start text-slate-600"> {{__('You will be redirected to the login page if reset is successful.')}}</p>
            </div>
            <div class="flex items-center justify-end mt-4 gap-2">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
                @if($errors->any())
                <a href="/forgot-password">
                <x-jet-button type="button" class="bg-slate-500 hover:bg-slate-400">
                    {{ __('Forgot Password') }}
                </x-jet-button>
                @endif
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        @if (session('status') )
            @if (session('status') == 'passwords.sent')
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            title: 'Success!',
                            text: 'A password reset link has been sent to your email address.',
                            icon: 'success',
                            timer: 1500,
                            confirmButtonText: 'OK'
                        });
                    });
            </script>
        @endif
        @endif
        @if($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var errorMessage = @json($errors->first('email'));
                
                // Localizing the errorMessage if it matches certain keys
                if (errorMessage === 'passwords.user') {
                    errorMessage = @json(__('We can\'t find a user with that email address.'));
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
        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

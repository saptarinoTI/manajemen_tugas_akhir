<x-guest-layout>
    <x-auth.card>
        <x-slot name="logo">
            <x-auth.logo width="300" />
        </x-slot>

        <form action="{{ route('password.email') }}" method="post">
            @csrf
            {{-- Email --}}
            <div class="mb-3 mt-2">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <div class="text-sm">{{ session('status') }}</div>
                    </div>
                @endif

                <p class="text-sm text-gray">
                    {{ __('Forgot your password? Does not matter. Please tell us your registered email
                    address and we will email you for a password reset link.') }}
                </p>

                <x-form.label value="{{ __('Email') }}" />
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required
                    onfocus />
                <x-form.validation-message name="email" />
            </div>

            <div class="d-flex justify-content-end mb-2">
                {{-- Button Component --}}
                <x-form.button type="submit">Email Password Reset Link</x-form.button>
            </div>
        </form>
    </x-auth.card>
</x-guest-layout>

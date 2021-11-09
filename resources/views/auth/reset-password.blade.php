<x-guest-layout>
    <x-auth.card>
        <x-slot name="logo">
            <x-auth.logo width="300" />
        </x-slot>

        <form action="{{ route('password.update') }}" method="post">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- Email --}}
            <div class="mb-3 mt-2">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <div class="text-sm">{{ session('status') }}</div>
                    </div>
                @endif

                <div class="mb-3">
                    <x-form.label value="{{ __('Email') }}" />
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email', $request->email) }}" required onfocus readonly />
                    <x-form.validation-message name="email" />
                </div>

                <div class="mb-3">
                    <x-form.label value="{{ __('Password') }}" />
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" required
                        autocomplete="new-password">
                    <x-form.validation-message name="password" />
                </div>

                <div class="mb-3">
                    <x-form.label value="{{ __('Confirm Password') }}" />
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" required
                        autocomplete="new-password">
                    <x-form.validation-message name="password_confirmation" />
                </div>
            </div>

            <div class="d-flex justify-content-end mb-2">
                {{-- Button Component --}}
                <x-form.button type="submit">Reset Password</x-form.button>
            </div>
        </form>
    </x-auth.card>
</x-guest-layout>

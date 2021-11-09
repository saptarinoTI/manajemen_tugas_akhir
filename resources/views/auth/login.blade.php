<x-guest-layout>
  <x-auth.card>
    <x-slot name="logo">
      <x-auth.logo width="300" />
    </x-slot>

    <form action="{{ route('login') }}" method="post">
      @csrf
      {{-- Username --}}
      <div class="mb-3 mt-2">
        <x-form.label value="{{ __('Username') }}" />
        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="off" onfocus />
        @error('username')
        <div class="invalid-feedback">
          Username dan password salah!
        </div>
        @enderror
      </div>

      {{-- Password --}}
      <div class=" mb-3">
        <x-form.label value="{{ __('Password') }}" />
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="off">
        @error('password')
        <div class="invalid-feedback">
          Username dan password salah!
        </div>
        @enderror
      </div>

      {{-- Forgot Password --}}
      <div class="d-flex justify-content-between mb-2">
        <span class="align-self-center fw-semibold">
          <a href="{{ route('password.request') }}" class="text-sm text-gray">
            <u>Forgot your password?</u>
          </a>
        </span>

        {{-- Button Component --}}
        <x-form.button type="submit">Log In</x-form.button>
      </div>
    </form>
  </x-auth.card>
</x-guest-layout>

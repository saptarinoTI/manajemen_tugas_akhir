<x-guest-layout>
  <x-auth.card>
    <x-slot name="logo">
      <x-auth.logo width="300" />
    </x-slot>

    <div class="mb-4 text-sm text-gray">
      {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 text-sm alert alert-success">
      {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
    @endif

    <div class="mt-4 d-flex align-items-center justify-content-end">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div>
          <x-form.button type="submit">
            {{ __('Resend Verification Email') }}
          </x-form.button>
        </div>
      </form>
    </div>
    <div class="mt-3 d-flex align-items-center justify-content-between">
      <a href="{{ route('add-email') }}">
        <button type="submit" class="btn text-sm text-gray">
          <u>{{ __('Change Email') }}</u>
        </button>
      </a>

      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="btn text-sm text-gray">
          <u>{{ __('Log Out') }}</u>
        </button>
      </form>
    </div>
  </x-auth.card>
</x-guest-layout>

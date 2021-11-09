<x-guest-layout>
  <div class="d-flex justify-content-end">
    <span class="align-self-center fw-semibold">
      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="btn text-sm text-gray">
          <u>{{ __('Log Out') }}</u>
        </button>
      </form>
    </span>
  </div>

  <x-auth.card>
    <x-slot name="logo">
      <x-auth.logo width="300" />
    </x-slot>

    <div class="mb-4 text-sm text-gray">
      {{ __('Opps your email is not registered. Please register the correct email, because it will be used for the verification process.') }}
    </div>

    <form action="{{ route('add-email.store') }}" method="post">
      @csrf
      {{-- Email --}}
      <div class="mb-3 mt-2">
        <x-form.label value="{{ __('Email') }}" />
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required onfocus />
        <x-form.validation-message name="email" />
      </div>

      <div class="d-flex justify-content-end">
        <x-form.button type="submit">{{ __('Add Email') }}</x-form.button>
      </div>
      {{-- Forgot Password --}}
    </form>

  </x-auth.card>
</x-guest-layout>

<x-guest-layout>
    <!--- <x-auth.card>
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
  </x-auth.card> -->

    <div class="container-fluid ps-md-0">
        <div class="row d-flex g-0">
            <div class="d-none d-md-flex col-md-6 col-lg-6 bg-image"></div>
            <div class="col-md-6 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container p-5">
                        {{-- <h3 class="login-heading mb-4">Welcome back!</h3> --}}
                        <a href="#">
                            <img src="{{ asset('/img/logo/logo-color2.png') }}" alt="logo" width="300">
                        </a>


                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            {{-- Username --}}
                            <div class="mb-3 mt-2">
                                <x-form.label value="{{ __('Username') }}" />
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" required autocomplete="off" onfocus />
                                @error('username')
                                    <div class="invalid-feedback">
                                        Username dan password salah!
                                    </div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class=" mb-3">
                                <x-form.label value="{{ __('Password') }}" />
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required
                                    autocomplete="off">
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
                        <div class="text-center">
                            <a class="underline my-4" href="{{ route('judul-ta.index') }}" type="submit">Daftar Judul
                                Tugas Akhir</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>

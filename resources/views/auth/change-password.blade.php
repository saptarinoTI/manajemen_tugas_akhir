<x-app-layout>
  <x-slot name="name">Rubah Password</x-slot>

  <div class="card">
    <div class="card-body">
      <form class="form" method="POST" action="{{ route('user-change-password.update') }}">
        @csrf
        @method('patch')
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <x-form.label value="{{ __('Username') }}" />
              <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" readonly required value="{{ ucwords(Auth::user()->username) }}" />
              <x-form.validation-message name="username" />
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <x-form.label value="{{ __('Email') }}" />
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" readonly required value="{{ ucwords(Auth::user()->email) }}" />
              <x-form.validation-message name="email" />
            </div>
          </div>
          <div class="col-md-4 col-12">
            <div class="form-group">
              <x-form.label value="{{ __('Password Saat Ini') }}" />
              <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required />
              <x-form.validation-message name="old_password" />
            </div>
          </div>
          <div class="col-md-4 col-12">
            <div class="form-group">
              <x-form.label value="{{ __('Password Baru') }}" />
              <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required />
              <x-form.validation-message name="new_password" />
            </div>
          </div>
          <div class="col-md-4 col-12">
            <div class="form-group">
              <x-form.label value="{{ __('Konfirmasi Password') }}" />
              <input type="password" class="form-control @error('konf_password') is-invalid @enderror" name="konf_password" required />
              <x-form.validation-message name="konf_password" />
            </div>
          </div>
          <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-1 mt-2">Update Password</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</x-app-layout>

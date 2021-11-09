<x-app-layout>
  <x-slot name="name">Tambah Data Users</x-slot>

  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <form class="form form-horizontal" method="POST" action="{{ route('users.store') }}">
          @csrf
          <div class="form-body">
            <div class="row">
              <div class="col-md-4">
                <x-form.label value="{{ __('Username') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" onfocus />
                <x-form.validation-message name="username" />
                <span class="text-xs text-gray-500">*Username digunakan untuk password default dari
                  user.</span>
              </div>
              {{-- End Username --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Role') }}" />
              </div>
              <div class="col-md-8 form-group">
                <select class="form-select @error('role') is-invalid @enderror" id="basicSelect" name="role">
                  @foreach ($roles as $role)
                  <option value="{{ $role->name }}">{{ ucwords($role->name) }}</option>
                  @endforeach
                </select>
                <x-form.validation-message name="role" />
              </div>
              {{-- End Role --}}
              <div class="col-sm-12 mt-2 d-flex justify-content-end">
                <x-form.button type="submit">Submit Data</x-form.button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

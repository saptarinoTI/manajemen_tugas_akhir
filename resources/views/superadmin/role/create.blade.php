<x-app-layout>
    <x-slot name="name">Tambah Data Role Users</x-slot>

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('role.store') }}">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <x-form.label value="{{ __('Nama Role') }}" />
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" name="name" onfocus />
                                <x-form.validation-message name="name" />
                            </div>
                            {{-- End Username --}}

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

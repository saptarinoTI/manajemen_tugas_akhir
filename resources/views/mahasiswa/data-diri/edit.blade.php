<x-app-layout>
  <x-slot name="name">Update Data Diri Mahasiswa</x-slot>

  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <form class="form form-horizontal" method="POST" action="{{ route('data-diri.update', $mahasiswa->nim) }}">
          @csrf
          @method('PATCH')
          <div class="form-body">
            <p class="fw-bold mb-5">*Silahkan isi data diri dengan benar.</p>
            <div class="row">
              <div class="col-md-4">
                <x-form.label value="{{ __('NIM Mahasiswa') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control @error('nim') is-invalid @enderror" value="{{ $mahasiswa->nim }}" name="nim" onfocus readonly />
                <x-form.validation-message name="nim" />
              </div>
              {{-- End NIM --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Nama Mahasiswa') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ ucwords($mahasiswa->nama) }}" name="nama" />

                <x-form.validation-message name="nama" />
              </div>
              {{-- End Nama --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Nomor HP') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $mahasiswa->no_hp) }}" name="no_hp" autocomplete="off" />
                <x-form.validation-message name="no_hp" />
              </div>
              {{-- End Nomor HP --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Tempat Lahir') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control @error('tmpt_lahir') is-invalid @enderror" value="{{ old('tmpt_lahir', ucwords($mahasiswa->tmpt_lahir)) }}" name="tmpt_lahir" autocomplete="off" />
                <x-form.validation-message name="tmpt_lahir" />
              </div>
              {{-- End Tempat Lahir --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Tanggal Lahir') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir', $mahasiswa->tgl_lahir) }}" name="tgl_lahir" autocomplete="off" />
                <x-form.validation-message name="tgl_lahir" />
              </div>
              {{-- End Tanggal Lahir --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Alamat Lengkap') }}" />
              </div>
              <div class="col-md-8 form-group">
                <textarea class="form-control @error('alamat') is-invalid @enderror" rows="3" name="alamat">{{ old('alamat', ucwords($mahasiswa->alamat)) }}</textarea>
                <x-form.validation-message name="alamat" />
              </div>
              {{-- End Alamat Lengkap --}}

              <div class="col-sm-12 mt-2 d-flex justify-content-end">
                <x-form.button type="submit">Update Data</x-form.button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

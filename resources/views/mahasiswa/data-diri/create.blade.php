<x-app-layout>
  <x-slot name="name">Tambah Data Diri Mahasiswa</x-slot>

  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <form class="form form-horizontal" method="POST" action="{{ route('data-diri.store') }}">
          @csrf
          <div class="form-body">
            <p class="fw-bold mb-5">*Silahkan isi data diri dengan benar.</p>
            <div class="row">
              <div class="col-md-4">
                <x-form.label value="{{ __('NIM Mahasiswa') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control @error('nim') is-invalid @enderror" value="{{ ucwords($nim) }}" name="nim" onfocus readonly />

                <x-form.validation-message name="nim" />
              </div>
              {{-- End NIM --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Nama Mahasiswa') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ ucwords($nama) }}" name="nama" {{ ($nama) ? 'readonly' : '' }} />
                <x-form.validation-message name="nama" />
              </div>
              {{-- End Nama --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Nomor HP') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" name="no_hp" autocomplete="off" />
                <x-form.validation-message name="no_hp" />
              </div>
              {{-- End Nomor HP --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Tempat Lahir') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control @error('tmpt_lahir') is-invalid @enderror" value="{{ old('tmpt_lahir') }}" name="tmpt_lahir" autocomplete="off" />
                <x-form.validation-message name="tmpt_lahir" />
              </div>
              {{-- End Tempat Lahir --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Tanggal Lahir') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}" name="tgl_lahir" autocomplete="off" />
                <x-form.validation-message name="tgl_lahir" />
              </div>
              {{-- End Tanggal Lahir --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Alamat Lengkap') }}" />
              </div>
              <div class="col-md-8 form-group">
                <textarea class="form-control @error('alamat') is-invalid @enderror" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                <x-form.validation-message name="alamat" />
              </div>
              {{-- End Alamat Lengkap --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Pembimbing Utama') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control @error('pem_utama') is-invalid @enderror" value="{{ old('pem_utama') }}" name="pem_utama" autocomplete="off" />
                <x-form.validation-message name="pem_utama" />
              </div>
              {{-- End Pembimbing Utama --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Pembimbing Pendamping') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control @error('pem_pendamping') is-invalid @enderror" value="{{ old('pem_pendamping') }}" name="pem_pendamping" autocomplete="off" />
                <x-form.validation-message name="pem_pendamping" />
              </div>
              {{-- End Pembimbing Pendamping --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Judul Tugas Akhir') }}" />
              </div>
              <div class="col-md-8 form-group">
                <textarea class="form-control @error('judul_ta') is-invalid @enderror" rows="3" name="judul_ta">{{ old('judul_ta') }}</textarea>
                <x-form.validation-message name="judul_ta" />
              </div>
              {{-- End Judul Tugas Akhir --}}

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

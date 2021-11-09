<x-app-layout>
  <x-slot name="name">Edit Pendaftaran Seminar Hasil</x-slot>

  <div class="card">
    <div class="card-content">
      <div class="card-body">

        <div class="row mb-4">
          <div class="col-12">
            <p class="fw-bold text-uppercase">Data Diri Mahasiswa</p>
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('NIM Mahasiswa') }}" />
            <input class="form-control fw-bold text-light" value="{{ $seminar->mahasiswa->nim }}" readonly disabled />
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('Nama Mahasiswa') }}" />
            <input class="form-control fw-bold text-light" value="{{ ucwords($seminar->mahasiswa->nama) }}" readonly disabled />
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('Tempat, Tanggal Lahir') }}" />
            <input class="form-control fw-bold text-light" value="{{ ucwords($seminar->mahasiswa->tmpt_lahir). ', ' . date('d M Y', strtotime($seminar->mahasiswa->tgl_lahir)) }}" readonly disabled />
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('Nomor HP') }}" />
            <input class="form-control fw-bold text-light" value="{{ ucwords($seminar->mahasiswa->no_hp) }}" readonly disabled />
          </div>
          <div class="col-sm-12 my-1">
            <x-form.label value="{{ __('Alamat') }}" />
            <textarea class="form-control fw-bold text-light" rows="2" readonly disabled>{{ ucwords($seminar->mahasiswa->alamat) }}</textarea>
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('Pembimbing Utama') }}" />
            <input class="form-control fw-bold text-light" value="{{ ucwords($seminar->mahasiswa->pem_utama) }}" readonly disabled />
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('Pembimbing Pendamping') }}" />
            <input class="form-control fw-bold text-light" value="{{ ucwords($seminar->mahasiswa->pem_pendamping) }}" readonly disabled />
          </div>
          <div class="col-sm-12 my-1">
            <x-form.label value="{{ __('Judul Tugas Akhir') }}" />
            <textarea class="form-control fw-bold text-light" rows="2" readonly disabled>{{ ucwords($seminar->mahasiswa->judul_ta) }}</textarea>
          </div>
        </div>

        <hr>

        <form class="form form-horizontal" method="POST" action="{{ route('seminar-hasil.update', $seminar->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-body">
            <div class="row">
              <div class="col-12">
                <p class="fw-bold text-uppercase mb-4">Upload File Seminar Hasil</p>
              </div>
              <div class="col-md-5 d-flex align-items-center">
                <x-form.label value="{{ __('KRS, 2 Semester Sebelumnya') }}" />
              </div>
              <div class="col-md-7 form-group my-3">
                <a href="{{ Storage::url($seminar->krs) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('krs') is-invalid @enderror" name="krs" value="{{ old('krs') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="krs" />
              </div>
              {{-- End KRS --}}

              <div class="col-md-5 d-flex align-items-center">
                <x-form.label value="{{ __('Transkip Nilai') }}" />
              </div>
              <div class="col-md-7 form-group my-3">
                <a href="{{ Storage::url($seminar->transkip_nilai) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('transkip_nilai') is-invalid @enderror" name="transkip_nilai" value="{{ old('transkip_nilai') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="transkip_nilai" />
              </div>
              {{-- End Transkip Nilai --}}

              <div class="col-md-5 d-flex align-items-center">
                <x-form.label value="{{ __('Bukti Penyerahan Laporan Kerja Praktek') }}" />
              </div>
              <div class="col-md-7 form-group my-3">
                <a href="{{ Storage::url($seminar->laporan_kp) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-images text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('laporan_kp') is-invalid @enderror" name="laporan_kp" value="{{ old('laporan_kp') }}" />
                <div class="form-text">* Upload file GAMBAR maksimal 1MB.</div>
                <x-form.validation-message name="laporan_kp" />
              </div>
              {{-- End Kerja Praktek --}}

              <div class="col-md-5 d-flex align-items-center">
                <x-form.label value="{{ __('Foto Copy Kartu Kuning / Surat Keterangan BAUK (Keterangan Pembayaran Tugas Akhir Min 50%)') }}" />
              </div>
              <div class="col-md-7 form-group my-3">
                <a href="{{ Storage::url($seminar->keuangan) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-images text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('keuangan') is-invalid @enderror" name="keuangan" value="{{ old('keuangan') }}" />
                <div class="form-text">* Upload file GAMBAR maksimal 1MB.</div>
                <x-form.validation-message name="keuangan" />
              </div>
              {{-- End Kartu Kuning / BAUK --}}

              <div class="col-md-5 d-flex align-items-center">
                <x-form.label value="{{ __('Lembar Aktifitas Tugas Akhir / Lembar Konsultasi') }}" />
              </div>
              <div class="col-md-7 form-group my-3">
                <a href="{{ Storage::url($seminar->konsultasi) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-images text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('konsultasi') is-invalid @enderror" name="konsultasi" value="{{ old('konsultasi') }}" />
                <div class="form-text">* Upload file GAMBAR maksimal 1MB.</div>
                <x-form.validation-message name="konsultasi" />
              </div>
              {{-- End Aktivitas Tugas Akhir / Lembar Konsultasi --}}

              <div class="col-sm-12 mt-2 d-flex justify-content-end">
                <x-form.button type="submit">Update Data</x-form.button>
              </div> <!-- End Button -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

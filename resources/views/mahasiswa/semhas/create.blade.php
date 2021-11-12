<x-app-layout>
  <x-slot name="name">Pendaftaran Seminar Hasil</x-slot>

  <div class="card">
    <div class="card-content">
      <div class="card-body">

        <div class="row mb-4">
          <div class="col-12">
            <p class="fw-bold text-uppercase">Data Diri Mahasiswa</p>
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('NIM Mahasiswa') }}" />
            <input class="form-control fw-bold text-light" value="{{ $mahasiswa->nim }}" required readonly disabled />
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('Nama Mahasiswa') }}" />
            <input class="form-control fw-bold text-light" value="{{ ucwords($mahasiswa->nama) }}" required readonly disabled />
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('Tempat, Tanggal Lahir') }}" />
            <input class="form-control fw-bold text-light" value="{{ ucwords($mahasiswa->tmpt_lahir). ', ' . date('d M Y', strtotime($mahasiswa->tgl_lahir)) }}" required readonly disabled />
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('Nomor HP') }}" />
            <input class="form-control fw-bold text-light" value="{{ ucwords($mahasiswa->no_hp) }}" required readonly disabled />
          </div>
          <div class="col-sm-12 my-1">
            <x-form.label value="{{ __('Alamat') }}" />
            <textarea class="form-control fw-bold text-light" rows="2" required readonly disabled>{{ ucwords($mahasiswa->alamat) }}</textarea>
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('Pembimbing Utama') }}" />
            <input class="form-control fw-bold text-light" value="{{ ucwords($mahasiswa->proposal->dosen1->nama) }}" required readonly disabled />
          </div>
          <div class="col-sm-6 my-1">
            <x-form.label value="{{ __('Pembimbing Pendamping') }}" />
            <input class="form-control fw-bold text-light" value="{{ ucwords($mahasiswa->proposal->dosen2->nama) }}" required readonly disabled />

          </div>
          <div class="col-sm-12 my-1">
            <x-form.label value="{{ __('Judul Tugas Akhir') }}" />
            <textarea class="form-control fw-bold text-light" rows="2" required readonly disabled>{{ ucwords($mahasiswa->proposal->judul_ta) }}</textarea>

          </div>
        </div>

        <hr>

        <form class="form form-horizontal" method="POST" action="{{ route('seminar-hasil.store') }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="mahasiswa_nim" value="{{ $mahasiswa->nim }}">
          <div class="form-body">
            <div class="row">
              <div class="col-12">
                <p class="fw-bold text-uppercase mb-4">Upload File Seminar Hasil</p>
              </div>
              <div class="col-md-5">
                <x-form.label value="{{ __('KRS, 2 Semester Sebelumnya') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('krs') is-invalid @enderror" name="krs" value="{{ old('krs') }}" required />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="krs" />
              </div>
              {{-- End KRS --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Transkip Nilai') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('transkip_nilai') is-invalid @enderror" name="transkip_nilai" value="{{ old('transkip_nilai') }}" required />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="transkip_nilai" />
              </div>
              {{-- End Transkip Nilai --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Bukti Penyerahan Laporan Kerja Praktek') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('laporan_kp') is-invalid @enderror" name="laporan_kp" value="{{ old('laporan_kp') }}" required />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="laporan_kp" />
              </div>
              {{-- End Kerja Praktek --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Foto Copy Kartu Kuning / Surat Keterangan BAUK (Keterangan Pembayaran Tugas Akhir Min 50%)') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('keuangan') is-invalid @enderror" name="keuangan" value="{{ old('keuangan') }}" required />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="keuangan" />
              </div>
              {{-- End Kartu Kuning / BAUK --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Lembar Aktifitas Tugas Akhir / Lembar Konsultasi') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('konsultasi') is-invalid @enderror" name="konsultasi" value="{{ old('konsultasi') }}" required />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="konsultasi" />
              </div>
              {{-- End Aktivitas Tugas Akhir / Lembar Konsultasi --}}

              <div class="col-sm-12 mt-2 d-flex justify-content-end">
                <x-form.button type="submit">Submit Data</x-form.button>
              </div> <!-- End Button -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

<x-app-layout>
  <x-slot name="name">Pendaftaran Pendadaran</x-slot>

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

        <form class="form form-horizontal" method="POST" action="{{ route('pendadaran.store') }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="mahasiswa_nim" value="{!! $mahasiswa->nim !!}">
          <div class="form-body">
            <div class="row ">
              <div class="col-12">
                <p class="fw-bold text-uppercase mb-4">Upload File Pendadaran</p>
              </div>
              <div class="col-md-5">
                <x-form.label value="{{ __('KRS, 2 Semester Sebelumnya') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('krs') is-invalid @enderror" name="krs" value="{{ old('krs') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="krs" />
              </div>
              {{-- End KRS --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Transkip Nilai') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('transkip_nilai') is-invalid @enderror" name="transkip_nilai" value="{{ old('transkip_nilai') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="transkip_nilai" />
              </div>
              {{-- End Transkip Nilai --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Lembar Aktifitas Tugas Akhir') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('konsultasi') is-invalid @enderror" name="konsultasi" value="{{ old('konsultasi') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="konsultasi" />
              </div>
              {{-- End Lembar Aktifitas Tugas Akhir --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Surat Keterangan Bebas Perkuliahan dari BAAK') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('perkuliahan') is-invalid @enderror" name="perkuliahan" value="{{ old('perkuliahan') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="perkuliahan" />
              </div>
              {{-- End Surat Keterangan Bebas Perkuliahan dari BAAK --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Surat Keterangan Bebas Keuangan dari BAUK') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('keuangan') is-invalid @enderror" name="keuangan" value="{{ old('keuangan') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="keuangan" />
              </div>
              {{-- End Surat Keterangan Bebas Keuangan dari BAUK --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Surat Keterangan Bebas Perpustakaan') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('perpustakaan') is-invalid @enderror" name="perpustakaan" value="{{ old('perpustakaan') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="perpustakaan" />
              </div>
              {{-- End Surat Keterangan Bebas Perpustakaan --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Surat Keterangan Bebas Laboratorium') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('laboratorium') is-invalid @enderror" name="laboratorium" value="{{ old('laboratorium') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="laboratorium" />
              </div>
              {{-- End Surat Keterangan Bebas Laboratorium --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Sertifikat Action Program') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('action') is-invalid @enderror" name="action" value="{{ old('action') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="action" />
              </div>
              {{-- End Sertifikat Action Program --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Sertifikat Kompetensi Laboratorium') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('kompetensi') is-invalid @enderror" name="kompetensi" value="{{ old('kompetensi') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="kompetensi" />
              </div>
              {{-- End Sertifikat Kompetensi Laboratorium --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Sertifikat TOEFL') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('toefl') is-invalid @enderror" name="toefl" value="{{ old('toefl') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="toefl" />
              </div>
              {{-- End Sertifikat TOEFL --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Fotocopy ijazah terakhir') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('ijazah') is-invalid @enderror" name="ijazah" value="{{ old('ijazah') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="ijazah" />
              </div>
              {{-- End Fotocopy ijazah terakhir --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Fotocopy KTP') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp" value="{{ old('ktp') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="ktp" />
              </div>
              {{-- End Fotocopy KTP --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Fotocopy Akte Kelahiran') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('akte') is-invalid @enderror" name="akte" value="{{ old('akte') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="akte" />
              </div>
              {{-- End Fotocopy Akte Kelahiran --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Foto 3 x 4 berwarna (cetak dan softcopy), latar belakang merah, pakaian kemeja putih dan jas berwarna hitam (pria memakai dasi)') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" />
                <div class="form-text">* Upload file FOTO / GAMBAR maksimal 1MB.</div>
                <x-form.validation-message name="foto" />
              </div>
              {{-- End Foto 3 x 4 berwarna (cetak dan softcopy), latar belakang merah, pakaian kemeja putih dan jas berwarna hitam (pria memakai dasi) --}}

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

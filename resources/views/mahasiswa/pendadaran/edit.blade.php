<x-app-layout>
  {{-- <x-app.title name="Pendaftaran Seminar Hasil" /> --}}
  <x-slot name="name">Edit Pendaftaran Pendadaran</x-slot>

  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <form class="form form-horizontal" method="POST" action="{{ route('pendadaran.update', $pendadaran->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-body">
            <div class="row">
              <div class="col-md-5">
                <x-form.label value="{{ __('NIM') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" autofocus value="{{ $pendadaran->mahasiswa->nim }}" readonly />
                <x-form.validation-message name="nim" />
              </div>
              {{-- End NIM --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Nama Lengkap') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ ucwords($pendadaran->mahasiswa->nama) }}" readonly />
                <x-form.validation-message name="nama" />
              </div>
              {{-- End Nama --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Tempat Lahir') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="text" class="form-control @error('tmpt_lahir') is-invalid @enderror" name="tmpt_lahir" value="{{ old('tmpt_lahir', ucwords($pendadaran->mahasiswa->tmpt_lahir)) }}" readonly />
                <x-form.validation-message name="tmpt_lahir" />
              </div>
              {{-- End Tempat Lahir --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Tanggal Lahir') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir', $pendadaran->mahasiswa->tgl_lahir) }}" readonly />
                <x-form.validation-message name="tgl_lahir" />
              </div>
              {{-- End Tanggal Lahir --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('No HP') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', $pendadaran->mahasiswa->no_hp) }}" readonly />
                <x-form.validation-message name="no_hp" />
              </div>
              {{-- End No HP --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Alamat di Bontang') }}" />
              </div>
              <div class="col-md-7 form-group">
                <textarea class="form-control @error('alamat') is-invalid @enderror" rows="3" name="alamat" readonly>{{ old('alamat', ucwords($pendadaran->mahasiswa->alamat)) }}</textarea>
                <x-form.validation-message name="alamat" />
              </div>
              {{-- End Alamat --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Nama Pembimbing Utama') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="text" class="form-control @error('pem_utama') is-invalid @enderror" name="pem_utama" value="{{ old('pem_utama', ucwords($pendadaran->mahasiswa->proposal->dosen1->nama)) }}" readonly />

                <x-form.validation-message name="pem_utama" />
              </div>
              {{-- End Pembimbing Utama --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Nama Pembimbing Pendamping') }}" />
              </div>
              <div class="col-md-7 form-group">
                <input type="text" class="form-control @error('pem_pendamping') is-invalid @enderror" name="pem_pendamping" value="{{ old('pem_pendamping', ucwords($pendadaran->mahasiswa->proposal->dosen2->nama)) }}" readonly />
                <x-form.validation-message name="pem_pendamping" />
              </div>
              {{-- End Pembimbing Pendamping --}}
              <hr class="my-3">
              <div class="col-md-5">
                <x-form.label value="{{ __('KRS, 2 Semester Sebelumnya') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->krs) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('krs') is-invalid @enderror" name="krs" value="{{ old('krs') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="krs" />
              </div>
              {{-- End KRS --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Transkip Nilai') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->transkip_nilai) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('transkip_nilai') is-invalid @enderror" name="transkip_nilai" value="{{ old('transkip_nilai') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="transkip_nilai" />
              </div>
              {{-- End Transkip Nilai --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Lembar Aktifitas Tugas Akhir') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->konsultasi) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('konsultasi') is-invalid @enderror" name="konsultasi" value="{{ old('konsultasi') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="konsultasi" />
              </div>
              {{-- End Lembar Aktifitas Tugas Akhir --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Surat Keterangan Bebas Perkuliahan dari BAAK') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->perkuliahan) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('perkuliahan') is-invalid @enderror" name="perkuliahan" value="{{ old('perkuliahan') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="perkuliahan" />
              </div>
              {{-- End Surat Keterangan Bebas Perkuliahan dari BAAK --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Surat Keterangan Bebas Keuangan dari BAUK') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->keuangan) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('keuangan') is-invalid @enderror" name="keuangan" value="{{ old('keuangan') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="keuangan" />
              </div>
              {{-- End Surat Keterangan Bebas Keuangan dari BAUK --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Surat Keterangan Bebas Perpustakaan') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->perpustakaan) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('perpustakaan') is-invalid @enderror" name="perpustakaan" value="{{ old('perpustakaan') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="perpustakaan" />
              </div>
              {{-- End Surat Keterangan Bebas Perpustakaan --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Surat Keterangan Bebas Laboratorium') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->laboratorium) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('laboratorium') is-invalid @enderror" name="laboratorium" value="{{ old('laboratorium') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="laboratorium" />
              </div>
              {{-- End Surat Keterangan Bebas Laboratorium --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Sertifikat Action Program') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->action) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('action') is-invalid @enderror" name="action" value="{{ old('action') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="action" />
              </div>
              {{-- End Sertifikat Action Program --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Sertifikat Kompetensi Laboratorium') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->kompetensi) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('kompetensi') is-invalid @enderror" name="kompetensi" value="{{ old('kompetensi') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="kompetensi" />
              </div>
              {{-- End Sertifikat Kompetensi Laboratorium --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Sertifikat TOEFL') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->toefl) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('toefl') is-invalid @enderror" name="toefl" value="{{ old('toefl') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="toefl" />
              </div>
              {{-- End Sertifikat TOEFL --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Fotocopy ijazah terakhir') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->ijazah) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('ijazah') is-invalid @enderror" name="ijazah" value="{{ old('ijazah') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="ijazah" />
              </div>
              {{-- End Fotocopy ijazah terakhir --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Fotocopy KTP') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->ktp) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp" value="{{ old('ktp') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="ktp" />
              </div>
              {{-- End Fotocopy KTP --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Fotocopy Akte Kelahiran') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->akte) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('akte') is-invalid @enderror" name="akte" value="{{ old('akte') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="akte" />
              </div>
              {{-- End Fotocopy Akte Kelahiran --}}

              <div class="col-md-5">
                <x-form.label value="{{ __('Foto 3 x 4 berwarna (cetak dan softcopy), latar belakang merah, pakaian kemeja putih dan jas berwarna hitam (pria memakai dasi)') }}" />
              </div>
              <div class="col-md-7 form-group">
                <a href="{{ Storage::url($pendadaran->foto) }}" target="_blank" rel="noopener noreferrer">
                  <small class="fw-bold"><i class="bi bi-card-text text-dark" style="font-size: 28px"></i></small>
                </a>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" />
                <div class="form-text">* Upload file FOTO / GAMBAR maksimal 1MB.</div>
                <x-form.validation-message name="foto" />
              </div>
              {{-- End Foto 3 x 4 berwarna (cetak dan softcopy), latar belakang merah, pakaian kemeja putih dan jas berwarna hitam (pria memakai dasi) --}}
              <hr class="my-3">
              <div class="col-12">
                <div class="form-group">
                  <x-form.label value="{{ __('Judul Tas Akhir') }}" />
                  <textarea class="form-control @error('judul_ta') is-invalid @enderror" rows="3" name="judul_ta" readonly>{{ old('judul_ta', ucwords($pendadaran->mahasiswa->proposal->judul_ta)) }}</textarea>

                  <x-form.validation-message name="judul_ta" />
                </div>
              </div>
              {{-- End Judul TA --}}

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

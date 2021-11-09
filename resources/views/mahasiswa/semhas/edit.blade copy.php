<x-app-layout>
    <x-slot name="name">Edit Pendaftaran Seminar Hasil</x-slot>

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('seminar-hasil.update', $mahasiswa->nim) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('NIM') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" required autofocus value="{{ $mahasiswa->nim }}" readonly />

                                <x-form.validation-message name="nim" />
                            </div>
                            {{-- End NIM --}}

                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('Nama Lengkap') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ ucwords($mahasiswa->nama) }}" required readonly />
                                <x-form.validation-message name="nama" />
                            </div>
                            {{-- End Nama --}}

                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('Tempat Lahir') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <input type="text" class="form-control @error('tmpt_lahir') is-invalid @enderror" name="tmpt_lahir" value="{{ old('tmpt_lahir', ucwords($mahasiswa->tmpt_lahir)) }}" required />
                                <x-form.validation-message name="tmpt_lahir" />
                            </div>
                            {{-- End Tempat Lahir --}}

                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('Tanggal Lahir') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir', $mahasiswa->tgl_lahir) }}" required />
                                <x-form.validation-message name="tgl_lahir" />
                            </div>
                            {{-- End Tanggal Lahir --}}

                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('No HP') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}" required />
                                <x-form.validation-message name="no_hp" />
                            </div>
                            {{-- End No HP --}}

                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('Alamat di Bontang') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" rows="3" name="alamat" required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                                <x-form.validation-message name="alamat" />
                            </div>
                            {{-- End Alamat --}}

                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('Nama Pembimbing Utama') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <input type="text" class="form-control @error('pem_utama') is-invalid @enderror" name="pem_utama" value="{{ old('pem_utama', $mahasiswa->pem_utama) }}" required />
                                <x-form.validation-message name="pem_utama" />
                            </div>
                            {{-- End Pembimbing Utama --}}

                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('Nama Pembimbing Pendamping') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <input type="text" class="form-control @error('pem_pendamping') is-invalid @enderror" name="pem_pendamping" value="{{ old('pem_pendamping', $mahasiswa->pem_pendamping) }}" required />
                                <x-form.validation-message name="pem_pendamping" />
                            </div>
                            {{-- End Pembimbing Pendamping --}}


                            <hr class="mt-3">
                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('KRS, 2 Semester Sebelumnya') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <a href="{{ Storage::url($mahasiswa->seminar->krs) }}" target="_blank" rel="noopener noreferrer">
                                    <small class="fw-bold"><u>{{ $mahasiswa->seminar->krs }}</u></small>
                                </a>
                                <input type="file" class="form-control @error('krs') is-invalid @enderror" name="krs" value="{{ old('krs') }}" />
                                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                                <x-form.validation-message name="krs" />
                            </div>
                            {{-- End KRS --}}

                            <hr>
                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('Transkip Nilai') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <a href="{{ Storage::url($mahasiswa->seminar->transkip_nilai) }}" target="_blank" rel="noopener noreferrer">
                                    <small class="fw-bold"><u>{{ $mahasiswa->seminar->transkip_nilai }}</u></small>
                                </a>
                                <input type="file" class="form-control @error('transkip_nilai') is-invalid @enderror" name="transkip_nilai" value="{{ old('transkip_nilai') }}" />
                                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                                <x-form.validation-message name="transkip_nilai" />
                            </div>
                            {{-- End Transkip Nilai --}}

                            <hr>
                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('Bukti Penyerahan Laporan Kerja Praktek') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <a href="{{ Storage::url($mahasiswa->seminar->laporan_kp) }}" target="_blank" rel="noopener noreferrer">
                                    <small class="fw-bold"><u>{{ $mahasiswa->seminar->laporan_kp }}</u></small>
                                </a>
                                <input type="file" class="form-control @error('laporan_kp') is-invalid @enderror" name="laporan_kp" value="{{ old('laporan_kp') }}" />
                                <div class="form-text">* Upload file GAMBAR maksimal 1MB.</div>
                                <x-form.validation-message name="laporan_kp" />
                            </div>
                            {{-- End Kerja Praktek --}}

                            <hr>
                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('Foto Copy Kartu Kuning / Surat Keterangan BAUK (Keterangan Pembayaran Tugas Akhir Min 50%)') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <a href="{{ Storage::url($mahasiswa->seminar->keuangan) }}" target="_blank" rel="noopener noreferrer">
                                    <small class="fw-bold"><u>{{ $mahasiswa->seminar->keuangan }}</u></small>
                                </a>
                                <input type="file" class="form-control @error('keuangan') is-invalid @enderror" name="keuangan" value="{{ old('keuangan') }}" />
                                <div class="form-text">* Upload file GAMBAR maksimal 1MB.</div>
                                <x-form.validation-message name="keuangan" />
                            </div>
                            {{-- End Kartu Kuning / BAUK --}}

                            <hr>
                            <div class="col-md-5 d-flex align-items-center">
                                <x-form.label value="{{ __('Lembar Aktifitas Tugas Akhir / Lembar Konsultasi') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <a href="{{ Storage::url( $mahasiswa->seminar->konsultasi) }}" target="_blank" rel="noopener noreferrer">
                                    <small class="fw-bold"><u>{{ $mahasiswa->seminar->konsultasi }}</u></small>
                                </a>
                                <input type="file" class="form-control @error('konsultasi') is-invalid @enderror" name="konsultasi" value="{{ old('konsultasi') }}" />
                                <div class="form-text">* Upload file GAMBAR maksimal 1MB.</div>
                                <x-form.validation-message name="konsultasi" />
                            </div>
                            {{-- End Aktivitas Tugas Akhir / Lembar Konsultasi --}}

                            <div class="col-12">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Judul Tas Akhir') }}" />
                                    <textarea class="form-control @error('judul_ta') is-invalid @enderror" rows="3" name="judul_ta" required>{{ $mahasiswa->judul_ta }}</textarea>
                                    <x-form.validation-message name="judul_ta" />
                                </div>
                            </div>
                            {{-- End Judul TA --}}

                            <div class="col-sm-12 mt-2 d-flex justify-content-end">
                                <x-form.button type="submit">Simpan Data</x-form.button>
                            </div> <!-- End Button -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
  <x-slot name="name">Pendaftaran Proposal Tugas Akhir</x-slot>

  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <form class="form form-horizontal" method="POST" action="{{ route('proposal.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-body">
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
                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ ucwords($mahasiswa->nama) }}" name="nama" required autocomplete="off" readonly />

                <x-form.validation-message name="nama" />
              </div>
              {{-- End Nama --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Nomor HP') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" value="{{ ucwords($mahasiswa->no_hp) }}" name="no_hp" autocomplete="off" readonly />
                <x-form.validation-message name="no_hp" />
              </div>
              {{-- End Nomor HP --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Tempat Lahir') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control @error('tmpt_lahir') is-invalid @enderror" value="{{ ucwords($mahasiswa->tmpt_lahir)}}" name="tmpt_lahir" autocomplete="off" readonly />
                <x-form.validation-message name="tmpt_lahir" />
              </div>
              {{-- End Tempat Lahir --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Tanggal Lahir') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ ucwords($mahasiswa->tgl_lahir) }}" name="tgl_lahir" autocomplete="off" readonly />
                <x-form.validation-message name="tgl_lahir" />
              </div>
              {{-- End Tanggal Lahir --}}

              <div class="col-md-4">
                <x-form.label value="{{ __('Alamat Lengkap') }}" />
              </div>
              <div class="col-md-8 form-group">
                <textarea class="form-control @error('alamat') is-invalid @enderror" rows="3" name="alamat" readonly>{{ ucwords($mahasiswa->alamat) }}</textarea>
                <x-form.validation-message name="alamat" />
              </div>
              {{-- End Alamat Lengkap --}}

              <hr class="my-3">

              <p>*Silahkan upload proposal tugas akhir. Maksimal mengajukan 3 judul untuk proposal tugas akhir.</p>

              <div class="col-md-4">
                <x-form.label value="{{ __('Proposal 1') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="file" class="form-control @error('file1') is-invalid @enderror" name="file1" value="{{ old('file1') }}" required />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="file1" />
              </div>

              <div class="col-md-4">
                <x-form.label value="{{ __('Proposal 2') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="file" class="form-control @error('file2') is-invalid @enderror" name="file2" value="{{ old('file2') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="file2" />
              </div>

              <div class="col-md-4">
                <x-form.label value="{{ __('Proposal 3') }}" />
              </div>
              <div class="col-md-8 form-group">
                <input type="file" class="form-control @error('file3') is-invalid @enderror" name="file3" value="{{ old('file3') }}" />
                <div class="form-text">* Upload file PDF maksimal 1MB.</div>
                <x-form.validation-message name="file3" />
              </div>


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

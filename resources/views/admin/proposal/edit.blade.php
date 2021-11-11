<x-app-layout>
    <x-slot name="name">Pendaftaram Pendadaran</x-slot>

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('data-proposal.update', $pro->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-5">
                                <x-form.label value="{{ __('Pembimbing Utama') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <fieldset class="form-group">
                                    <select class="form-select @error('dosen1') is-invalid @enderror" name="dosen1">
                                        <option>Pilih Dosen ...</option>
                                        <option value="terima">Dosen 1</option>
                                        <option value="tolak">Dosen 2</option>
                                    </select>
                                </fieldset>
                                <x-form.validation-message name="status" />
                            </div>
                            {{-- End Status --}}

                            <div class="col-md-5">
                                <x-form.label value="{{ __('Pembimbing Pendamping') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <fieldset class="form-group">
                                    <select class="form-select @error('dosen2') is-invalid @enderror" name="dosen2">
                                        <option>Pilih Dosen ...</option>
                                        <option value="terima">Dosen 1</option>
                                        <option value="tolak">Dosen 2</option>
                                    </select>
                                </fieldset>
                                <x-form.validation-message name="status" />
                            </div>
                            {{-- End Status --}}

                            <div class="col-md-5">
                                <x-form.label value="{{ __('Status') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <fieldset class="form-group">
                                    <select class="form-select @error('status') is-invalid @enderror" name="status">
                                        <option>Pilih Status ...</option>
                                        <option value="terima">Diterima</option>
                                        <option value="tolak">Ditolak</option>
                                    </select>
                                </fieldset>
                                <x-form.validation-message name="status" />
                            </div>
                            {{-- End Status --}}

                            <div class="col-md-5">
                                <x-form.label value="{{ __('Keterangan') }}" />
                            </div>
                            <div class="col-md-7 form-group">
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" rows="3"
                                    name="keterangan">{{ old('keterangan') }}</textarea>
                                <div class="form-text"><small>* Silahkan Isi Keterangan Jika Ditolak.</small></div>
                                <x-form.validation-message name="keterangan" />
                            </div>
                            {{-- End Keterangan --}}

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

<x-app-layout>
    <x-slot name="name">Dashboard</x-slot>

    <div class="row">
        <div class="col-12 col-lg-4">
            <a href="{{ route('dosen-bimbingan.index') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-bold">Mhs. Bimbingan</h6>
                        </div>
                        <h3 class="mt-3">{{ $pro }} <span class="text-sm" style="color: #c2c2c2; font-size: 12px">Mahasiswa</span></h3>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Mhs. Seminar Hasil</h6>
                    </div>
                    <h3 class="mt-3">{{ $seminar }} <span class="text-sm" style="color: #c2c2c2; font-size: 12px">Diterima</span></h3>

                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Mhs. Pendadaran</h6>
                    </div>
                    <h3 class="mt-3">{{ $pendadaran }} <span class="text-sm" style="color: #c2c2c2; font-size: 12px">Diterima</span></h3>

                </div>
            </div>
        </div>

    </div>

    @push('script')

    @endpush
</x-app-layout>

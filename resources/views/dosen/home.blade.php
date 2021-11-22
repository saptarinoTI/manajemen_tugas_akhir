<x-app-layout>
    <x-slot name="name">Dashboard</x-slot>

    <div class="row">
        <div class="col-12 col-lg-4">
            <a href="{{ route('dosen-bimbingan.index') }}">
                <div class="card bg-secondary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-bold text-white" style="letter-spacing: .1rem">Mhs. Bimbingan</h6>
                        </div>
                        <h4 class="mt-2 fw-bold text-white">{{ $pro }}<span class="text-sm fw-normal"
                                style="color: #e8e8e8; font-size: 12px; letter-spacing: .07rem"> Mahasiswa</span></h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold text-white" style="letter-spacing: .1rem">Pen. Utama</h6>
                    </div>
                    <h4 class="mt-2 fw-bold text-white">{{ $utama }}<span class="text-sm fw-normal"
                            style="color: #e8e8e8; font-size: 12px; letter-spacing: .07rem"> Mahasiswa</span></h4>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card bg-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold text-white" style="letter-spacing: .1rem">Pem. Pendamping</h6>
                    </div>
                    <h4 class="mt-2 fw-bold text-white">{{ $pendamping }}<span class="text-sm fw-normal"
                            style="color: #e8e8e8; font-size: 12px; letter-spacing: .07rem"> Mahasiswa</span></h4>
                </div>
            </div>
        </div>

    </div>

    @push('script')

    @endpush
</x-app-layout>

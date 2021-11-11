<x-app-layout>
    <x-slot name="name">Dashboard</x-slot>
    <x-slot name="description">Deskripsi Dashboard</x-slot>

    @hasrole('mahasiswa')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5>Informasi Tugas Akhir</h5>
                    <ul>
                        <li>
                            <p>Untuk informasi lebih lengkap dari tugas akhir bisa klik <a
                                    href="https://www.proditi.stitek.ac.id/halaman/detail/informasi-tugas-akhir"
                                    target="_blank" rel="noopener    noreferrer">disini.</a></p>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="mb-4 mt-2">
            {{-- Seminar Hasil --}}
            <div class="row">
                <div class="col">
                    <h5>Seminar Hasil</h5>
                    <p>Mendaftarkan diri dalam Seminar Hasil TA dengan menyerahakan syarat-syarat sebagai berikut:</p>
                    <ol>
                        <li>Naskah TA yang sudah ditanda* tangani oleh pembimbing sebanyak 1 rangkap asli + 3 rangkap
                            fotocopy.</li>
                        <li>Kartu Rencana Studi</li>
                        <li>Transkip Nilai</li>
                        <li>Bukti Penyerahan Laporan Kerja Praktek</li>
                        <li>Foto Copy Kartu Kuning / Surat Keterangan Keuangan Dari BAUK ( Dengan Keterangan Pembayaran
                            Tugas Akhir Minimal 50%)</li>
                        <li>Menunjukan Lembar Aktifitas Tugas Akhir / Lembar Konsultasi</li>
                    </ol>
                </div>
            </div>
            <hr class="mb-4 mt-2">
            {{-- Pendadaran --}}
            <div class="row">
                <div class="col">
                    <h5>Pendadaran Tugas Akhir</h5>
                    <p>Mendaftarkan diri dalam Sidang Ujian TA dengan menyerahakan syarat-syarat sebagai berikut:</p>
                    <ol>
                        <li>Naskah Tugas Akhir sebanyak 4 rangkap (1 rangkap asli)</li>
                        <li>Kartu Rencana Studi</li>
                        <li>Transkip Nilai</li>
                        <li>Lembar Aktifitas Tugas Akhir</li>
                        <li>Surat Keterangan Bebas Perkuliahan dari BAAK</li>
                        <li>Surat Keterangan Bebas Keuangan dari BAUK</li>
                        <li>Surat Keterangan Bebas Perpustakaan</li>
                        <li>Surat Keterangan Bebas Laboratorium</li>
                        <li>Sertifikat Action Program</li>
                        <li>Sertifikat Kompetensi Laboratorium</li>
                        <li>Sertifikat TOEFL</li>
                        <li>Fotocopy ijazah terakhir</li>
                        <li>Fotocopy ijazah terakhir</li>
                        <li>Foto 3 x 4 berwarna (cetak dan softcopy), latar belakang merah, pakaian kemeja putih dan jas
                            berwarna hitam (pria memakai dasi)</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @endhasrole

    @hasrole('superadmin|admin|staff|laboratorium')
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Total Mahasiswa</h6>
                        <span style="color: #c2c2c2; font-size: 12px">Update : {{ date('d M Y',
                            strtotime((string)$updateMhs->updated_at)) }}</span>
                    </div>
                    <h3 class="mt-3">{{ $mahasiswa }} <span class="text-sm"
                            style="color: #c2c2c2; font-size: 12px">Orang</span></h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Seminar Hasil Sukses</h6>
                        @if ($seminar != 0)
                        <span style="color: #c2c2c2; font-size: 12px">Update : {{ date('d M Y',
                            strtotime((string)$updateSmnr->updated_at)) }}</span>
                        @else
                        <strong>-</strong>
                        @endif
                    </div>
                    <h3 class="mt-3">{{ $seminar }} <span class="text-sm"
                            style="color: #c2c2c2; font-size: 12px">Diterima</span></h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold">Pendadaran Sukses</h6>
                        @if ($pendadaran != 0)
                        <span style="color: #c2c2c2; font-size: 12px">Update : {{ date('d M Y',
                            strtotime((string)$updatePddrn->updated_at)) }}</span>
                        @else
                        <strong>-</strong>
                        @endif
                    </div>
                    <h3 class="mt-3">{{ $pendadaran }} <span class="text-sm"
                            style="color: #c2c2c2; font-size: 12px">Diterima</span></h3>
                    {{-- <span>{{ date('Y m d', strtotime('+5 years')) }}</span> --}}
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="ol">
            <div class="card">
                <canvas id="canvas" height="280" width="700"></canvas>
            </div>
        </div>
        @endhasrole

        @push('script')
        <script>
            var label = {!! $label !!};
            var user = {!! $user !!};
            var barChartData = {
                labels: label,
                datasets: [{
                    label: "Lulus",
                    backgroundColor: "#A7E9AF",
                    data: user
                }]
            };

            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        elements: {
                            rectangle: {
                                borderWidth: 1,
                                borderColor: '#75B79E',
                                borderSkipped: 'bottom'
                            }
                        },
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Yearly User Joined'
                        }
                    }
                });
            };
        </script>
        @endpush

</x-app-layout>

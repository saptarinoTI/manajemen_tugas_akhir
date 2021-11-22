<div class="table-responsive-lg">
    <table class="table app-table-hover mb-0 text-left">
        <tr>
            <th class="col-4">NIM</th>
            <th>:</th>
            <td>{{ ucwords($pro->mahasiswa->nim) }}
            </td>
        </tr>

        <tr>
            <th class="col-4">Nama</th>
            <th>:</th>
            <td>{{ ucwords($pro->mahasiswa->nama) }}
            </td>
        </tr>

        <tr>
            <th class="col-4">Tempat Tanggal Lahir</th>
            <th>:</th>
            <td>{{ ucwords($pro->mahasiswa->tmpt_lahir) . ', ' . date('d F Y', strtotime($pro->mahasiswa->tgl_lahir)) }}
            </td>
        </tr>

        @if ($pro->mahasiswa->no_hp != null)
            <tr>
                <th class="col-4">Nomor HP</th>
                <th>:</th>
                <td>{{ $pro->mahasiswa->no_hp }}</td>
            </tr>
        @endif

        @if ($pro->mahasiswa->alamat != null)
            <tr>
                <th class="col-4">Alamat</th>
                <th>:</th>
                <td>{{ ucwords($pro->mahasiswa->alamat) }}</td>
            </tr>
        @endif

        @if ($pro->utama_id != null)
            <tr>
                <th class="col-4">Pembimbing Utama</th>
                <th>:</th>
                <td>{{ ucwords($pro->dosen1->nama) }}</td>
            </tr>
        @endif

        @if ($pro->pendamping_id != null)
            <tr>
                <th class="col-4">Pembimbing Pendamping</th>
                <th>:</th>
                <td>{{ ucwords($pro->dosen2->nama) }}</td>

            </tr>
        @endif

        @if ($pro->judul_ta != null)
            <tr>
                <th class="col-4">Judul Tugas Akhir</th>
                <th>:</th>
                <td>{{ ucwords($pro->judul_ta) }}</td>

            </tr>
        @endif

        @if ($pro->tgl_terima != null)
            <tr>
                <th class="col-4">Tgl. Terima</th>
                <th>:</th>
                <td>{{ date('d F Y', strtotime($pro->tgl_terima)) }}</td>

            </tr>
        @endif

        <tr>
            <th class="col-4">Status</th>
            <th>:</th>
            <td>
                @if ($pro->status == 'diterima')
                    <span class="badge bg-success">Diterima
                    @elseif ($pro->status == 'ditolak')
                        <span class="badge bg-danger">Ditolak
                        @else
                            <span class="badge bg-info">Dikirim
                @endif
                </span>
            </td>
        </tr>

        <tr>
            <th class="col-4">Keterangan</th>
            <th>:</th>
            <td>{{ ucwords($pro->keterangan) }}</td>
        </tr>

    </table>
</div>

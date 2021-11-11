<div class="table-responsive-lg">
    <table class="table app-table-hover mb-0 text-left">
        <tr>
            <th class="col-4">Tempat Tanggal Lahir</th>
            <th>:</th>
            <td>{{ ucwords($pro->mahasiswa->tmpt_lahir) . ', ' . date('d M Y', strtotime($pro->mahasiswa->tgl_lahir)) }}
            </td>
        </tr>

        <tr>
            <th class="col-4">Nomor HP</th>
            <th>:</th>
            <td>{{ $pro->mahasiswa->no_hp }}</td>
        </tr>

        <tr>
            <th class="col-4">Alamat</th>
            <th>:</th>
            <td>{{ ucwords($pro->mahasiswa->alamat) }}</td>
        </tr>

        <tr>
            <th class="col-4">Pengajuan Pembimbing Utama</th>
            <th>:</th>
            <td>{{ ucwords($pro->mahasiswa->pem_utama) }}</td>
        </tr>

        <tr>
            <th class="col-4">Pengajuan Pembimbing Pendamping</th>
            <th>:</th>
            <td>{{ ucwords($pro->mahasiswa->pem_pendamping) }}</td>
        </tr>

        <tr>
            <th class="col-4">File Proposal 1</th>
            <th>:</th>
            <td><a href="{{ Storage::url($pro->file1) }}" target="_blank" rel="noopener noreferrer"
                    class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
        </tr>

        @if ($pro->file2 != null)
        <tr>
            <th class="col-4">File Proposal 2</th>
            <th>:</th>
            <td><a href="{{ Storage::url($pro->file2) }}" target="_blank" rel="noopener noreferrer"
                    class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
        </tr>
        @endif

        @if ($pro->file3 != null)
        <tr>
            <th class="col-4">File Proposal 3</th>
            <th>:</th>
            <td><a href="{{ Storage::url($pro->file3) }}" target="_blank" rel="noopener noreferrer"
                    class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
        </tr>
        @endif

        <tr>
            <th class="col-4">Status</th>
            <th>:</th>
            <td>
                @if ($pro->status == 'terima')
                <span class="badge bg-success">Diterima
                    @elseif ($pro->status == 'tolak')
                    <span class="badge bg-danger">Ditolak
                        @else
                        <span class="badge bg-info">Validasi
                            @endif
                        </span>
            </td>
        </tr>

        <tr>
            <th class="col-4">Tgl. Submit</th>
            <th>:</th>
            <td>{{ date('d F Y', strtotime($pro->created_at)) }}</td>
        </tr>

        <tr>
            <th class="col-4">Tgl. Update</th>
            <th>:</th>
            <td>{{ date('d F Y', strtotime($pro->updated_at)) }}</td>
        </tr>

        <tr>
            <th class="col-4">Keterangan</th>
            <th>:</th>
            <td>{{ ucwords($pro->keterangan) }}</td>
        </tr>

    </table>
</div>
<div class="table-responsive-lg">
    <table class="table app-table-hover mb-0 text-left">
        <tr>
            <th class="col-4">NIM</th>
            <th>:</th>
            <td>{{ $mahasiswa->nim }}</td>
        </tr>

        <tr>
            <th class="col-4">Nama</th>
            <th>:</th>
            <td>{{ ucwords($mahasiswa->nama) }}</td>
        </tr>

        @if ($mahasiswa->no_hp)
            <tr>
                <th class="col-4">Nomor HP</th>
                <th>:</th>
                <td>{{ $mahasiswa->no_hp }}</td>
            </tr>
        @endif

        @if ($mahasiswa->alamat != null)
            <tr>
                <th class="col-4">Alamat</th>
                <th>:</th>
                <td>{{ ucwords($mahasiswa->alamat) }}</td>
            </tr>
        @endif

        <tr>
            <th class="col-4">Pembimbing Utama</th>
            <th>:</th>
            <td>{{ ucwords($mahasiswa->proposal->dosen1->nama) }}</td>
        </tr>

        <tr>
            <th class="col-4">Pembimbing Pendamping</th>
            <th>:</th>
            <td>{{ ucwords($mahasiswa->proposal->dosen2->nama) }}</td>
        </tr>

        <tr>
            <th class="col-4">Judul Tugas Akhir</th>
            <th>:</th>
            <td>{{ ucwords($mahasiswa->proposal->judul_ta) }}</td>
        </tr>
    </table>
</div>

<div class="table-responsive-lg">
  <table class="table app-table-hover mb-0 text-left">
    <tr>
      <th class="col-4">Tempat Tanggal Lahir</th>
      <th>:</th>
      <td>{{ ucwords($mahasiswa->tmpt_lahir) . ', ' . date('d F Y', strtotime($mahasiswa->tgl_lahir ))}}</td>
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

    <tr>
      <th class="col-4">KRS</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->seminar->krs) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Transkip Nilai</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->seminar->transkip_nilai) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Laporan KP</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->seminar->laporan_kp) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Keuangan</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->seminar->keuangan) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Konsultasi</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->seminar->konsultasi) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Status</th>
      <th>:</th>
      <td>
        @if ($mahasiswa->seminar->status == 'diterima')
        <span class="badge bg-success">Diterima
          @elseif ($mahasiswa->seminar->status == 'ditolak')
          <span class="badge bg-danger">Ditolak
            @else
            <span class="badge bg-info">Dikirim
              @endif
            </span>
      </td>
    </tr>

    <tr>
      <th class="col-4">Tgl. Submit</th>
      <th>:</th>
      <td>{{ date('d F Y', strtotime($mahasiswa->seminar->created_at)) }}</td>
    </tr>

    <tr>
      <th class="col-4">Tgl. Update</th>
      <th>:</th>
      <td>{{ date('d F Y', strtotime($mahasiswa->seminar->updated_at)) }}</td>
    </tr>

    <tr>
      <th class="col-4">Keterangan</th>
      <th>:</th>
      <td>{{ ucwords($mahasiswa->seminar->keterangan) }}</td>
    </tr>

  </table>
</div>

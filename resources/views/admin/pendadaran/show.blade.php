<div class="table-responsive-lg">
  <table class="table app-table-hover mb-0 text-left">
    <tr>
      <th class="col-4">Tempat Tanggal Lahir</th>
      <th>:</th>
      <td>{{ ucwords($mahasiswa->tmpt_lahir) . ', ' . date('d M Y', strtotime($mahasiswa->tgl_lahir ))}}</td>
    </tr>

    <tr>
      <th class="col-4">Nomor HP</th>
      <th>:</th>
      <td>{{ $mahasiswa->no_hp }}</td>
    </tr>

    <tr>
      <th class="col-4">Alamat</th>
      <th>:</th>
      <td>{{ ucwords($mahasiswa->alamat) }}</td>
    </tr>

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
      <th class="col-4">Kartu Rencana Studi</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->krs) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Transkip Nilai</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->transkip_nilai) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Lembar Aktifitas Tugas Akhir</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->konsultasi) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Surat Keterangan Bebas Perkuliahan dari BAAK</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->perkuliahan) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Surat Keterangan Bebas Keuangan dari BAUK</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->keuangan) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Surat Keterangan Bebas Perpustakaan</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->perpustakaan) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Surat Keterangan Bebas Laboratorium</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->laboratorium) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Sertifikat Action Program</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->action) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Sertifikat Kompetensi Laboratorium</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->kompetensi) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Sertifikat TOEFL</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->toefl) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Fotocopy Ijazah Terakhir</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->ijazah) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Fotocopy KTP</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->ktp) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Fotocopy Akte Kelahiran</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->akte) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Foto 3 x 4 Berwarna</th>
      <th>:</th>
      <td><a href="{{ Storage::url($mahasiswa->pendadaran->foto) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Status</th>
      <th>:</th>
      <td>
        @if ($mahasiswa->pendadaran->status == 'terima')
        <span class="badge bg-success">Diterima
          @elseif ($mahasiswa->pendadaran->status == 'tolak')
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
      <td>{{ ucwords($mahasiswa->pendadaran->keterangan) }}</td>
    </tr>

  </table>
</div>

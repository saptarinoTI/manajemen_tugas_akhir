<div class="table-responsive-lg">
  <table class="table app-table-hover mb-0 text-left">
    <tr>
      <th class="col-4">Tempat Tanggal Lahir</th>
      <th>:</th>
      <td>{{ ucwords($pendadaran->mahasiswa->tmpt_lahir) . ', ' . date('d M Y', strtotime($pendadaran->mahasiswa->tgl_lahir ))}}</td>
    </tr>

    <tr>
      <th class="col-4">Nomor HP</th>
      <th>:</th>
      <td>{{ $pendadaran->mahasiswa->no_hp }}</td>
    </tr>

    <tr>
      <th class="col-4">Alamat</th>
      <th>:</th>
      <td>{{ ucwords($pendadaran->mahasiswa->alamat) }}</td>
    </tr>

    <tr>
      <th class="col-4">Pembimbing Utama</th>
      <th>:</th>
      <td>{{ ucwords($pendadaran->mahasiswa->pem_utama) }}</td>
    </tr>

    <tr>
      <th class="col-4">Pembimbing Pendamping</th>
      <th>:</th>
      <td>{{ ucwords($pendadaran->mahasiswa->pem_pendamping) }}</td>
    </tr>

    <tr>
      <th class="col-4">Judul Tugas Akhir</th>
      <th>:</th>
      <td>{{ ucwords($pendadaran->mahasiswa->judul_ta) }}</td>
    </tr>

    <tr>
      <th class="col-4">Kartu Rencana Studi</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->krs) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Transkip Nilai</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->transkip_nilai) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Lembar Aktifitas Tugas Akhir</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->konsultasi) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Surat Keterangan Bebas Perkuliahan dari BAAK</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->perkuliahan) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Surat Keterangan Bebas Keuangan dari BAUK</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->keuangan) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Surat Keterangan Bebas Perpustakaan</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->perpustakaan) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Surat Keterangan Bebas Laboratorium</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->laboratorium) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Sertifikat Action Program</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->action) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Sertifikat Kompetensi Laboratorium</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->kompetensi) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Sertifikat TOEFL</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->toefl) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Fotocopy Ijazah Terakhir</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->ijazah) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Fotocopy KTP</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->ktp) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Fotocopy Akte Kelahiran</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->akte) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    <tr>
      <th class="col-4">Foto 3 x 4 Berwarna</th>
      <th>:</th>
      <td><a href="{{ Storage::url($pendadaran->foto) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary" style="padding: 2px 8px !important">Unduh</a></td>
    </tr>

    @if ($pendadaran->tgl_terima)
    <tr>
      <th class="col-4">Tgl.Terima</th>
      <th>:</th>
      <td>{{ date('d F Y', strtotime($pendadaran->tgl_terima)) }}</td>
    </tr>
    @endif


    <tr>
      <th class="col-4">Status</th>
      <th>:</th>
      <td>
        @if ($pendadaran->status == 'terima')
        <span class="badge bg-success">Diterima
          @elseif ($pendadaran->status == 'tolak')
          <span class="badge bg-danger">Ditolak
            @else
            <span class="badge bg-info">Validasi
              @endif
            </span>
      </td>
    </tr>

    <tr>
      <th class="col-4">Keterangan</th>
      <th>:</th>
      <td>{{ ucwords($pendadaran->keterangan) }}</td>
    </tr>

  </table>
</div>

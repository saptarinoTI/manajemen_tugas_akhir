<x-app-layout>
  <x-slot name="name">Proposal Tugas Akhir</x-slot>

  {{-- Table Data Mahasiswa --}}
  <div class="card">
    {{-- @role('mahasiswa') --}}
    @if (!$proposal)
    <div class="card-header d-flex justify-content-end">
      <a href="{{ route('proposal.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
    </div>
    @endif
    {{-- @endrole --}}
    <div class="card-body">
      <div class="table-responsive">
        <table id="tabel_proposal" class="table table-striped nowrap" style="width:100%">
          <thead>
            <tr>
              <th>File</th>
              @if($proposal)
              @if ($proposal->file2 != null)
              <th>File 2</th>
              @endif
              @if ($proposal->file3 != null)
              <th>File 3</th>
              @endif
              @endif
              <th>Status</th>
              <th>Keterangan</th>
              @if($proposal)
              @if ($proposal->status != 'diterima')
              <th>Aksi</th>
              @endif
              @endif
            </tr>
          </thead>
          <tbody>
            @if ($proposal)
            <p class="fw-bold text-xs d-flex justify-content-end" style="letter-spacing: 1px">Submit : {{ date('d F Y', strtotime($proposal->created_at )) }}</p>
            <tr>
              <td>
                <a href="{{ Storage::url($proposal->file1) }}" target="_blank" rel="noopener noreferrer"><span class="btn btn-sm btn-primary" style="font-size: 13px; padding: 4px 6px !important">Unduh</span></a>
              </td>
              @if ($proposal->file2 != null)
              <td>
                <a href="{{ Storage::url($proposal->file2) }}" target="_blank" rel="noopener noreferrer"><span class="btn btn-sm btn-primary" style="font-size: 13px; padding: 4px 6px !important">Unduh</span></a>
              </td>
              @endif

              @if ($proposal->file3 != null)
              <td>
                <a href="{{ Storage::url($proposal->file3) }}" target="_blank" rel="noopener noreferrer"><span class="btn btn-sm btn-primary" style="font-size: 13px; padding: 4px 6px !important">Unduh</span></a>
              </td>
              @endif
              <td>{{ ucwords($proposal->status) }}</td>
              <td>{{ ucwords($proposal->keterangan) }}</td>
              @if ($proposal->status != 'diterima')
              <td>
                <a href="{{ route('proposal.edit', $proposal->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
              </td>
              @endif
            </tr>
            @else
            <tr>
              <td colspan="4" class="fw-bold text-center py-3">Data tidak tersedia.</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
      @if ($proposal)
      <span class="fw-bold text-xs d-flex justify-content-end" style="letter-spacing: 1px">Last Update : {{ date('d F Y', strtotime($proposal->updated_at )) }}</span>
      @endif
    </div>
  </div>
  {{-- End Table Data Mahasiswa --}}
</x-app-layout>

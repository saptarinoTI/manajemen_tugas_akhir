<x-app-layout>
  <x-slot name="name">Seminar Hasil</x-slot>

  {{-- Table Data Mahasiswa --}}
  <div class="card">
    @if (!$seminar)
    <div class="card-header d-flex justify-content-end">
      <a href="{{ route('seminar-hasil.create') }}" class="btn btn-sm btn-primary">Daftarkan Seminar Hasil</a>
    </div>
    @endif
    <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="table1" style="width: 100%">
          <thead>
            <tr>
              <th>Status</th>
              <th class="col-8">Keterangan</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if ($seminar)
            <p class="fw-bold text-xs d-flex justify-content-end" style="letter-spacing: 1px">Submit : {{ date('d F Y', strtotime($seminar->created_at )) }}</p>
            <tr>
              <td>
                @if ($seminar->status == "terima")
                <span class="badge bg-success">Diterima
                  @elseif ($seminar->status == "tolak")
                  <span class="badge bg-danger">Ditolak
                    @else
                    <span class="badge bg-info">Validasi
                      @endif
                    </span>
              </td>
              <td>{{ ucwords($seminar->keterangan) }}</td>
              <td class="text-center">
                <a href="#semhasDetail" data-remote="{{ route('seminar-hasil.show', $seminar->mahasiswa->nim) }}" data-bs-toggle="modal" data-bs-target="#semhasDetail" data-title="{{ $seminar->mahasiswa->nim }} - {{ strtoupper($seminar->mahasiswa->nama) }}" class="my-1 btn btn-sm btn-info">
                  <i class="bi bi-eye-fill"></i>
                </a>
                @if ($seminar->status != 'terima')
                <a href="{{ route('seminar-hasil.edit', $seminar->id) }}" class="btn btn-sm btn-primary">
                  <i class="bi bi-pencil-fill"></i>
                </a>
                @endif
              </td>
            </tr>
            @else
            <tr>
              <td colspan="3" class="fw-bold text-center py-3">Data tidak tersedia.</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
      @if ($seminar)
      <span class="fw-bold text-xs d-flex justify-content-end" style="letter-spacing: 1px">Last Update : {{ date('d F Y', strtotime($seminar->updated_at )) }}</span>
      @endif
    </div>
  </div>
  {{-- End Table Data Mahasiswa --}}

  @push('script')
  <script>
    $(document).ready(function($) {
      // Modal
      $("#semhasDetail").on("show.bs.modal", function(e) {
        var button = $(e.relatedTarget);
        var modal = $(this);
        modal.find(".modal-body").load(button.data("remote"));
        modal.find(".modal-title").html(button.data("title"));
      });
    });

  </script>

  <!-- Modal -->
  <div class="modal fade" id="semhasDetail" tabindex="-1" aria-labelledby="mymodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <i class="fa fa-spinner fa-spin"></i>
        </div>
      </div>
    </div>
  </div>
  @endpush
</x-app-layout>

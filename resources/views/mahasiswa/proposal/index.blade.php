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
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($proposal)
                            <p class="fw-bold text-xs d-flex justify-content-end" style="letter-spacing: 1px">Submit :
                                {{ date('d F Y', strtotime($proposal->created_at)) }}</p>
                            <tr>
                                <td>
                                    @if ($proposal->status == 'diterima')
                                        <span class="badge bg-success">Diterima
                                        @elseif ($proposal->status == 'ditolak')
                                            <span class="badge bg-danger">Ditolak
                                            @else
                                                <span class="badge bg-info">Dikirim
                                    @endif
                                    </span>
                                </td>
                                <td>{{ ucwords($proposal->keterangan) }}</td>
                                @if ($proposal->status != 'diterima')
                                    <td>
                                        <a href="{{ route('proposal.edit', $proposal->id) }}"
                                            class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                    </td>
                                @else
                                    <td>
                                        <a href="#modalProposal"
                                            data-remote="{{ route('proposal.show', $proposal->id) }}"
                                            data-bs-toggle="modal" data-bs-target="#modalProposal"
                                            data-title="Detail Proposal Tugas Akhir" class="my-1 btn btn-sm btn-info"><i
                                                class="bi bi-eye-fill"></i></a>
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
                <span class="fw-bold text-xs d-flex justify-content-end" style="letter-spacing: 1px">Last Update :
                    {{ date('d F Y', strtotime($proposal->updated_at)) }}</span>
            @endif
        </div>
    </div>
    {{-- End Table Data Mahasiswa --}}

    @push('script')
        <script>
            $(document).ready(function($) {
                // Modal
                $("#modalProposal").on("show.bs.modal", function(e) {
                    var button = $(e.relatedTarget);
                    var modal = $(this);
                    modal.find(".modal-body").load(button.data("remote"));
                    modal.find(".modal-title").html(button.data("title"));
                });
            });
        </script>

        <!-- Modal -->
        <div class="modal fade" id="modalProposal" tabindex="-1" aria-labelledby="mymodalLabel" aria-hidden="true">
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

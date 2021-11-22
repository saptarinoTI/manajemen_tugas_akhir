<x-app-layout>
    <x-slot name="name">Data Mahasiswa Lulus</x-slot>

    {{-- Table Data Mahasiswa --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table_data_mahasiswa" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Thn. Lulus</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End Table Data Mahasiswa --}}

    @push('script')
        <script>
            // Script of DataTables
            $(function() {
                var table = $('#table_data_mahasiswa').DataTable({
                    order: [
                        [0, "desc"]
                    ],
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('data-lulus.index') }}",
                    columns: [{
                        data: 'nim',
                        name: 'nim'
                    }, {
                        data: 'nama',
                        name: 'nama'
                    }, {
                        data: 'thn_lulus',
                        name: 'thn_lulus'
                    }, {
                        data: 'status',
                        name: 'status'
                    }, {
                        data: 'aksi',
                        name: 'aksi'
                    }]
                });
            });
            $(document).ready(function($) {
                // Modal
                $("#modalLulus").on("show.bs.modal", function(e) {
                    var button = $(e.relatedTarget);
                    var modal = $(this);
                    modal.find(".modal-body").load(button.data("remote"));
                    modal.find(".modal-title").html(button.data("title"));
                });
            });
        </script>

        <!-- Modal -->
        <div class="modal fade" id="modalLulus" tabindex="-1" aria-labelledby="mymodalLabel" aria-hidden="true">
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

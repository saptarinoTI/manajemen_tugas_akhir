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
                            <th>Judul TA</th>
                            <th>Pem. Utama</th>
                            <th>Pem. Pendamping</th>
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
            // button destroy
            $('#table_data_mahasiswa').on('click', '.btn-delete', function(e) {
                e.preventDefault();
                var me = $(this),
                    url = me.attr('href'),
                    csrf_token = $('meta[name="csrf-token"]').attr('content');
                swal({
                        title: "Hapus Data ?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: {
                                    '_method': 'DELETE',
                                    '_token': csrf_token
                                },
                                success: function(response) {
                                    $('#table_data_mahasiswa').DataTable().ajax.reload();
                                    swal({
                                        text: "Data berhasil dihapus!",
                                        icon: "success",
                                    });
                                }
                            });
                        }
                    });
            });

            // Script of DataTables
            $(function() {
                var table = $('#table_data_mahasiswa').DataTable({
                    order: [
                        [0, "desc"]
                    ],
                    processing: true,
                    serverSide: true,
                    responsive: true,
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
                        data: 'judul_ta',
                        name: 'judul_ta'
                    }, {
                        data: 'utama',
                        name: 'utama'
                    }, {
                        data: 'pendamping',
                        name: 'pendamping'
                    }, ]
                });
            });
        </script>

    @endpush
</x-app-layout>

<x-app-layout>
    <x-slot name="name">Mahasiswa</x-slot>

    {{-- Table Data Mahasiswa --}}
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <x-form.button type="submit">Update Data</x-form.button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table_mahasiswa" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tahun Ajaran</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    {{-- End Table Data Mahasiswa --}}

    @push('script')
        <script>
            // Script of DataTables
            $(function() {
                var table = $('#table_mahasiswa').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('datamahasiswa') }}",
                    columns: [{
                        data: 'mhs_no',
                        name: 'mhs_no'
                    }, {
                        data: 'mhs_nama',
                        name: 'mhs_nama'
                    }, {
                        data: 'ta_id',
                        name: 'ta_id'
                    }, ]
                });
            });
        </script>
    @endpush
</x-app-layout>

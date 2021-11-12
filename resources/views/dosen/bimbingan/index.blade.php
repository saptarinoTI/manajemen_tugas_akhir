<x-app-layout>
    <x-slot name="name">Data Diri Mahasiswa</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabelbimbingan" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Judul Skripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        $(function() {
            var table = $('#tabelbimbingan').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dosen-bimbingan.index') }}",
                columns: [{
                    data: 'mahasiswa_nim',
                    name: 'mahasiswa_nim'
                }, {
                    data: 'nama',
                    name: 'nama'
                }, {
                    data: 'judul',
                    name: 'judul'
                }, ]
            });
        });
    </script>
    @endpush
</x-app-layout>

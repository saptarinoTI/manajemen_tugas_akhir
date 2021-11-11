<x-app-layout>
    {{--
    <x-app.title name="Seminar Hasil" /> --}}
    <x-slot name="name">Data Role Users</x-slot>

    <div class="card">
        <div class="card-body">
            <table id="table_seminar" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Tgl. Terima</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</x-app-layout>

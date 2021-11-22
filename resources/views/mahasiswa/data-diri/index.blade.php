<x-app-layout>
    <x-slot name="name">Data Diri Mahasiswa</x-slot>

    {{-- Table Data Mahasiswa --}}
    <div class="card">
        {{-- @role('mahasiswa') --}}
        @if (!$mahasiswa)
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('data-diri.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
        @endif
        {{-- @endrole --}}
        <div class="card-body">
            <div class="table-responsive">
                <table id="table_data_mahasiswa" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        @if ($mahasiswa != null)
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                @if ($mahasiswa->no_hp != null)
                                    <th>No HP</th>
                                @endif
                                <th>Tempat, Tanggal Lahir</th>
                                @if ($mahasiswa->alamat != null)
                                    <th>Alamat</th>
                                @endif
                                <th>Aksi</th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @if ($mahasiswa)
                            <tr>
                                <td>{{ $mahasiswa->nim }}</td>
                                <td>{{ ucwords($mahasiswa->nama) }}</td>
                                @if ($mahasiswa->no_hp != null)
                                    <td>
                                        {{ $mahasiswa->no_hp }}
                                    </td>
                                @endif
                                <td>{{ ucwords($mahasiswa->tmpt_lahir) . ', ' . date('d M Y', strtotime($mahasiswa->tgl_lahir)) }}
                                </td>
                                @if ($mahasiswa->alamat != null)
                                    <td>
                                        {{ ucwords($mahasiswa->alamat) }}
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ route('data-diri.edit', $mahasiswa->nim) }}"
                                        class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6" class="text-center" style="font-weight: 500">Data tidak tersedia</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End Table Data Mahasiswa --}}

    @push('script')
        <script>
            // Script of DataTables
            // $(function() {
            //   var table = $('#table_data_mahasiswa').DataTable({
            //     processing: true
            //     , serverSide: true
            //     , responsive: true
            //       // , searching: false
            //     , lengthChange: false
            //       // , paging: false
            //     , info: false
            //     , ajax: "{{ route('data-diri.index') }}"
            //     , columns: [{
            //         data: 'nim'
            //         , name: 'nim'
            //       }
            //       , {
            //         data: 'nama'
            //         , name: 'nama'
            //       }
            //       , {
            //         data: 'no_hp'
            //         , name: 'no_hp'
            //       }
            //       , {
            //         data: 'ttl'
            //         , name: 'ttl'
            //       }
            //       , {
            //         data: 'alamat'
            //         , name: 'alamat'
            //       }
            //       , {
            //         data: 'pem_utama'
            //         , name: 'pem_utama'
            //       }
            //       , {
            //         data: 'pem_pendamping'
            //         , name: 'pem_pendamping'
            //       }
            //       , {
            //         data: 'judul_ta'
            //         , name: 'judul_ta'
            //       }
            //       , {
            //         data: 'tgl_add'
            //         , name: 'tgl_add'
            //       }
            //       , {
            //         data: 'tgl_update'
            //         , name: 'tgl_update'
            //       }
            //       , {
            //         data: 'btn'
            //         , name: 'btn'
            //       }
            //     , ]
            //   });
            // });
        </script>
    @endpush
</x-app-layout>

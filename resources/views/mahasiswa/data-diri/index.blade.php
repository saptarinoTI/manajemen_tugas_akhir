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
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>No HP</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Pem Utama</th>
              <th>Pen Pendamping</th>
              <th>Tugas Akhir</th>
              <th>Tgl. Submit</th>
              <th>Tgl. Update</th>
              <th>@role('mahasiswa') Aksi @endrole</th>
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
        processing: true
        , serverSide: true
        , responsive: true
          // , searching: false
        , lengthChange: false
          // , paging: false
        , info: false
        , ajax: "{{ route('get-mahasiswa') }}"
        , columns: [{
            data: 'nim'
            , name: 'nim'
          }
          , {
            data: 'nama'
            , name: 'nama'
          }
          , {
            data: 'no_hp'
            , name: 'no_hp'
          }
          , {
            data: 'ttl'
            , name: 'ttl'
          }
          , {
            data: 'alamat'
            , name: 'alamat'
          }
          , {
            data: 'pem_utama'
            , name: 'pem_utama'
          }
          , {
            data: 'pem_pendamping'
            , name: 'pem_pendamping'
          }
          , {
            data: 'judul_ta'
            , name: 'judul_ta'
          }
          , {
            data: 'tgl_add'
            , name: 'tgl_add'
          }
          , {
            data: 'tgl_update'
            , name: 'tgl_update'
          }
          , {
            data: 'btn'
            , name: 'btn'
          }
        , ]
      });
    });

  </script>
  @endpush
</x-app-layout>

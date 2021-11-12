<x-app-layout>
  <x-slot name="name">Data Diri Mahasiswa</x-slot>

  {{-- Table Data Mahasiswa --}}
  <div class="card">
    <div class="card-header d-flex justify-content-end">
      <form action="{{ route('data-mahasiswa.store') }}" method="POST">
        @csrf
        <x-form.button type="submit">Update Data</x-form.button>
      </form>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="table_data_mahasiswa" class="table table-striped nowrap" style="width:100%">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>No HP</th>
              <th>Tempat & Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Tgl. Submit</th>
              <th>Tgl. Update</th>
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
    // button destroy
    $('#table_data_mahasiswa').on('click', '.btn-delete', function(e) {
      e.preventDefault();
      var me = $(this)
        , url = me.attr('href')
        , csrf_token = $('meta[name="csrf-token"]').attr('content');
      swal({
          title: "Hapus Data ?"
          , icon: "warning"
          , buttons: true
          , dangerMode: true
        , })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              type: "POST"
              , url: url
              , data: {
                '_method': 'DELETE'
                , '_token': csrf_token
              }
              , success: function(response) {
                $('#table_data_mahasiswa').DataTable().ajax.reload();
                swal({
                  text: "Data berhasil dihapus!"
                  , icon: "success"
                , });
              }
            });
          }
        });
    });

    // Script of DataTables
    $(function() {
      var table = $('#table_data_mahasiswa').DataTable({
        processing: true
        , serverSide: true
        , responsive: true
        , ajax: "{{ route('getdata-mahasiswa') }}"
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

<x-app-layout>
  <x-slot name="name">Users</x-slot>

  {{-- Table Data Mahasiswa --}}
  <div class="card">
    <div class="card-header d-flex justify-content-end">
      <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="table-users" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
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
    $('#table-users').on('click', '.btn-delete', function(e) {
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
                $('#table-users').DataTable().ajax.reload();
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
      var table = $('#table-users').DataTable({
        processing: true
        , serverSide: true
        , responsive: true
        , ajax: "{{ route('datauser') }}"
        , columns: [{
            data: 'username'
            , name: 'username'
          }
          , {
            data: 'email'
            , name: 'email'
          }
          , {
            data: 'role'
            , name: 'role'
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

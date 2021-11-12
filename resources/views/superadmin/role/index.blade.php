<x-app-layout>
    {{--
    <x-app.title name="Seminar Hasil" /> --}}
    <x-slot name="name">Data Role Users</x-slot>

    <div class="card">
        <div class="card-head mx-4 mt-4 d-flex justify-content-end">
            <a href="{{ route('role.create') }}" class="btn btn-sm text-sm btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel_role" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ ucwords($role->name) }}</td>
                            <td>
                                <a href="role/{{ $role->id }}"
                                    class="btn btn-sm btn-delete text-xs btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        // button destroy
        $('#tabel_role').on('click', '.btn-delete', function(e) {
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
                    location.reload();
                    swal({
                      text: "Data berhasil dihapus!"
                      , icon: "success"
                    , });
                  }
                });
              }
            });
        });
    </script>
    @endpush
</x-app-layout>

<x-app-layout>
    {{--
    <x-app.title name="Seminar Hasil" /> --}}
    <x-slot name="name">Data Dosen Pembimbing</x-slot>

    <div class="card">
        <div class="card-head mx-4 mt-4 d-flex justify-content-end">
            {{-- <a href="{{ route('dosen.store') }}" class="btn btn-sm text-sm btn-primary">Update Data</a> --}}
            <form action="{{ route('dosen.store') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm text-sm btn-primary">Update Data</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel_role" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIY Dosen</th>
                            <th>Nama Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen as $dos)
                        <tr>
                            <td>{{ ucwords($dos->niy) }}</td>
                            <td>{{ ucwords($dos->nama) }}</td>
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
                                location.reload();
                                swal({
                                    text: "Data berhasil dihapus!",
                                    icon: "success",
                                });
                            }
                        });
                    }
                });
        });
    </script>
    @endpush
</x-app-layout>

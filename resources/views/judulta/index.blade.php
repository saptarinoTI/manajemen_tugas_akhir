<x-guest-layout>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary"
        style="margin: 0; padding: 0; box-shadow: 0px 0px 10px 1px #b8b8b8;">
        <div class="container">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo/logo-light.png') }}" style="max-width: 150px">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-sm py-1 px-3 btn-light text-primary" href="{{ route('login') }}"
                            style="letter-spacing: .07rem;">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h4 class="fw-bold my-3 pt-3" style="color: #333333">Daftar Judul Tugas Akhir</h4>



        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabel_tugas_akhir" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul Tugas Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    @push('script')
        <script>
            // Script of DataTables
            $(function() {
                var table = $('#tabel_tugas_akhir').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    bLengthChange: false,
                    ajax: "{{ route('judul-ta.index') }}",
                    columns: [{
                        data: 'daftar_ta',
                        name: 'daftar_ta'
                    }]
                });
            });
        </script>
    @endpush
</x-guest-layout>

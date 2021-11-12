<x-guest-layout>
  <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-white static-top" style="box-shadow: 0px 0px 10px 1px #b8b8b8;">
    <div class="container">
      <a href="#" class="pt-2">
        <img src="{{ asset('/img/logo/logo-color2.png') }}" alt="logo" width="250">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  {{-- Table Data Mahasiswa --}}
  <div class="container">
    <div class="card" style="margin-top: 7rem">
      <div class="card-head">
        <h4 class="fw-bold pt-3 px-4">Daftar Judul Tugas Akhir</h4>
      </div>
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
        processing: true
        , serverSide: true
        , responsive: true
        , ajax: "{{ route('judul-ta.index') }}"
        , columns: [{
          data: 'daftar_ta'
          , name: 'daftar_ta'
        }]
      });
    });

  </script>
  @endpush
</x-guest-layout>

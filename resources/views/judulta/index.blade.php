<x-app-layout>
  <x-slot name="name">Daftar Judul Tugas Akhir</x-slot>

  {{-- Table Data Mahasiswa --}}
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
  {{-- End Table Data Mahasiswa --}}

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
</x-app-layout>

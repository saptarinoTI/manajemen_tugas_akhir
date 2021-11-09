<x-app-layout>
  {{-- <x-app.title name="Seminar Hasil" /> --}}
  <x-slot name="name">Seminar Hasil</x-slot>

  {{-- Table Data Mahasiswa --}}
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="table1" style="width: 100%">
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
  </div>
  {{-- End Table Data Mahasiswa --}}

  @push('script')
  <script>
    // Script of DataTables
    $(function() {
      var table = $('#table1').DataTable({
        processing: true
        , serverSide: true
        , ajax: "{{ route('getdata-pendadaran') }}"
        , columns: [{
            data: 'nim'
            , name: 'nim'
          }
          , {
            data: 'nama'
            , name: 'nama'
          }
          , {
            data: 'status'
            , name: 'status'
          }
          , {
            data: 'tgl_terima'
            , name: 'tgl_terima'
          }
          , {
            data: 'btn'
            , name: 'btn'
          }
        , ]
      });
    });

    $(document).ready(function($) {
      // Modal
      $("#modalPendadaran").on("show.bs.modal", function(e) {
        var button = $(e.relatedTarget);
        var modal = $(this);
        modal.find(".modal-body").load(button.data("remote"));
        modal.find(".modal-title").html(button.data("title"));
      });
    });

  </script>

  <!-- Modal -->
  <div class="modal fade" id="modalPendadaran" tabindex="-1" aria-labelledby="mymodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <i class="fa fa-spinner fa-spin"></i>
        </div>
      </div>
    </div>
  </div>
  @endpush
</x-app-layout>

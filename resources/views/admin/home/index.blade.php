@extends('admin.layouts.app')

@section('title', 'E-IPNBK | Home')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Rekapitulasi IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Rekapitulasi IPNBK.</span>
    </h3>
    <div class="d-flex">
      <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
        <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
      <button type="button" onClick="window.location = '{{ route('admin.question.index') }}'" class="btn btn-sm ml-3 btn-success"> Tambah Survey </button>
    </div>
  </div>
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Tahun 2022</h4>
    <p class="card-description"> Add class <code>.table</code>
    </p>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>IPNBK</th>
            <th>Total Responden</th>
            <th>Total Pertanyaan</th>
            <th>Nilai Rata-rata</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1 @endphp
          @foreach($ipnbk as $res)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $res->keterangan }}</td>
              <td>{{ $totalResponden }}</td>
              <td>{{ $totalQuestion }}</td>
              <td></td>
              <td>
                @if($res->is_open == 1)
                <label class="badge badge-success">Aktif</label>
                @else
                  <label class="badge badge-danger">Expired</label>
                @endif
              </td>
            </tr>
          @endforeach 
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

{{-- @section('script')

  <?php $cek = Auth::user()->role->first()->id; ?>

  @if($cek  === 1 || $cek  === 2 || $cek  === 3)

    <script>
    
      $(document).ready(function() {

        $('#ipnbk_id').on('change', function(){

          let ipnbk_id = $(this).val();

          window.location = '{{ route('admin.home.index') }}/' + ipnbk_id;

        });

        let url = '{{ route('api', $IpnbkId) }}';
        let data = [

          { "data" : "DT_Row_Index", orderable: false, searchable: false},
          { "data" : "ipnbk[0].keterangan" },
          { "data" : "id" },
          { "data" : "created_at" },
          { "data" : ""},
          { "data" : "action" , orderable: false, searchable: false}

      ]

        $('#adminHomeipnbk').DataTable({

              "processing": true,
              "serverSide": true,
              "ajax":{
                 "url": url,
                 "method": "POST",
                 "dataType": "JSON"
              },
              "columns": data,
              "columnDefs": [{
                  "defaultContent": "-",
                  "targets": "_all"
              }]

          });

      });

      $(document).on('click', '#deleteipnbk', function(e){

          e.preventDefault();
          let id = $( this ).data( 'id' );

          $('#modalDeleteipnbk').modal('show');

          let idInForm = $("#modalDeleteipnbk #IpnbkId").val(id);

      });
    </script>

  @else

    <script>
    
      $(document).ready(function() {

        $('#ipnbk_id').on('change', function(){

          let ipnbk_id = $(this).val();

          window.location = '{{ route('admin.home.index') }}/' + ipnbk_id;

        });

        let url = '{{ route('api', $IpnbkId) }}';
        let data = [

          { "data" : "DT_Row_Index", orderable: false, searchable: false},
          { "data" : "ipnbk[0].keterangan" },
          { "data" : "id" },
          { "data" : "created_at" },
          { "data" : ""},
          { "data" : "-" , orderable: false, searchable: false}

      ]

        $('#adminHomeipnbk').DataTable({

              "processing": true,
              "serverSide": true,
              "ajax":{
                 "url": url,
                 "method": "POST",
                 "dataType": "JSON"
              },
              "columns": data,
              "columnDefs": [{
                  "defaultContent": "-",
                  "targets": "_all"
              }]

          });

      });

      $(document).on('click', '#deleteipnbk', function(e){

          e.preventDefault();
          let id = $( this ).data( 'id' );

          $('#modalDeleteipnbk').modal('show');

          let idInForm = $("#modalDeleteipnbk #IpnbkId").val(id);

      });
    </script>

  @endif --}}

  {{-- 
@endsection --}}


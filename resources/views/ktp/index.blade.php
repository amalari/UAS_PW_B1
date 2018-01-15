@extends('layouts.layout')

{{-- style --}}
@push('css')
  <link rel="stylesheet" type="text/css" href="/vendor/datatables.net-dt/css/dataTables.bootstrap4.min.css">
  <style>
  </style>
@endpush

{{-- js --}}
@push('scripts')
  <script src="/vendor/datatables.net/js/jquery.dataTables.js"></script>
  <script src="/vendor/datatables.net/js/dataTables.bootstrap4.min.js"></script>
  <script src="/js/views/ktpIndex.js"></script>
  <script>
    $('table').on('click', '.form-delete .btn', function(e){
      // alert('feaw');
      e.preventDefault();
      if (confirm("Apakah anda yakin?")){
         $('.form-delete').submit();
      }
    })
  </script>
@endpush

@section('content')
  @include('partials.breadcrumb', ["breadcrumbs" => ["materials.index" => "KTP"]])
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Kartu Tanda Kependudukan</h4>
          </div>
          <div class="card-body">
            <a href="{{route('ktp.create')}}" class="btn btn-primary">Create</a>
            <br>
            <br>
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>No Kartu Keluarga</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Alamat</th>
                  <th width="21%">Aksi</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--/.col-->
    </div>
  </div>
@endsection

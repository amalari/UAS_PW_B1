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
  <script src="/js/views/dashboard.js"></script>
@endpush

@section('content')
  @include('partials.breadcrumb', ["breadcrumbs" => ["" => "Dashboard"]])
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card" id="dashboard">
          <div class="card-header">
            <h4>Dashboard</h4>
          </div>
        </div>
        <!--/.col-->
      </div>
    </div>
  @endsection

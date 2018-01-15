@extends('layouts.layout')

{{-- style --}}
@push('css')
  <style>
    .form-group label {
      font-weight: bold;
    }
  </style>
@endpush

{{-- js --}}
@push('scripts')
@endpush

@section('content')
  @include('partials.breadcrumb', ["breadcrumbs" => ["ktp.index" => "Ktp", "ktp.show" => "Detail"]])
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Detail Ktp</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-md-3 col-form-label">NIK</label>
                <div class="col-md-9">
                  <p>{{$ktp['nik']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Nama</label>
                <div class="col-md-9">
                  <p>{{$ktp['nama']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Tempat Lahir</label>
                <div class="col-md-9">
                  <p>{{$ktp['tempat_lahir']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                <div class="col-md-9">
                  <p>{{$ktp['jenis_kelamin'] == 'l' ? "Laki-laki" : "Perempuan"}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Alamat</label>
                <div class="col-md-9">
                  <p>{{$ktp['alamat']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">RT/RW</label>
                <div class="col-md-9">
                  <p>{{$ktp['rt_rw']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Kelurahan</label>
                <div class="col-md-9">
                  <p>{{$ktp['kelurahan']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Kecamatan</label>
                <div class="col-md-9">
                  <p>{{$ktp['kecamatan']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Agama</label>
                <div class="col-md-9">
                  <p>{{$ktp['agama']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Status</label>
                <div class="col-md-9">
                  <p>{{$ktp['status']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Pekerjaan</label>
                <div class="col-md-9">
                  <p>{{$ktp['pekerjaan']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Kewarganegaraan</label>
                <div class="col-md-9">
                  <p>{{$ktp['kewarganegaraan']}}</p>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Berlaku Hingga</label>
                <div class="col-md-9">
                  <p>{{$ktp['berlaku']}}</p>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{route('ktp.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
          </form>
        </div>
      </div>
      <!--/.col-->
    </div>
  </div>
@endsection

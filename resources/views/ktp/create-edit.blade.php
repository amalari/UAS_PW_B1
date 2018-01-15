@extends('layouts.layout')

{{-- style --}}
@push('css')
@endpush

{{-- js --}}
@push('scripts')
  <script>
  $(function(){
  })
  </script>
@endpush

@section('content')
  @if ($pageAs == "create")
    @include('partials.breadcrumb', ["breadcrumbs" => ["ktp.index" => "Ktp", "ktp.create" => "Create"]])
  @else
    @include('partials.breadcrumb', ["breadcrumbs" => ["ktp.index" => "Ktp", "ktp.edit" => "Edit"]])
  @endif
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <form action="{{$pageAs == 'create' ? route('ktp.store') : route('ktp.update', ['id' => $default['id']])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            @if ($pageAs == "edit")
              <input type="hidden" name="_method" value="PUT" />
            @endif
            <div class="card-header">
              <h4>{{ucwords($pageAs)}} Kartu Tanda Penduduk</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">NIK</label>
                <div class="col-md-9">
                  <input type="text" name="nik" value="{{$default['nik']}}" class="form-control {{$errors->has('nik') ? 'is-invalid' : ''}}">
                  @if($errors->has('nik'))
                    <div class="invalid-feedback">
                      {{ $errors->get('nik')[0] }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Nama</label>
                <div class="col-md-9">
                  <input type="text" name="nama" value="{{$default['nama']}}" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}">
                  @if($errors->has('nama'))
                    <div class="invalid-feedback">
                      {{ $errors->get('nama')[0] }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Tempat Lahir</label>
                <div class="col-md-9">
                  <input type="text" name="tempat_lahir" value="{{$default['tempat_lahir']}}" class="form-control {{$errors->has('tempat_lahir') ? 'is-invalid' : ''}}">
                  @if($errors->has('tempat_lahir'))
                    <div class="invalid-feedback">
                      {{ $errors->get('tempat_lahir')[0] }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Tanggal Lahir</label>
                <div class="col-md-9">
                  <input type="date" value="{{$default['tgl_lahir']}}" name="tgl_lahir" class="form-control {{$errors->has('tgl_lahir') ? 'is-invalid' : ''}}">
                  {{-- <input type="hidden" name="tgl_lahir" value="{{$default['tgl_lahir']}}">
                  @if($errors->has('tgl_lahir'))
                    <div class="invalid-feedback">
                      {{ $errors->get('tgl_lahir')[0] }}
                    </div>
                  @endif --}}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Jenis Kelamin</label>
                <div class="col-md-9">
                  <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                    <option value="" disabled selected></option>
                      <option @if($default['jenis_kelamin'] == "l") selected @endif value="l">Laki - laki</option>
                      <option @if($default['jenis_kelamin'] == "p") selected @endif value="p">Perempuan</option>
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Alamat</label>
                <div class="col-md-9">
                  <input type="text" name="alamat" value="{{$default['alamat']}}" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}">
                  @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                      {{ $errors->get('alamat')[0] }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">RT/RW</label>
                <div class="col-md-9">
                  <input type="text" name="rt_rw" value="{{$default['rt_rw']}}" class="form-control {{$errors->has('rt_rw') ? 'is-invalid' : ''}}">
                  @if($errors->has('rt_rw'))
                    <div class="invalid-feedback">
                      {{ $errors->get('rt_rw')[0] }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Kelurahan</label>
                <div class="col-md-9">
                  <input type="text" name="kelurahan" value="{{$default['kelurahan']}}" class="form-control {{$errors->has('kelurahan') ? 'is-invalid' : ''}}">
                  @if($errors->has('kelurahan'))
                    <div class="invalid-feedback">
                      {{ $errors->get('kelurahan')[0] }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Kecamatan</label>
                <div class="col-md-9">
                  <input type="text" name="kecamatan" value="{{$default['kecamatan']}}" class="form-control {{$errors->has('kecamatan') ? 'is-invalid' : ''}}">
                  @if($errors->has('kecamatan'))
                    <div class="invalid-feedback">
                      {{ $errors->get('kecamatan')[0] }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Agama</label>
                <div class="col-md-9">
                  <input type="text" name="agama" value="{{$default['agama']}}" class="form-control {{$errors->has('agama') ? 'is-invalid' : ''}}">
                  @if($errors->has('agama'))
                    <div class="invalid-feedback">
                      {{ $errors->get('agama')[0] }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Status</label>
                <div class="col-md-9">
                  <select id="status" name="status" class="form-control">
                    <option value="" disabled selected></option>
                      <option @if($default['status'] == "belum kawin") selected @endif value="belum kawin">Belum Kawin</option>
                      <option @if($default['status'] == "kawin") selected @endif value="kawin">Kawin</option>
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Pekerjaan</label>
                <div class="col-md-9">
                  <input type="text" name="pekerjaan" value="{{$default['pekerjaan']}}" class="form-control {{$errors->has('pekerjaan') ? 'is-invalid' : ''}}">
                  @if($errors->has('pekerjaan'))
                    <div class="invalid-feedback">
                      {{ $errors->get('pekerjaan')[0] }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Kewarganegaraan</label>
                <div class="col-md-9">
                  <input type="text" name="kewarganegaraan" value="{{$default['kewarganegaraan']}}" class="form-control {{$errors->has('kewarganegaraan') ? 'is-invalid' : ''}}">
                  @if($errors->has('kewarganegaraan'))
                    <div class="invalid-feedback">
                      {{ $errors->get('kewarganegaraan')[0] }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Masa Berlaku</label>
                <div class="col-md-9">
                  <input type="date" value="{{$default['berlaku']}}" name="berlaku" class="form-control {{$errors->has('berlaku') ? 'is-invalid' : ''}}">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
              <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
              <a href="{{route('ktp.index')}}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
          </form>
        </div>
      </div>
      <!--/.col-->
    </div>
  </div>
@endsection

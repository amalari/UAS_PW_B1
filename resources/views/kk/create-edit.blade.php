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
    @include('partials.breadcrumb', ["breadcrumbs" => ["kk.index" => "Kartu Keluarga", "kk.create" => "Create"]])
  @else
    @include('partials.breadcrumb', ["breadcrumbs" => ["kk.index" => "Kartu Keluarga", "kk.edit" => "Edit"]])
  @endif
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <form action="{{$pageAs == 'create' ? route('kk.store') : route('kk.update', ['id' => $default['id']])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            @if ($pageAs == "edit")
              <input type="hidden" name="_method" value="PUT" />
            @endif
            <div class="card-header">
              <h4>{{ucwords($pageAs)}} Kartu Keluarga</h4>
            </div>
            <div class="card-body">
              @if (count($default['user_ids']) > 0)
                @foreach ($default['user_ids'] as $key => $user_id)
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">Nama</label>
                    <div class="col-md-6">
                      <select class="form-control" name="text">
                        <option disabled selected></option>
                        @foreach ($users as $user)
                          <option value="{{$user->id}}" @if ($loop->first) selected @endif>{{$user->name}}</option>
                          @endforeach
                        </select>
                        {{-- <input type="text" name="nik" value="{{$user_id}}" class="form-control {{$errors->has('user_id') ? 'is-invalid' : ''}}"> --}}
                      </div>
                      {{-- <div class="col-md-2">
                      <input type="text" name="nik" value="{{$user_id}}" class="form-control {{$errors->has('user_id') ? 'is-invalid' : ''}}">
                      @if($errors->has('nik'))
                      <div class="invalid-feedback">
                      {{ $errors->get('nik')[0] }}
                    </div>
                  @endif
                </div> --}}
                <div class="col-md-1">
                  <button type="button" class="btn btn-light"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            @endforeach
          @else
            <div class="form-group row">
              <label class="col-md-3 col-form-label" for="text-input">Nama</label>
              <div class="col-md-6">
                <input type="text" name="nik" value="{{$default['nik']}}" class="form-control {{$errors->has('nik') ? 'is-invalid' : ''}}">
                @if($errors->has('nik'))
                  <div class="invalid-feedback">
                    {{ $errors->get('nik')[0] }}
                  </div>
                @endif
              </div>
              <div class="col-md-2">
                <input type="text" name="nik" value="{{$default['nik']}}" class="form-control {{$errors->has('nik') ? 'is-invalid' : ''}}">
                @if($errors->has('nik'))
                  <div class="invalid-feedback">
                    {{ $errors->get('nik')[0] }}
                  </div>
                @endif
              </div>
              <div class="col-md-1">
                <button type="button" class="btn btn-light"><i class="fa fa-plus"></i></button>
              </div>
            </div>
          @endif

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
          <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
          <a href="{{route('kk.index')}}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
      </form>
    </div>
  </div>
  <!--/.col-->
</div>
</div>
@endsection

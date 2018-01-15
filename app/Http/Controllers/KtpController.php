<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ktp;
use DataTables;
use Illuminate\Routing\Route;

class KtpController extends Controller
{
  //
  public function __construct(Route $route)
  {
    $this->inputNames = ["nik", "nama", "tempat_lahir", "tgl_lahir", "alamat",
    "rt_rw", "kelurahan", "kecamatan", "status", "pekerjaan", "kewarganegaraan",
    "berlaku", "agama", "jenis_kelamin"];
  }

  public function index(){
    return view('ktp.index');
  }

  public function create()
  {
    //
    $pageAs = 'create';
    $default = $this->createEditDefiner($pageAs, $this->inputNames);
    return view('ktp.create-edit', compact('pageAs', 'default'));
  }

  public function edit($id)
  {
    //
    $pageAs = 'edit';
    $ktp = Ktp::find($id);
    $inputNames = $this->inputNames;
    $inputNames[] = 'id';

    $default = $this->createEditDefiner($pageAs, $inputNames, $ktp);
    return view('ktp.create-edit', compact('pageAs', 'default'));
  }

  public function update(Request $request, $id)
  {
    //
    $this->mapping('ktps', Ktp::find($id), $request)->save();

    return redirect(route("ktp.index"));
  }


  public function store(Request $request)
  {
    $this->mapping('ktps', new Ktp(), $request)->save();

    return redirect(route("ktp.index"));
  }

  public function show($id)
  {
    //
    $ktp = Ktp::find($id);

    return view('ktp.detail', compact('ktp'));
  }

  public function destroy($id)
  {
    //
    $ktp = Ktp::find($id);
    $ktp->delete();
    return redirect(route("ktp.index"));
  }

  public function dt(){
    $query = Ktp::query();
    $datatable = DataTables::eloquent($query);
    $datatable = $this->dtEditDelete($datatable, "ktp.edit", "ktp.destroy", "ktp.show");
    $datatable = $this->dtAddNumber($datatable);
    $datatable = $datatable->addColumn('ttl', function($data){
      return "{$data->tempat_lahir} , {$data->tgl_lahir}";
    })->addColumn('nikk', function($data){
      $ktp = Ktp::where('kk_id', $data->kk_id)->where('kepala_keluarga', true)->first();
      if($ktp){
        return $ktp->nik;
      } else {
        return "-";
      }
    });
    $datatable = $datatable->editColumn('alamat', function($data){
      return "{$data->alamat}, RT/RW {$data->rt_rw}, Kel {$data->kelurahan}, Kec {$data->kecamatan}";
    });

    return $datatable->toJson();
  }
}

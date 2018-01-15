<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Kk;
use App\Ktp;
use DataTables;

class KkController extends Controller
{
    //
    public function __construct(Route $route)
    {
      $this->inputNames = ["no_kk", "user_ids|[]"];
    }

    public function index(){
      return view('kk.index');
    }

    public function create()
    {
      //
      $pageAs = 'create';
      $default = $this->createEditDefiner($pageAs, $this->inputNames);
      dd($default);
      return view('kk.create-edit', compact('pageAs', 'default'));
    }

    public function dt(){
      $query = Kk::query();
      $datatable = DataTables::eloquent($query);
      $datatable = $this->dtEditDelete($datatable, "kk.edit", "kk.destroy", "kk.show");
      $datatable = $this->dtAddNumber($datatable);
      $datatable = $datatable->addColumn('kepala_keluarga', function($data){
        return Ktp::where('nik', $data->no_kk)->first()['nama'];
      });

      return $datatable->toJson();
    }

}

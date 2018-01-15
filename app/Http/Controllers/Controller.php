<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Schema;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $dtNumber = 0;

    protected function dtEditDelete($datatable, $routeEdit, $routeDelete, $routeDetail){
      return $datatable->addColumn('action', function($data) use ($routeEdit, $routeDelete, $routeDetail) {
        if($routeEdit){
          $editLink = route($routeEdit, ['id' => $data->id]);
          $editHtml = '<form method="get" class="form-edit" action="'.$editLink.'" accept-charset="UTF-8"><button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</button></form>';
        } else {
          $editHtml = '';
        }

        if($routeDelete){
          $deleteLink = route($routeDelete, ['id' => $data->id]);
          $deleteHtml = '<form method="POST" class="form-delete" action="'.$deleteLink.'" accept-charset="UTF-8">'.csrf_field().'<input name="_method" type="hidden" value="DELETE"><button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash-o"></i>&nbsp; Delete</button></form>';
        } else {
          $deleteHtml = '';
        }

        if($routeDetail){
          $detailLink = route($routeDetail, ['id' => $data->id]);
          $detailHtml = '<form method="get" class="form-detail" action="'.$detailLink.'" accept-charset="UTF-8"><button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i>&nbsp; Detail</button></form>';
        } else {
          $detailHtml = '';
        }
        return $detailHtml.$editHtml.$deleteHtml;
      })->rawColumns(['action']);
    }

    protected function dtDateFormat($datatable, $date = null, $datetime = null){
      if($date){
        foreach($date as $columnDate){
          $arrColumnDate = explode('.', $columnDate);
          $datatable = $datatable->editColumn($columnDate, function($data) use ($arrColumnDate) {
            $date = $data;
            foreach($arrColumnDate as $newColumnDate){
              $date = $date->{$newColumnDate};
            }
            if($date){
              return Carbon::createFromFormat(config('app.date'), $date)->formatLocalized('%e %B %Y');
            } else {
              return null;
            }
          });
        }
      }
      if($datetime){
        foreach($datetime as $columnDatetime){
          $arrColumnDatetime = explode('.', $columnDatetime);
          $datatable = $datatable->editColumn($columnDatetime, function($data) use ($arrColumnDatetime) {
            foreach($arrColumnDatetime as $newColumnDatetime){
              $date = $data->{$newColumnDatetime};
            }
            if($date){
              return Carbon::createFromFormat(config('app.datetime'), $date)->formatLocalized('%e %B %Y %R');
            } else {
              return null;
            }
          });
        }
      }
      return $datatable;
    }

    protected function dtAddNumber($datatables){
      return $datatables->addColumn('no', function ($data){
        $this->dtNumber += 1;
        return $this->dtNumber;
      });
    }

    protected function mapping($table, $model, $request){
      $columns = Schema::getColumnListing($table);
      foreach($columns as $column){
        if($request->input($column) !== null){
          $model[$column] = $request->input($column);
        } else {
          if($column == "created_by"){
            $model[$column] = Auth::user()->id;
          }
          // if($column == "approved_by"){
          //   $model[$column] = Auth::user()->id;
          // }
          // if($column == "approved_date"){
          //   $model[$column] = Carbon::now();
          // }
        }
      }
      return $model;
    }

    public function createEditDefiner($pageAs, $inputNames, $data = null, $filters = null){
      if($pageAs == 'create'){
        foreach($inputNames as $inputName){
          if(strpos($inputName, "|") !== false){
            $arrayName = explode('|', $inputName);
            if(strpos($inputName, "null") !== false) {
              $defaultValue = null;
            }
            elseif(strpos($inputName, "[]") !== false) {
              $defaultValue = [];
            } else {
              $defaultValue = $arrayName[1];
            }
            $originalName = explode('|', $inputName)[0] ;
          } else {
            $defaultValue = '';
            $originalName = $inputName ;
          }
          $default[$originalName] = old($originalName, $defaultValue);
        }
      } else {
        foreach($inputNames as $inputName){
          if(strpos($inputName, "|") !== false){
            $originalName = explode('|', $inputName)[0] ;
          } else {
            $originalName = $inputName ;
          }
          $defaultValue = $data[$originalName];
          if($filters){
            if(array_key_exist($originalName, $filters)){
              $defaultValue = $filters[$originalName]($data[$originalName]);
            }
          }
          $default[$originalName] = old($originalName, $defaultValue);
        }
      }

      return $default;
    }

}

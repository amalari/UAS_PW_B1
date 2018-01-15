<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
Route::group(['as' => 'ktp.'],function (){
  Route::resource('ktp', 'KtpController', [
    'names' => [
      'index' => 'index',
      'create' => 'create',
      'store' => 'store',
      'show' => 'show',
      'edit' => 'edit',
      'update' => 'update',
      'destroy' => 'destroy'
    ],
  ]);
});

// Route::group(['as' => 'kk.'], function(){
//   Route::resource('kk', 'KkController', [
//     'names' => [
//       'index' => 'index',
//       'create' => 'create',
//       'store' => 'store',
//       'show' => 'show',
//       'edit' => 'edit',
//       'update' => 'update',
//       'destroy' => 'destroy'
//     ],
//   ]);
// });


Route::group(['prefix' => 'dt'], function (){
  Route::post("ktp", "KtpController@dt");
  // Route::post("kk", "KkController@dt");
});

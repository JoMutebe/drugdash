<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api','cors']], function () {
	Route::get('test', function () {
        return [];
    });
      
});
Route::post('get_medicines','Api\ApiController@get_medicines');
Route::post('get_healthcenters','Api\ApiController@get_healthcenters');
Route::post('get_healthcenter','Api\ApiController@get_heatlcenter');
Route::post('get_district_information');  
Route::post('get_token','Api\TokenController@get_token');
Route::post('create_account','Api\TokenController@create_account');
Route::post('create_issue','Api\ApiController@report_issue');
Route::post('create_stockchange','Api\ApiController@report_on_item');
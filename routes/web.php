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

Route::get('/','Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('districts','DistrictController');
Route::get('/get_districts', 'DistrictController@get_districts');

Route::resource('counties','CountyController');
Route::get('/get_counties','CountyController@get_counties');

Route::resource('subcounties','SubcountyController');
Route::get('/get_subcounties','SubcountyController@get_subcounties');

Route::resource('parishes','ParishController');
Route::get('/get_parishes','ParishController@get_parishes');

Route::resource('villages','VillageController');
Route::get('/get_villages','VillageController@get_villages');

Route::resource('healthfacilities','HealthcenterController');
Route::get('/get_healthfacilities','HealthcenterController@get_healthfacilities');

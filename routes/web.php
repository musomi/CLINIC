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

Route::model('User_category','category');
Route::model('User','user');
Route::model('Mykey','mykeys');
Route::model('Patient','patient');
Route::model('Treatment','treatment');


Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('/UserCategories', 'UserCategory@index');
Route::post('/UserCategory/store', 'UserCategory@store');
Route::get('/EditCategory/{category}', 'UserCategory@edit');
Route::post('/EditCategory/{category}/update', 'UserCategory@update');
Route::get('/EditCategory/{category}/trash', 'UserCategory@trash');
Route::get('/EditCategory/{category}/restore', 'UserCategory@restore');
Route::get('/EditCategory/{category}/destroy', 'UserCategory@destroy');
Route::get('/EditCategory/{category_permission_id}/destroyperm', 'UserCategory@destroyperm');


Route::post('/User', 'UserController@store');
Route::get('/UserProfile/{user}', 'UserController@edit');
Route::post('/UserProfile/{user}', 'UserController@update');
Route::post('/UserProfile/ChangeCategory/{user}', 'UserController@ChangeCategory');
Route::get('/ManageAdmins', 'UserController@showAdmins');
Route::get('/ManageAdmins/{id}/trash', 'UserController@trash');   //For all users
Route::get('/ManageAdmins/{id}/restore', 'UserController@restore');
Route::get('/ManageAdmins/{id}/destroy', 'UserController@destroy');
Route::post('/ManageAdmins', 'UserController@search');
Route::get('/View/{user}/Clients', 'UserController@showClients');


Route::get('/Patients', 'PatientsController@index');
Route::get('/AllPatients', 'PatientsController@showAll');
Route::post('/AllPatients/search', 'PatientsController@search');
Route::get('/NewPatient', 'PatientsController@create');
Route::post('/NewPatient', 'PatientsController@store');
Route::get('/Patient/{patient}/clear', 'PatientsController@clear');
Route::get('/Patient/{patient}/restore', 'PatientsController@restore');
Route::get('/Patient/{patient}/profile', 'PatientsController@profile');
Route::get('/Patient/{treatment}/treatment', 'PatientsController@treatmentprofile');


Route::get('/diagnos/{key_id}/patient', 'TreatmentController@index');
Route::post('/diagnos/{mykey_id}/patient', 'TreatmentController@update');
Route::get('/test/{mykeys}/patient', 'TreatmentController@testpatient');

Route::get('/medication/{mykeys}/patient', 'MedicationController@create');
Route::post('/medication/{mykeys}/patient', 'MedicationController@store');
Route::get('/medicate/{patient}/patient', 'MedicationController@show');
Route::post('/medicate/{patient}/patient', 'MedicationController@update');


Route::post('/test/{test_id}/patient', 'TestController@update');


Route::get('/Patient/{patient}/Invoice', 'PatientsController@invoice');
Route::get('//PrintPatient/{patient}/Invoice', 'PatientsController@printinvoice');


Route::get('/test', 'HomeController@test');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

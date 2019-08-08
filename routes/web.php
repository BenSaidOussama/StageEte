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

Route::get('/createClient', function () {
    return view('create');
});
Route::POST('/actioncreate','ClientContoller@createClient');
Route::POST('/editServer','serverController@EditServer');
Route::POST('/saveUpdate','serverController@saveUpdate');
Route::put('/delete/Client/{id_c}/Server/{id_s}/{id}','LparController@delete');
Route::put('/edit/Client/{id_c}/Server/{id_s}/{id}','LparController@edit');
Route::post('/NewServer/Client/{id}','ServerController@NewServer');
Route::post('/editServer/{id}','ServerController@EditServer');
Route::post('/createServer','ServerController@createServer');
Route::get('/f', function () {
    return view('First');
});
Route::get('/addTemplate', function () {
    return view('New_Template');
});
Route::get('/choix', function () {
    return view('choice');
});
Route::put('/addTemplate/Client/{id}','TemplateController@Gotoadd');
Route::get('/delete/{id}','ServerController@deleteServer');


Route::get('/editServer/{id}','ServerController@EditServer');

Route::get('/saveUpdate',function(){
    return view('ViewClient_Server_lpars');
});

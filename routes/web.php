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
Route::get('/template1', function () {
    return view('First');
});
Route::get('/', function () {
    return view('create');
});
Route::get('/view_client', function () {
    return view('view_client');
});
Route::get('/table', function () {
    return view('welcome');
});
Route::post('/actioncreate','ClientController@createClient');
Route::post('/editServer/{id}','ServerController@EditServer');
Route::get('/editServer/{id}','ServerController@EditServer');

Route::post('/saveUpdate/server/{id_s}','ServerController@saveUpdate');
Route::get('/saveUpdate',function(){
    return view('ViewClient_Server_lpars');
});
Route::post('/NewServer/Client/{id}','ServerController@NewServer');
Route::post('/createServer','ServerController@createServer');
Route::get('/ok', function () {
    return view('template');
});
Route::post('/template','ClientController@ReadClients');
Route::put('/delete/Client/{id_c}/Server/{id_s}/{id}','LparController@delete');
Route::put('/edit/Client/{id_c}/Server/{id_s}/{id}','LparController@edit');
Route::put('/addTemplate/Client/{id}','TemplateController@Gotoadd');
Route::post('/delete/{id}','ServerController@deleteServer');


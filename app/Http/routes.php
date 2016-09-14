<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
/*
|--------------------------------------------------------------------------
| Application Routes Users
|--------------------------------------------------------------------------
*/
//list user
Route::get('/users', [
    'as' => 'users',
    'uses' => 'UserController@index',
    'middleware' => 'roles',
    'roles' => ['Admin'],
]);
//create user
Route::get('/users/create', [
    'uses' => 'UserController@create',
    'as' => 'user.create',
    'middleware' => 'roles',
    'roles' => ['Admin'],
]);
Route::get('/users/export', [
    'uses' => 'UserController@export',
    'as' => 'user.export',
    'middleware' => 'roles',
    'roles' => ['Admin'],
]);
Route::get('/users/import', [
    'uses' => 'UserController@view_import',
    'as' => 'user.viewimport',
    'middleware' => 'roles',
    'roles' => ['Admin'],
]);
Route::post('/users/import', [
    'uses' => 'UserController@import',
    'as' => 'user.import',
    'middleware' => 'roles',
    'roles' => ['Admin'],
]);

Route::post('/users/create', [
    'uses' => 'UserController@store',
    'as' => 'user.store',
    'middleware' => 'roles',
    'roles' => ['Admin'],

]);
//Gan quyen truy cap
Route::post('/users/assignroles', [
    'uses' => 'UserController@assignRoles',
    'as' => 'user.assignroles',
    'middleware' => 'roles',
    'roles' => ['Admin'],
]);
//view thong tin update user
Route::get('/users/{id_user}', [
    'uses' => 'UserController@edit',
    'as' => 'user.update',
    'middleware' => 'roles',
    'roles' => ['Admin'],
])->where(['id_user', '[0-9]+']);
//update user
Route::patch('/users/{id_user}', [
    'uses' => 'UserController@update',
    'as' => 'user.update',
    'middleware' => 'roles',
    'roles' => ['Admin'],
]);
//xoa user
Route::delete('/users/{id_user}', [
    'uses' => 'UserController@destroy',
    'as' => 'user.destroy',
    'middleware' => 'roles',
    'roles' => ['Admin'],
]);
//reset password user
Route::post('/users/{id_user}', [
    'uses' => 'UserController@resetpassword',
    'as' => 'user.resetpassword',
    'middleware' => 'roles',
    'roles' => ['Admin'],
]);
/*
|--------------------------------------------------------------------------
| Application Routes Donvis (đơn vị)
|--------------------------------------------------------------------------
*/
Route::get('/donvi', [
    'uses' => 'DonviController@donvi_index',
    'as' => 'donvi.list',
]);
Route::get('/donvi/create', [
    'uses' => 'DonviController@donvi_create',
    'as' => 'donvi.create',
]);
Route::post('/donvi/create', [
    'uses' => 'DonviController@donvi_store',
    'as' => 'donvi.store',
]);
//xoa donvi
Route::delete('/donvi/{id}', [
    'uses' => 'DonviController@donvi_destroy',
    'as' => 'donvi.destroy',
]);
Route::get('/donvi/{id}', [
    'uses' => 'DonviController@donvi_edit',
    'as' => 'donvi.edit',
]);
Route::patch('/donvi/{id}', [
    'uses' => 'DonviController@donvi_update',
    'as' => 'donvi.update',
]);
/*
|--------------------------------------------------------------------------
| Application Routes Donvis (bưu cục)
|--------------------------------------------------------------------------
*/

Route::get('/buucuc', [
    'uses' => 'DonviController@buucuc_index',
    'as' => 'buucuc.list',
]);
Route::get('/buucuc/create', [
    'uses' => 'DonviController@buucuc_create',
    'as' => 'buucuc.create',
]);
Route::post('/buucuc/create', [
    'uses' => 'DonviController@buucuc_store',
    'as' => 'buucuc.store',
]);
//xoa buu cuc
Route::delete('/buucuc/{id}', [
    'uses' => 'DonviController@buucuc_destroy',
    'as' => 'buucuc.destroy',
]);
Route::get('/buucuc/{id}', [
    'uses' => 'DonviController@buucuc_edit',
    'as' => 'buucuc.edit'
]);
Route::patch('/buucuc/{id}', [
    'uses' => 'DonviController@buucuc_update',
    'as' => 'buucuc.update'
]);
/*
|--------------------------------------------------------------------------
| Application Routes Loaibuugui
|--------------------------------------------------------------------------
*/
Route::get('/loaihoadon', [
    'uses' => 'LoaihoadonController@index',
    'as' => 'loaihoadon.list',
]);
Route::get('/loaihoadon/create', [
    'uses' => 'LoaihoadonController@create',
    'as' => 'loaihoadon.create',
]);
Route::post('/loaihoadon/create', [
    'uses' => 'LoaihoadonController@store',
    'as' => 'loaihoadon.store',
]);
Route::get('/loaihoadon/{id}', [
    'uses' => 'LoaihoadonController@edit',
    'as' => 'loaihoadon.edit',
]);
Route::patch('/loaihoadon/{id}', [
    'uses' => 'LoaihoadonController@update',
    'as' => 'loaihoadon.update',
]);
Route::delete('/loaihoadon/{id}', [
    'uses' => 'LoaihoadonController@destroy',
    'as' => 'loaihoadon.destroy',
]);
/*
|--------------------------------------------------------------------------
| Application Routes Giao nhận
|--------------------------------------------------------------------------
*/
Route::get('/giaonhan', [
    'uses' => 'GiaonhanController@index',
    'as' => 'giaonhans',
]);
Route::get('/giaonhan/create', [
    'uses' => 'GiaonhanController@create',
    'as' => 'giaonhan.create',
]);
Route::post('/giaonhan/create', [
    'uses' => 'GiaonhanController@store',
    'as' => 'giaonhan.store',
]);
Route::get('/giaonhan/accept', [
    'uses' => 'GiaonhanController@checkaccept',
    'as' => 'giaonhan.checkaccept',
]);
Route::post('/giaonhan/accept',[
    'uses'=>'GiaonhanController@accept',
    'as'=>'giaonhan.accept',
]);
Route::post('/giaonhan/deny',[
    'uses'=>'GiaonhanController@deny',
    'as'=>'giaonhan.deny',
]);
/*
|--------------------------------------------------------------------------
| Application Routes Ajax
|--------------------------------------------------------------------------
*/
//lấy danh sách người dùng theo đơn vị
Route::get('ajaxUser', function (Request $request) {
    $id_donvi = $request::input(['id_donvi']);
    $users = \App\User::where('donvi_id', $id_donvi)
        ->where('id', '<>', Auth::user()->id)
        ->get();
    return Response::json($users);
});

/*
|--------------------------------------------------------------------------
| Application Routes home
|--------------------------------------------------------------------------
*/
Route::get('/home', 'HomeController@index');

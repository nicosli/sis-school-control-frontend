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

use App\Htpp\Controllers\ModulosController;

Route::get('/', 'ModulosController@inicio')->middleware('auth.api');
Route::get('/add/person', 'PersonController@add')->middleware('auth.api');

Route::post('/auth', 'ModulosController@auth');
Route::get('/logout', 'ModulosController@logout');
Route::get('/login', function () {
    return view('login');
});

View::composer(['menu'], function($view){
    $view->with('menuHtml', session()->get('menuHtml'));
});
View::composer(['template.app'], function($view){
    $timestamp_token = (float)(session()->get('token_api')->expires_in_timestamp / 1000);
    $timestamp_token = date('Y-m-d H:i:s', $timestamp_token - 18000);
    $view->with('access_token',  session()->get('access_token'))->with('timestamp_token', $timestamp_token);
});

Route::group(['prefix' => 'Usuarios', 'middleware' => ['auth.api']], function() {
    Route::get('/Administrativo', 'PersonController@administrative');
    Route::get('/Docente', 'PersonController@teaching');
    Route::get('/Tutores', 'PersonController@guardian');
    Route::get('/Padres', 'PersonController@parent');
    Route::get('/Estudiante', 'PersonController@student');
});
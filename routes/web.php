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

Route::post('/auth', 'ModulosController@auth');
Route::get('/logout', 'ModulosController@logout');
Route::get('/login', function () {
    return view('login');
});

View::composer(['menu', 'paginas.diagonales'], function($view)
{
    $view->with('menuPerson', session()->get('menuPerson'));
});
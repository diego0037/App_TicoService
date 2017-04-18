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



Route::get('/', function () {
    return view('PaginasWeb.busqueda', ['name' => session('name')]);
});

Route::get('/user/activation/{token}',
'UserController@userActivation');


// Route::get('registro', function(){
//       return view('PaginasWeb.registro');
// });
//
// Route::get('login2', function(){
//       return view('PaginasWeb.login');
// });

Route::get('busqueda', function(){
      return view('PaginasWeb.busqueda');
});

Route::get('collaborator', function(){
      return view('PaginasWeb.colaborador');
});

Route::get('registroServicio', function(){
      return view('PaginasWeb.registroServicio', ['token' => session('token')]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

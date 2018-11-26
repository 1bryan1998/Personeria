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
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('home', 'HomeController@Añadirevento')->name('Añadirevento');
    Route::resource('User','UserController');
    Route::get('perfil','UserController@perfil')->name('perfil');
    Route::get('Adminprocesos','NuevoprocesoController@Adminprocesos')->name('Adminprocesos');
    Route::post('Agregarproceso/{id}','NuevoprocesoController@Agregarproceso')->name('Agregarproceso');
    Route::get('Consultasadmin','ConsultasController@Consultasadmin')->name('Consultasadmin');



    Route::get('Nuevoproceso/{id}','NuevoprocesoController@Nuevoproceso')->name('Nuevoproceso');



    Route::resource('nuevoproceso','NuevoprocesoController');
    Route::resource('nuevaconsulta','ConsultasController');

});



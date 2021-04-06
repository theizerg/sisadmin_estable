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

/*Route::get('/', function () {
    return view('test');
});
*/

Auth::routes();

Route::middleware(['auth',])->group(function () {

  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/index', 'HomeController@index2');
  Route::get('user-autocomplete', 'UserController@autocomplete');

  Route::resource('user', 'UserController');
  Route::resource('logins', 'LoginController');
  Route::resource('permission', 'PermissionController');
  Route::resource('roles', 'RolesController');

  /*********************************************************/
  /******************Modulo de administracion**************/
  /*******************************************************/
   Route::resource('pastor', 'PastorController');
   Route::get('pastor/{pastor_id}/iglesia', 'PastorController@iglesia');
   Route::post('iglesia', 'PastorController@guardar');
   Route::resource('imprimir', 'ImprimirController');
   Route::resource('iglesias', 'IglesiasController');
   Route::get('documentos/{iglesia_id}', 'IglesiasController@documentos');
   Route::resource('documento', 'DocumentosController');
   Route::get('documento', 'DocumentosController@documento');
   Route::resource('actividades', 'ActividadesController');

 /*******************************************************/
/*******************************************************/

 Route::DELETE('/notificaciones/borrar/{notificacion_id}', 'HomeController@borrarNotificacion')->name('borrarNotificacion');


});

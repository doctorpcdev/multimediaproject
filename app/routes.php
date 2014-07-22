<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('inicio');
});

Route::get('blog', function(){
	$articulos = Articulo::all();
	return View::make('blog.blog', array( 'articulos' => $articulos));
});




/*usuarios*/
Route::get('login', array('uses' => 'UsuariosController@viewLogin'));//mestra el login
Route::post('usuarios/register', array('uses' => 'UsuariosController@register'));// se registra el usuario en la BD
Route::get('registrar', array('uses' => 'UsuariosController@viewRegister'));//muestra el form de registro
Route::post('usuarios/validar', array('uses'=> 'UsuariosController@validateLogin'));// se valida en usuario
Route::get('usuarios/logout', array('uses'=> 'UsuariosController@getLogout'));
Route::get('usuarios/perfil/{id?}', array('uses' => 'UsuariosController@perfil'));



/*articulos */


Route::get('articulo/create', array('uses' => 'ArticulosController@create'));
Route::post('articulo/guardar', array('uses' => 'ArticulosController@guardar'));
Route::get('articulo/ver/{id?}', array('uses' => 'ArticulosController@show'));


/*COMENTARIOS*/
Route::post('comentario/guardar', array('uses' => 'ComentariosController@guardar'));
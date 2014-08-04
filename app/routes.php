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
	$articulos = Articulo::orderBy('id', 'DESC')->get();
	return View::make('blog.blog', array( 'articulos' => $articulos));
});

Route::get('jinotega', function(){
	return View::make('departamentos.jinotega');
});




/*usuarios*/
Route::get('login', array('uses' => 'UsuariosController@viewLogin'));//mestra el login
Route::post('usuarios/register', array('uses' => 'UsuariosController@register'));// se registra el usuario en la BD
Route::get('registrar', array('uses' => 'UsuariosController@viewRegister'));//muestra el form de registro
Route::post('usuarios/validar', array('uses'=> 'UsuariosController@validateLogin'));// se valida en usuario
Route::get('usuarios/logout', array('uses'=> 'UsuariosController@getLogout'));
Route::get('usuarios/perfil/{id?}', array('uses' => 'UsuariosController@perfil'));
Route::post('usuario/actualizar/{id?}', array('uses'=> 'UsuariosController@update'));//actualiza la informacion del usuario



/*articulos */


Route::get('articulo/create', array('uses' => 'ArticulosController@create'));
Route::post('articulo/guardar', array('uses' => 'ArticulosController@guardar'));
Route::get('articulo/ver/{id?}', array('uses' => 'ArticulosController@show'));
Route::post('articulo/editar/{id}', array('uses' => 'ArticulosController@edit'));//modifica el articulo
Route::get('articulo/edit/{id}', array('uses' => 'ArticulosController@showedit'));//muestra form de articulo


/*FAVORITOS*/

Route::get('add/favorito/{id}', array('uses' => 'FavoritosController@add'));
Route::get('del/favorito/{id}', array('uses' => 'FavoritosController@del'));

//disabled



/*COMENTARIOS*/
Route::post('comentario/guardar', array('uses' => 'ComentariosController@guardar'));
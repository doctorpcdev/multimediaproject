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
	$articulos = Articulo::where('enable',1)->orderBy('id', 'DESC')->paginate(6);
	return View::make('blog.blog', array( 'articulos' => $articulos));
});
Route::get('AcercaDe', function(){
	return View::make('informacion.acercade');
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
Route::get('articulo/del/{id}', array('uses' => 'ArticulosController@delete'));

Route::get('articulo/hab/{id}', array('uses' => 'ArticulosController@hab'));
Route::get('articulo/des/{id}', array('uses' => 'ArticulosController@des'));

Route::get('articulo/tag/{nombre}', array('uses' => 'ArticulosController@tag'));


Route::get('articulo/like/{articulo}/{usuario}', array('uses' => 'ArticulosController@like'));
Route::get('articulo/dislike/{articulo}/{usuario}', array('uses' => 'ArticulosController@dislike'));





/*FAVORITOS*/

Route::get('add/favorito/{id}', array('uses' => 'FavoritosController@add'));
Route::get('del/favorito/{id}', array('uses' => 'FavoritosController@del'));

//disabled



/*COMENTARIOS*/
Route::post('comentario/guardar', array('uses' => 'ComentariosController@guardar'));
Route::get('del/comentario/{id}', array('uses' => 'ComentariosController@del'));


/*contacto*/

Route::post('contacto/send', array('uses' => 'MensajesController@send'));

/*ADMIN*/


Route::group(array('before' => 'auth'), function()
{
	Route::get('administrador',array("before" => "roles:0,login", function(){
		return View::make('admin');
	}));

	Route::get('administrador/Articulos', function(){
		$articulos = Articulo::all();
		return View::make('administrador.articulosadmin')->with('articulos', $articulos);
	});

	Route::get('administrador/Mensajes', function(){
		$mensajes = Mensaje::all();
		return View::make('administrador.mensajes')->with('mensajes', $mensajes);
	});

	Route::get('administrador/Mensajes/{id}', array('uses' => 'MensajesController@show'));
	Route::post('administrador/Mensajes/{id}', array('uses' => 'MensajesController@sendEmail'));

	Route::get('administrador/anuncios/Jinotega', function(){
		$anuncios = Anuncio::where('departamento', '=', 'Jinotega')->get();
		return View::make('administrador.jinotega')->with('anuncios', $anuncios);
	});
	Route::get('administrador/anuncios/Matagalpa', function(){
		$anuncios = Anuncio::where('departamento', '=', 'Matagalpa')->get();
		return View::make('administrador.matagalpa')->with('anuncios', $anuncios);
	});
	Route::get('administrador/anuncios/Carazo', function(){
		$anuncios = Anuncio::where('departamento', '=', 'Carazo')->get();
		return View::make('administrador.carazo')->with('anuncios', $anuncios);
	});
	Route::get('administrador/anuncios/Esteli', function(){
		$anuncios = Anuncio::where('departamento', '=', 'Esteli')->get();
		return View::make('administrador.esteli')->with('anuncios', $anuncios);
	});


	Route::post('administrador/usuarios/register', array('uses' => 'UsuariosController@registeradmin'));// se registra el usuario en la BD


	Route::post('administrador/anuncios/create', array('uses' => 'AnunciosController@add'));//agrego el articulo
	Route::get('administrador/anuncio/edit/{id}', array('uses' => 'AnunciosController@viewedit'));
	Route::post('administrador/anuncio/edit/{id}', array('uses' => 'AnunciosController@update'));//modifico el articulo
	Route::get('administrador/anuncio/del/{id}', array('uses' => 'AnunciosController@delete'));


	Route::get('administrador/Festividades', function(){
		$festividades = Festividad::all();
		return View::make('administrador.festividadesadmin')->with('festividades', $festividades);
	});
	Route::get('administrador/Usuarios', function(){
		$usuarios = User::all();
		//$usuarios = User::where('role_id', '=', 1)->get();	
		return View::make('administrador.usuariosadmin')->with('usuarios', $usuarios);
	});
	
	/*festividad*/

	Route::post('administrador/festividad/edit/{id}', array('uses' => 'FestividadesController@update'));//modifico el articulo
});
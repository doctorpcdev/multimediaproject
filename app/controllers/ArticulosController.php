<?php

class ArticulosController extends BaseController {

	public function create(){
		return View::make('blog.createarticulo');
	}

	public function guardar(){
		if(Input::get()){
			if($this->validateForm(Input::all()) === true){
				$articulo = new Articulo();
				$articulo->titulo = Input::get('titulo');
				$articulo->body = Input::get('cuerpo');
				$articulo->tag = Input::get('tag');
				$articulo->usuario_id = Input::get('user');	

				if($articulo->save()){
					Session::flash('message', 'Articulo Agregado Con Exito');
					return Redirect::to('blog');
				}

			}else{
				return Redirect::to('articulo/create')->withErrors($this->validateForm(Input::all()))->withInput();
			}
		}else{
			return View::make('blog.blog');
		}
	}

	public function show($id){
		$articulo = Articulo::find($id);
		return View::make('blog.show')->with('articulo', $articulo);
	}

	private function validateForm($inputs = array()){
		$rules = array(
			'titulo' => 'required|unique:articulos',
			'cuerpo' => 'required',
			'tag' => 'required'
			);

		$message = array(
			'required' => 'el campo :attribute es requerido',
			'unique' => 'el titulo ya existe'
			);

		$validation = Validator::make($inputs, $rules, $message);

		if($validation->fails()){
			return $validation;
		}else{
			 return true;
		}
	}
}

?>
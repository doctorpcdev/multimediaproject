<?php

class ArticulosController extends BaseController {
	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create(){
		return View::make('blog.createarticulo');
	}

	/**
	 * [guardar description]
	 * @return [type] [description]
	 */
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

	/**
	 * [show description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show($id){
		$articulo = Articulo::find($id);
		return View::make('blog.show')->with('articulo', $articulo);
	}

	/**
	 * [showedit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */	
	public function showedit($id){
		$articulo = Articulo::find($id);

		return View::make('blog.edit')->with('articulo', $articulo);
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id){
		if(Input::get()){
			$articulo = Articulo::find($id);
			if($this->validateFormUp(Input::all()) === true){				
					$articulo->titulo = Input::get('titulo');
					$articulo->body = Input::get('cuerpo');
					$articulo->tag = Input::get('tag');
					
					if($articulo->save()){
						Session::flash('message', 'Articulo Modificado con Exito');
						return Redirect::back();
					}

			}else{
				return Redirect::back()->withErrors($this->validateForm(Input::all()))->withInput();
			}
		}else{
			return View::make('blog.blog');
		}
	}

	/**
	 * [validateForm description]
	 * @param  array  $inputs [description]
	 * @return [type]         [description]
	 */
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

	private function validateFormUp($inputs = array()){
		$rules = array(
			'titulo' => 'required',
			'cuerpo' => 'required',
			'tag' => 'required'
			);

		$message = array(
			'required' => 'el campo :attribute es requerido'			
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
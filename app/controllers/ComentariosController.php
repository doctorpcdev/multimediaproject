<?php 

	
class ComentariosController extends BaseController {

	/**
	 * [guardar description]
	 * @return [type] [description]
	 */
	public function guardar(){
		if(Input::get()){
			if($this->ValidateForm(Input::all()) === true ){
				$comentario = new Comentario();
				$comentario->comentario = Input::get('comentario');
				$comentario->articulo_id = Input::get('articulo');
				$comentario->usuario_id = Input::get('usuario');

				if($comentario->save()){
					Session::flash('message', 'Comentario Agregado Con Exito');
					return Redirect::back();
				}

			}else{
				return Redirect::to('articulo/create')->withErrors($this->validateForm(Input::all()))->withInput();
			}
		}else{
			return View::make('blog.blog');
		}
	}

	public function del($id){

		$comentario = Comentario::find($id);

		$comentario->delete();

		return Redirect::back();
	}

	/**
	 * [ValidateForm description]
	 * @param array $inputs [description]
	 */
	private function ValidateForm($inputs = array()){
		$rules = array(
			'comentario' => 'required'
			);
		$message = array(
			'required' => 'el :attribute es requerido'
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
<?php 

	
class AnunciosController extends BaseController {
	/**
	 * [add description]
	 */
	public function add(){
		if($this->validateForms(Input::all()) === true){
			$file = 'noImg.jpg';
			$anuncio = new Anuncio();
			$anuncio->nombre = Input::get('nombre');
			$anuncio->direccion = Input::get('direccion');
			$anuncio->descripcion = Input::get('descripcion');		

			$file = Input::file("archivo")->getClientOriginalName(); 
     	
			if(file_exists("img/" . $_FILES["archivo"]["name"])){
				$file = Input::file("archivo")->getClientOriginalName(); 	
			}else{
				move_uploaded_file($_FILES["archivo"]["tmp_name"], "img/" . $_FILES["archivo"]["name"]);
			}		
			
			$anuncio->ruta = $file;
			$anuncio->departamento = Input::get('departamento');
			$anuncio->tipo = Input::get('tipo');	

			if($anuncio->save()){					
				Session::flash('message', 'Anuncio agregado');
				return Redirect::back();
			}

		}else{
			return Redirect::back()->withErrors($this->validateForms(Input::all()))->withInput();
		}
	}


	/**
	 * [viewedit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function viewedit($id){
		$anuncio = Anuncio::find($id);
		return View::make('administrador.anuncioupdate')->with('anuncio', $anuncio);
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($id){
		$anuncio = Anuncio::find($id);
		if($this->validateFormsUp(Input::all()) === true){
			$file = 'noImg.jpg';			
			$anuncio->nombre = Input::get('nombre');
			$anuncio->direccion = Input::get('direccion');
			$anuncio->descripcion = Input::get('descripcion');		

			$file = Input::file("archivo")->getClientOriginalName(); 
     	
			if(file_exists("img/" . $_FILES["archivo"]["name"])){
				$file = Input::file("archivo")->getClientOriginalName(); 	
			}else{
				move_uploaded_file($_FILES["archivo"]["tmp_name"], "img/" . $_FILES["archivo"]["name"]);
			}		
			
			$anuncio->ruta = $file;
			$anuncio->departamento = Input::get('departamento');
			$anuncio->tipo = Input::get('tipo');	

			if($anuncio->save()){					
				Session::flash('message', 'Anuncio Modificado');
				return Redirect::back();
			}

		}else{
			return Redirect::back()->withErrors($this->validateFormsUp(Input::all()))->withInput();
		}
	}

	public function delete($id){
		$anuncio = Anuncio::find($id);

		$anuncio->delete();
		Session::flash('message', 'Anuncio Eliminado');
		return Redirect::back();
	}


	/**
	 * [validateForms description]
	 * @param  array  $inputs [description]
	 * @return [type]         [description]
	 */
	private function validateForms($inputs = array()){
		$rules = array(
			'nombre' => 'required|min:2',
			'direccion' => 'required|min:4',
			'descripcion' => 'required',			
			'archivo' => 'required',
			'departamento' => 'required'
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',
			'unique' => 'El :attribute ya esta en uso'
			);
		$validate = Validator::make($inputs, $rules, $message);

		if($validate->fails()){
			return $validate;
		}else{
			return true;
		}
	}

	private function validateFormsUp($inputs = array()){
		$rules = array(
			'nombre' => 'required|min:2',
			'direccion' => 'required|min:4',
			'descripcion' => 'required',
			'departamento' => 'required'
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',
			'unique' => 'El :attribute ya esta en uso'
			);
		$validate = Validator::make($inputs, $rules, $message);

		if($validate->fails()){
			return $validate;
		}else{
			return true;
		}
	}
}
?>
<?php 

	
class FestividadesController extends BaseController {

	public function update($id){
		$festividad = Festividad::find($id);
		if($this->ValidateForm(Input::all()) === true ){

			$file = Input::file("archivo")->getClientOriginalName(); 
     	
			if(file_exists("img/" . $_FILES["archivo"]["name"])){
				$file = Input::file("archivo")->getClientOriginalName(); 	
			}else{
				move_uploaded_file($_FILES["archivo"]["tmp_name"], "img/" . $_FILES["archivo"]["name"]);
			}

			$festividad->ruta = $file;

			if($festividad->save()){
				Session::flash('message', 'Festividad Agregado Con Exito');
				return Redirect::back();
			}
		}else{
			return Redirect::back()->withErrors($this->ValidateForm(Input::all()))->withInput();
		}
	}

	/**
	 * [ValidateForm description]
	 * @param array $inputs [description]
	 */
	private function ValidateForm($inputs = array()){
		$rules = array(
			'archivo' => 'required'
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
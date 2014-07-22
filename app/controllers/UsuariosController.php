<?php

class UsuariosController extends BaseController {
	/**
	 * muestra el formulario de login para iniciar secion
	 * @return [View]
	 */
	public function viewLogin(){
		return View::make('usuarios.login');
	}

	/**
	 * guarda el usuario en la BD
	 * @return [type]
	 */
	public function register(){
		if(Input::get()){
			$inputs = $this->getInputs(Input::all());
			if($this->validateForms($inputs) === true){
				$user = new User();
				$user->nombre = Input::get('nombre');
				$user->email = Input::get('email');
				$user->username = Input::get('username');				
				$user->password = Hash::make(Input::get('password'));
				$user->pregunta = Input::get('respuesta');

				if($user->save()){
					Session::flash('message', 'Usuario Registrado con exito, ya puede ingresar');
					return Redirect::to('login');
				}
			}else{
				return Redirect::to('registrar')->withErrors($this->validateForms($inputs))->withInput();
			}
		}else{
			return View::make('usuarios.login');
		}
	}

	/**
	 * muestra el formulario de registro de usuario
	 * @return [type]
	 */
	public function viewRegister(){
		return View::make('usuarios.create');
	}


	/**
	 * valida el login con el username y password
	 * @return [type]
	 */
	public function validateLogin(){
		if($this->validateFormsLogin(Input::all()) === true){
			$userdata = array(
				'username' =>Input::get('username'),
				'password' =>Input::get('password')
				);

			if(Auth::attempt($userdata)){
				return Redirect::to('/blog');
			}else{
				Session::flash('message', 'Error al iniciar session');
				return Redirect::to('login');
			}
		}else{
			return Redirect::to('login')->withErrors($this->validateFormsLogin(Input::all()))->withInput();		
		}				
	}

	/**
	 * cierra session
	 * @return [type]
	 */
	public function getLogout(){
		Auth::logout();
		return Redirect::to('blog');
	}

	public function perfil($id){
		$usuario = User::find($id);
		return View::make('usuarios.perfil')->with('usuario', $usuario);;
	}

	/**
	 * obtiene los inputs 
	 * @param  array  $inputs
	 * @return [type]
	 */
	private function getInputs($inputs = array()){
		foreach ($inputs as $key => $value) {
			$inputs[$key] = $value;
		}
		return $inputs;
	}
	

	private function validateForms($inputs = array()){
		$rules = array(
			'nombre' => 'required|min:2',
			'username' => 'unique:usuarios|required|min:4',			
			'password' => 'confirmed|required|between:6,12',
			'password_confirmation' => 'required|between:6,12',
			'respuesta' => 'required',
			'email' => 'required'
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

	private function validateFormsLogin($inputs = array()){
		$rules = array(			
			'username' => 'required',			
			'password' => 'required',			
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',			
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
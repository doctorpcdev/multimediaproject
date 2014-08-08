<?php

class MensajesController extends BaseController {
	
	public function send(){
		if($this->validateForm(Input::all()) === true){
			$mensaje = new Mensaje();
			$mensaje->nombre = Input::get('nombre');
			$mensaje->email = Input::get('email');
			$mensaje->comentario = Input::get('comentario');
			$mensaje->telefono = Input::get('telefono');
			$mensaje->leido = 0;	

			if($mensaje->save()){
				Session::flash('message', 'Mensaje Enviado, gracias');
				return Redirect::back();
			}
		}else{
			return Redirect::back()->withErrors($this->ValidateForm(Input::all()))->withInput();
		}
	}
	/**
	 * [show description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show($id)
	{
       $mensaje = Mensaje::find($id);	
       if($mensaje->leido == 0)	{
       		$mensaje->leido = 1;//mensaje leido
       		$mensaje->save();
       }
       return View::make('administrador.show', array('mensaje' => $mensaje));       
	}


	/**
	 * [destroy description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function destroy($id)
	{
		$mensaje = Mensaje::find($id);
		$mensaje->delete();

		Session::flash('message', 'Mensaje Eliminada');
		return Redirect::to('/administrador/mensajes');
	}

	/**
	 * [sendEmail description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function sendEmail($id){		
		$data = Input::get('data');
		$mensaje = Mensaje::find($id);


		Mail::send('emailSend', array('data'=>Input::get('data')), function($message) use ($mensaje){
        $message->to($mensaje->email , $mensaje->nombre)->subject('Respuesta NicaTour');
    	});

		Session::flash('message', 'Mensaje Enviado');
		return Redirect::back();
	}

	private function ValidateForm($inputs = array()){
		$rules = array(
			'nombre' => 'required',
			'email' => 'required',
			'comentario' => 'required',
			'nombre' => 'required',
			'telefono' => 'required'
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
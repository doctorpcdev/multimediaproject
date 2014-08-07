<?php namespace Fojuth\Plupload\Controllers;

 use \Illuminate\Routing\Controller;
	/**
	* 
	*/
class Imagenes_ArticulosController extends BaseController{
		
	public function upload{
		if (true === isset($_GET['upload_handler'])) {
	      $handler = (string) str_replace('::', '\\', $_GET['upload_handler']);
	      
	      $class_name = \Config::get('plupload::plupload.upload_handler_'.$handler);
	    }
	    else {
	      $class_name = \Config::get('plupload::plupload.upload_handler');
	    }

	    $this->upload_handler = new $class_name;

	    // The upload handler must implement a specific interface
	    if (false === $this->upload_handler instanceof \Fojuth\Plupload\UploadHandlerInterface) {
	      throw new \LogicException('The upload handler must implement the \Fojuth\Plupload\UploadHandlerInterface interface.');
	    }


	    // All looks fine, we start the upload
	    return $this->upload_handler->upload(\Input::file('file'));
	}
}	
 ?>
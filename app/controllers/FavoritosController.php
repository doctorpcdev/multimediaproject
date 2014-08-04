<?php  

class FavoritosController extends BaseController{

	public function add($id){

		$favorito = new Favorito();
		$favorito->usuario_id = Auth::user()->id;
		$favorito->articulo_id = $id;

		if($favorito->save()){
			Session::flash('message', 'Articulo Agregado a Favorito :D');
			return Redirect::to('blog');
		}else{
			Session::flash('message', 'ERROR!! :(');
			return Redirect::to('blog');
		}
	}

	public function del($id){
		$favorito = Favorito::find($id);
		$favorito->delete();

		Session::flash('message', 'Articulo Eliminado :(');
		return Redirect::back();
	}

}

?>
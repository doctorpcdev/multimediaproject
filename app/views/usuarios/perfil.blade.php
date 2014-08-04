@extends('templates.blogtemplate')
@section('contenido')

	<div class="container perfil">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li class="active"><a href="#info" role="tab" data-toggle="tab">Informacion</a></li> 
		  <li><a href="#post" role="tab" data-toggle="tab">Post</a></li>
		  <li><a href="#fav" role="tab" data-toggle="tab">Favoritos</a></li>
		</ul>


		<div class="tab-content">
			<div class="tab-pane fade in active" id="info">
			 	@if(Session::has('message'))
				  <div class="alert alert-info">{{ Session::get('message') }}</div>
				@endif
			  	<div class="row">
			  		<div class="col-md-2 col-xs-3">
			  			<img src="{{ asset('img/foto.jpg') }}" class="img-responsive">
			  		</div>
			  		<div class="col-md-7 col-xs-7">
			  			<h2>{{ $usuario->username }}</h2>
			  			<p class="nombre">{{ $usuario->nombre }}</p>
			  			<p>{{ $usuario->email }}</p>
			  		</div>
			  	</div>

				@if(Auth::check())
					@if(Auth::user()->id == $usuario->id)
						<div class="actualizarinfo">
							<div class="alert alert-info" role="alert">
								<strong>Actualiza tu Informacion</strong>
							</div>

							{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
							{{ Form::open(array('url' => 'usuario/actualizar/'. $usuario->id, 'files' => true, 'class' => 'form-horizontal')) }}
								<div class="form-group">
									{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-4 control-label')) }}
									<div class="col-sm-7">
										{{ Form::text('nombre', Input::old('nombre') ? Input::old(): $usuario->nombre, array('class' => 'form-control', 'placeholder'=> $usuario->nombre)) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('email', 'Email', array('class' => 'col-sm-4 control-label')) }}
									<div class="col-sm-7">
										{{ Form::text('email', Input::old('email') ? Input::old(): $usuario->email, array('class' => 'form-control', 'placeholder'=> $usuario->email)) }}	
									</div>
								</div>									
								<div class="form-group">
									{{ Form::label('password', 'Contraseña', array('class' => 'col-sm-4 control-label')) }}
									<div class="col-sm-7">
										{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'password')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('password_confirmation', 'Confirmar Contraseña', array('class' => 'col-sm-4 control-label')) }}
									<div class="col-sm-7">
										{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=> 'confirmar password')) }}	
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('pregunta', 'Pregunta Secreta', array('class' => 'col-sm-4 control-label')) }}
									<div class="col-sm-7">
										<select class="form-control">
										  <option>Cual es el nombre de su primer mascota?</option>
										  <option>El nombre de su mama?</option>
										  <option>otra pregunta</option>
										  <option>otra pregunta</option>						
										</select>
									</div>
								</div>
								<div class="form-group">
									{{ Form::label('respuesta', 'Respuesta Secreta', array('class' => 'col-sm-4 control-label')) }}
									<div class="col-sm-7">
										{{ Form::text('respuesta', Input::old('respuesta') ? Input::old(): $usuario->pregunta, array('class' => 'form-control', 'placeholder'=> $usuario->pregunta)) }}	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										{{ Form::submit('Actualizar' , array('class'=> 'btn btn-primary')) }}
									</div>	
								</div>
							{{ Form::close() }}



						</div>
					@endif

				@endif
		  	</div> 
		  	{{-- End info --}}


		  	<div class="tab-pane fade" id="post">
			  	<?php $post = Articulo::where('usuario_id', '=', $usuario->id)->get(); ?>
			  	<div class="table-responsive">
			  		<table class="table table-hover">
			  			<thead>
							<tr>
								<td>Titulo</td>
								<td>Comentarios</td>
								<td>Tag</td>
								<td>Fecha</td>	
								@if(Auth::check())
									@if(Auth::user()->id == $usuario->id)
										<td>Editar</td>
									@endif
								@endif												
							</tr>
						</thead>
						<tbody>
							@foreach($post as $value)				  	
								<tr>
									<td><a href="{{ URL::to('articulo/ver/'. $value->id .'') }}">{{ $value->titulo }}</a></td>
									<?php $count = Comentario::where('articulo_id', "=", $value->id)->count(); ?>
									<td>{{ $count}}</td>
									<td>{{ $value->tag }}</td>
									<td>{{ $value->created_at }}</td>
									@if(Auth::check())
										@if(Auth::user()->id == $usuario->id)
											<td>
												<a href="{{ URL::to('articulo/edit/' . $value->id) }}" class="btn btn-small btn-success">Editar Articulo</a>
											</td>
										@endif
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>			  		
			  	</div>			  	
			 </div>
				
			{{-- end post --}}	


			<div class="tab-pane fade" id="fav">
				
				<?php $favoritos = Favorito::where('usuario_id', '=' , $usuario->id)->get(); ?>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<td>Titulo</td>
								<td>Comentarios</td>
								<td>Tag</td>
								<td>Fecha</td>	
								@if(Auth::check())
									@if(Auth::user()->id == $usuario->id)
										<td>Eliminar</td>
									@endif
								@endif												
							</tr>
						</thead>
							@foreach($favoritos as $value)				  	
								<tr>
									<?php $articulo = DB::table('articulos')->where('id', $value->articulo_id)->first(); ?>
									<td><a href="{{ URL::to('articulo/ver/'. $articulo->id .'') }}">{{ $articulo->titulo }}</a></td>
									<?php $count = Comentario::where('articulo_id', "=", $value->id)->count(); ?>
									<td>{{ $count}}</td>
									<td>{{ $articulo->tag }}</td>
									<td>{{ $articulo->created_at }}</td>
									@if(Auth::check())
										@if(Auth::user()->id == $usuario->id)
											<td>
												<a href="{{ URL::to('del/favorito/' . $value->id) }}" class="btn btn-small btn-warning">Borrar de Favoritos :(</a>
											</td>
										@endif
									@endif								
								</tr>
							@endforeach
						</tbody>
					</table>	
				</div>


			</div>

			{{-- end fav --}}	
		</div>
	</div>
@stop
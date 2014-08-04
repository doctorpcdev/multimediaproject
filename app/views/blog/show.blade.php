@extends('templates.blogtemplate')
@section('contenido')

<div class="container showarticulo">
	<h2 class="titul">{{ $articulo->titulo }}</h2> 
	<p class="descripcion">{{ $articulo->body }}</p> 
	<div class="divider"></div>
	
	<div class="comentarios">
		@if(Auth::check())
			{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
			{{ Form::open(array('url' => 'comentario/guardar', 'class' => 'form-horizontal')) }}
				<div class="form-group">
					{{ Form::label('comentario', 'Comentario', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-8">
						{{ Form::textarea('comentario', Input::old('comentario'), array('class' => 'form-control')) }}	
					</div>
					<input type="hidden" name="articulo"  value="{{ $articulo->id }}">			
					<input type="hidden" name="usuario"  value="{{ Auth::user()->id }}">
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{{ Form::submit('Agregar Comentario' , array('class'=> 'btn btn-success')) }}
					</div>	
				</div>
			{{ Form::close() }}
		@endif
		<?php $count = Comentario::where('articulo_id', "=", $articulo->id)->count(); ?>
		<h3>{{ $count }} comentarios</h3>

		<?php $comentarios = DB::table('comentarios')->where('articulo_id', '=', $articulo->id )->orderBy('id', 'DESC')->get(); ?>
		@foreach($comentarios as $value)
			<div class="comentario">
				<div class="row">
					<div class="col-md-2 col-xs-4">
						<img src="{{ asset('img/foto.jpg') }}" class="avatar img-responsive">
					</div>
					<div class="col-md-6 col-xs-6">
						<?php $usuario = User::find($value->usuario_id) ?>
						<h4 class"user"><a href="{{ URL::to('usuarios/perfil/'. $usuario->id .'') }}">{{ $usuario->username }}</a></h4>
						<p> {{ $value->comentario }} </p>
					</div>
				</div>		
			</div>	
		@endforeach	
		@if(Auth::check())
		@else
			<div class="noregister">
				<p>Solo Usuarios registrados pueden comentar :(</p>
				<p>Registrate <a href="{{ URL::to('registrar') }}">AQUI</a> y podras hacerlo :D </p>
			</div>
		@endif
	</div>
	
</div>
@stop
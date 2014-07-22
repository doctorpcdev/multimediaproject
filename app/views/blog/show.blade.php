@extends('templates.blogtemplate')
@section('contenido')

<div class="container">
	<h2>Titulo: <span>{{ $articulo->titulo }}</span></h2> 
	<h2>Descripcion:</h2> 
	<span>{{ $articulo->body }}</span>
	<hr>
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
	<h3>comenatarios</h3>
	<?php $comentarios = DB::table('comentarios')->where('articulo_id', '=', $articulo->id )->get() ?>
	@foreach($comentarios as $value)
		<?php $usuario = User::find($value->usuario_id) ?>
		<p>{{ $value->comentario }} <span>usuario: {{ $usuario->username }}</span></p>
	@endforeach	

	
</div>
@stop
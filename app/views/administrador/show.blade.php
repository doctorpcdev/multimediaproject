@extends('templates.admintemplate')
@section('titulo')
	 <h1 class="page-header">Mensajes</h1>
@stop

@section('contenido')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
	
	<div>	

	<div class="coment">
		<h1>Comentario</h1>
		<p style="text-align:center; font-size: 1.2em; border-bottom: 2px solid black; margin-bottom: 2em">{{ $mensaje->comentario }}</p>
	</div>

	{{ Form::open(array('url' => 'administrador/Mensajes/'.$mensaje->id, 'class' => 'form-horizontal')) }}	

	<div class="form-group">
		{{ Form::label('data', 'Descripcion', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-6">
			{{ Form::textarea('data', Input::old('data'), array('class' => 'form-control', 'placeholder'=> 'Descripcion del mensaje')) }}	
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Enviar Mensaje' , array('class'=> 'btn btn-primary')) }}
		</div>	
	</div>	
	{{ Form::close() }}

</div>
@stop
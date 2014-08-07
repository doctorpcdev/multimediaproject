@extends('templates.admintemplate')
@section('titulo')
	 <h1 class="page-header">Modificar Anuncio</h1>
@stop

@section('contenido')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div>
	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

	{{ Form::open(array('url' => 'administrador/anuncio/edit/' . $anuncio->id , 'files' => true, 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('nombre', Input::old('nombre') ? Input::old(): $anuncio->nombre, array('class' => 'form-control', 'placeholder'=> 'Nombre del Anuncio')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('direccion', 'Direccion', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::textarea('direccion', Input::old('direccion') ? Input::old(): $anuncio->direccion, array('class' => 'form-control', 'placeholder'=> 'Direccion del Anuncio')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('descripcion', 'Descripcion', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::textarea('descripcion', Input::old('descripcion') ? Input::old(): $anuncio->descripcion, array('class' => 'form-control', 'placeholder'=> 'Descripcion del Anuncio')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('ruta', 'Imagen', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::file('archivo') }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('departamento', 'Departamento', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('departamento', Input::old('departamento') ? Input::old('departamento') : $anuncio->departamento, array('class' => 'form-control', 'id' => 'disabledInput', 'placeholder'=> 'Departamento del Anuncio')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('tipo', 'Tipo de Anuncio', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				<select class="form-control" name="tipo">
					<option value='Restaurante'> Restaurante</option>
					<option value='Hoteles'> Hoteles</option>
					<option value='Deporte'> Deporte</option>
				</select>
			</div>
		</div>
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Modificar Anuncio' , array('class'=> 'btn btn-success')) }}
			</div>	
		</div>	
	{{ Form::close() }}
</div>


@stop
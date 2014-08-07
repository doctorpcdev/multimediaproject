@extends('templates.admintemplate')
@section('titulo')
	 <h1 class="page-header">Anuncios Matagalpa</h1>
@stop

@section('contenido')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="adminanuncios">
	
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#viewAnuncio" data-toggle="tab">Ver todos</a></li>
	  <li><a href="#addArticulo" data-toggle="tab">Agregar</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade in active" id="viewAnuncio">
			<div class="table-responsive">
				<table class="table table-hover">
		  			<thead>
						<tr>
							<td>Nombre</td>
							<td>Direccion</td>
							<td>Descripcion</td>
							<td>Ruta</td>
							<td>Departamento</td>						
						</tr>
					</thead>
					<tbody>
						@foreach($anuncios as $value)
							<tr>
								<td> {{ $value->nombre }} </td>
								<td> {{ $value->direccion }} </td>
								<td> {{ $value->descripcion }} </td>
								<td> {{ $value->ruta }} </td>
								<td> {{ $value->departamento }} </td>

								<td>									
									<a href="{{ URL::to('administrador/anuncio/edit/' . $value->id) }}" class="btn btn-small btn-success">Editar Anuncio</a>
									<a href="{{ URL::to('administrador/anuncio/del/' . $value->id) }}" class="btn btn-small btn-danger">Borrar Anuncio</a>
								</td>

							</tr>
						@endforeach
					</tbody>
				</table>
			</div>	
		</div>
		<div class="tab-pane fade" id="addArticulo" style="margin-top: 20px">

			{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

			{{ Form::open(array('url' => 'administrador/anuncios/create', 'files' => true, 'class' => 'form-horizontal')) }}
				<div class="form-group">
					{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-6">
						{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre del Anuncio')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('direccion', 'Direccion', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-6">
						{{ Form::textarea('direccion', Input::old('direccion'), array('class' => 'form-control', 'placeholder'=> 'Direccion del Anuncio')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('descripcion', 'Descripcion', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-6">
						{{ Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control', 'placeholder'=> 'Descripcion del Anuncio')) }}	
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
						{{ Form::text('departamento', Input::old('departamento') ? Input::old('departamento') : 'Matagalpa', array('class' => 'form-control', 'id' => 'disabledInput', 'placeholder'=> 'Departamento del Anuncio')) }}	
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
						{{ Form::submit('Agregar Anuncio' , array('class'=> 'btn btn-success')) }}
					</div>	
				</div>	
			{{ Form::close() }}
		</div>
	</div>	
</div>

@stop
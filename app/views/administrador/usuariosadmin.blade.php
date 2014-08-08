@extends('templates.admintemplate')
@section('titulo')
	 <h1 class="page-header">Usuarios Registrados</h1>
@stop

@section('contenido')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Email</td>
				<td>Username</td>								
				<td>Borrar</td>															
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $value)
				@if($value->role_id == 1)
					<tr>
						<td>{{$value->nombre}}</td>					
						<td>{{$value->email}}</td>					
						<td><a href="{{ URL::to('usuarios/perfil/'. $value->id .'') }}">{{ $value->username }}</a></td>	
						<td>
							<a href="#" class="btn btn-small btn-danger">Borrar Usuario</a>
						</td>			
						
					</tr>
				@endif	
			@endforeach
		</tbody>
	</table>
</div>


<h1 class="page-header">Administradores</h1>

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Email</td>
				<td>Username</td>										
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $value)
				@if($value->role_id == 0)
					<tr>
						<td>{{$value->nombre}}</td>					
						<td>{{$value->email}}</td>					
						<td><a href="{{ URL::to('usuarios/perfil/'. $value->id .'') }}">{{ $value->username }}</a></td>	
					</tr>
				@endif	
			@endforeach
		</tbody>
	</table>
</div>



 <h1 class="page-header">Agregar Usuario</h1>

 	<div>
 		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

			{{ Form::open(array('url' => 'administrador/usuarios/register', 'files' => true, 'class' => 'form-horizontal')) }}

				<div class="form-group">
					{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Username')) }}	
					</div>
				</div>			
				<div class="form-group">
					{{ Form::label('password', 'Contraseña', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'password')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('password_confirmation', 'Confirmar Contraseña', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=> 'confirmar password')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('pregunta', 'Pregunta Secreta', array('class' => 'col-sm-2 control-label')) }}
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
					{{ Form::label('respuesta', 'Respuesta Secreta', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('respuesta', Input::old('respuesta'), array('class' => 'form-control', 'placeholder'=> 'Respuesta Secreta')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('imagen', 'Seleccionar Avatar', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-7">
						{{ Form::file('archivo') }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('rol', 'Rol', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-6">
						<select class="form-control" name="rol">
							<option value='0'> Administrador </option>
							<option value='1'> Bloguero </option>							
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{{ Form::submit('Registrarse' , array('class'=> 'btn btn-primary')) }}
					</div>	
				</div>
				

			{{ Form::close() }}
</div>			

@stop
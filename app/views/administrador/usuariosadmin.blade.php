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
				<tr>
					<td>{{$value->nombre}}</td>					
					<td>{{$value->email}}</td>					
					<td><a href="{{ URL::to('usuarios/perfil/'. $value->id .'') }}">{{ $value->username }}</a></td>	
					<td>
						<a href="#" class="btn btn-small btn-danger">Borrar Usuario</a>
					</td>			
					
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop
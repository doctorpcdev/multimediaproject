@extends('templates.admintemplate')
@section('titulo')
	 <h1 class="page-header">Mensajes</h1>
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
					<td>Comentario</td>
					<td>Telefono</td>
					<td>Leido</td>						
				</tr>
			</thead>
			<tbody>
				@foreach($mensajes as $value)
					@if($value->leido == 0)
						<tr class="info">
					@else						
						<tr>
					@endif
					
						<td> {{ $value->nombre }} </td>
						<td> {{ $value->email }} </td>
						<td> {{ $value->comentario }} </td>
						<td> {{ $value->telefono }} </td>
						@if($value->leido == 0)
							<td>No Leido</td>
						@else
							<td>Leido</td>
						@endif	

						<td>									
							<a href="{{ URL::to('administrador/Mensajes/' . $value->id) }}" class="btn btn-small btn-success">Responder</a>
							<a href="{{ URL::to('administrador/anuncio/del/' . $value->id) }}" class="btn btn-small btn-danger">Borrar</a>
						</td>

					</tr>
				@endforeach
			</tbody>
		</table>
	</div>	


@stop
@extends('templates.admintemplate')
@section('titulo')
	 <h1 class="page-header">Articulos</h1>
@stop

@section('contenido')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<td>Titulo</td>
					<td>Comentarios</td>
					<td>Autor</td>
					<td>Fecha</td>
					<td>Estado</td>						
					<td>Borrar</td>															
				</tr>
			</thead>
			<tbody>
				@foreach($articulos as $value)
					<tr>
						<td><a href="{{ URL::to('articulo/ver/'. $value->id .'') }}">{{$value->titulo}}</a></td>
						<?php $count = Comentario::where('articulo_id', "=", $value->id)->count(); ?>
						<td>{{ $count}}</td>
						<?php $usuario = DB::table('usuarios')->where('id', $value->usuario_id)->first(); ?>
						<td><a href="{{ URL::to('usuarios/perfil/'. $usuario->id .'') }}">{{ $usuario->username }}</a></td>
						<td>{{ $value->created_at }}</td>
						<td>
							@if($value->enable == 1){{-- habilitado --}}
								<a href="{{ URL::to('articulo/des/' . $value->id) }}" class="btn btn-small btn-default">Desabilitar</a>
							@else
								<a href="{{ URL::to('articulo/hab/' . $value->id) }}" class="btn btn-small btn-success">Habilitar</a>
							@endif
						</td>
						<td>
							<a href="{{ URL::to('articulo/del/' . $value->id) }}" class="btn btn-small btn-warning">Borrar articulo</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop


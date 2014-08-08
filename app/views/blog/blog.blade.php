@extends('templates.blogtemplate')
@section('contenido')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@foreach($articulos as $value)
	<article class="post">
		<?php $user = User::find( $value->usuario_id) ?>
		<div class="descripcion">
			<figure class="imagen">
				<img src="{{ asset('img/'. $user->avatar .'') }}" />
			</figure>
			<div class="detalles">
				<h2 class="titulo">
					<a href="{{ URL::to('articulo/ver/'. $value->id .'') }}">{{ $value->titulo }}</a>
				</h2>
				<p class="autor">
					<?php $user = User::find( $value->usuario_id) ?>
					por <a href="{{ URL::to('usuarios/perfil/'. $user->id .'') }}"> {{ $user->username }} </a>
				</p>
				<a class="tag" href="{{ URL::to('articulo/tag/'. $value->tag .'') }}">{{ $value-> tag}}</a>
				<p class="fecha">hace <strong>20</strong> min</p>
			</div>
		</div>
		<div class="acciones">
			<div class="votos">
			@if(Auth::check())
				<?php $votos = Voto::where('usuario_id', Auth::user()->id)->get() ?>
				@if($votos->count() >= 0)					
					<a class="up" href="{{ URL::to('articulo/like/'. $value->id . '/' . $user->id .'') }}"></a>
					<span class="total">{{ $value->votos}}</span>				
					<a class="down" href="{{ URL::to('articulo/dislike/'. $value->id . '/' . $user->id .'') }}"></a>									
				@else
					@foreach($votos as $like)
						@if($like->articulo_id == $value->id)
							<a class="up likedesable" href="#"></a>
							<span class="total">{{ $value->votos}}</span>				
							<a class="down" href="{{ URL::to('articulo/dislike/'. $value->id . '/' . $user->id .'') }}"></a>
						@endif	
					@endforeach						
				@endif
			@endif	
			</div>
			<div class="datos">
				<a class="comentarios" href="{{ URL::to('articulo/ver/'. $value->id .'') }}">
					<?php $count = Comentario::where('articulo_id', "=", $value->id)->count(); ?>
					{{ $count }}
				</a>
				@if(Auth::check())
					<a class="estrellita" href="{{ URL::to('add/favorito/' . $value->id .'') }}"></a>
				@else
					<a class="estrellitaroja" href="#"></a>
				@endif
				
			</div>
		</div>
	</article>	
@endforeach	
{{	$articulos->links()	}}
@stop


<!--select * from articulos where id_usuario = usuario id-->
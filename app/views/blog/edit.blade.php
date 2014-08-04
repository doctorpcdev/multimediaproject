@extends('templates.blogtemplate')
@section('contenido')
	<div class="container articulo" data-stellar-background-ratio="0.5">
		@if(Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		@if(Auth::check())
			@if(Auth::user()->id == $articulo->usuario_id)				
				{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
				{{ Form::open(array('url' => 'articulo/editar/'. $articulo->id, 'files' => true, 'class' => 'form-horizontal')) }}
					<div class="form-group">
						{{ Form::label('titulo', 'Titulo', array('class' => 'col-sm-2 control-label')) }}
						<div class="col-sm-6">
							{{ Form::text('titulo', Input::old('titulo') ? Input::old(): $articulo->titulo, array('class' => 'form-control', 'placeholder'=> 'Titulo del articulo')) }}	
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('cuerpo', 'Cuerpo del articulo', array('class' => 'col-sm-2 control-label')) }}
						<div class="col-sm-8">
							{{ Form::textarea('cuerpo', Input::old('cuerpo') ? Input::old(): $articulo->body, array('class' => 'form-control')) }}	
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('tag', 'Tag', array('class' => 'col-sm-2 control-label')) }}
						<div class="col-sm-6">
							{{ Form::text('tag', Input::old('tag') ? Input::old(): $articulo->tag, array('class' => 'form-control', 'placeholder'=> 'Tag')) }}	
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('imagen', 'Agregar Imagen', array('class' => 'col-sm-2 control-label')) }}
						<div class="col-sm-6">
							{{ Form::file('archivo') }}
						</div>
					</div>
						<input name="user" type="hidden" value="{{ Auth::user()->id }}">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							{{ Form::submit('Modificar Articulo' , array('class'=> 'btn btn-success')) }}
						</div>	
					</div>
				{{ Form::close() }}
			@else
				<h2>No tiene permiso para editar este articulo</h2>	
			@endif
		@endif

	</div>

@stop

@section('js')
<script type="text/javascript">
	$.stellar({
	  horizontalOffset: 100,
	  verticalOffset: 150
	});
</script>
@stop
@extends('templates.blogtemplate')
@section('contenido')


<div class="container articulo" data-stellar-background-ratio="0.5">
	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
	{{ Form::open(array('url' => '/articulo/guardar', 'files' => true, 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{{ Form::label('titulo', 'Titulo', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-8">
				{{ Form::text('titulo', Input::old('titulo'), array('class' => 'form-control', 'placeholder'=> 'Titulo del articulo')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('cuerpo', 'Cuerpo del articulo', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-8">
				{{ Form::textarea('cuerpo', Input::old('cuerpo'), array('class' => 'form-control')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('tag', 'Tag', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-8">
				{{ Form::text('tag', Input::old('tag'), array('class' => 'form-control', 'placeholder'=> 'Tag')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('imagen', 'Agregar Imagen', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-8">
				{{ Form::file('archivo') }}
			</div>
		</div>
			<input name="user" type="hidden" value="{{ Auth::user()->id }}">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Agregar Articulo' , array('class'=> 'btn btn-success')) }}
			</div>	
		</div>
	{{ Form::close() }}
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
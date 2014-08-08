@extends('templates.admintemplate')
@section('titulo')
	 <h1 class="page-header">Festividades</h1>
@stop

@section('contenido')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

	<div>
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#jinotega" data-toggle="tab">Jinotega</a></li>
		  <li><a href="#matagalpa" data-toggle="tab">Matagalpa</a></li>
		  <li><a href="#carazo" data-toggle="tab">Carazo</a></li>
		  <li><a href="#esteli" data-toggle="tab">Esteli</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade in active" id="jinotega">
				@foreach($festividades as $value)
					@if($value->departamento == 'Jinotega')
						<img src="{{ asset('img/'. $value->ruta .'') }}" class="img-responsive">
					@endif
				@endforeach
			</div>
			<div class="tab-pane fade in active" id="matagalpa">
				@foreach($festividades as $value)
					@if($value->departamento == 'Matagalpa')
						<img src="{{ asset('img/'. $value->ruta .'') }}" class="img-responsive">
					@endif
				@endforeach
			</div>
			<div class="tab-pane fade in active" id="carazo">
				@foreach($festividades as $value)
					@if($value->departamento == 'Carazo')
						<img src="{{ asset('img/'. $value->ruta .'') }}" class="img-responsive">
					@endif
				@endforeach
			</div>
			<div class="tab-pane fade in active" id="esteli">				
				@foreach($festividades as $value)
					@if($value->departamento == 'Esteli')
						<img src="{{ asset('img/'. $value->ruta .'') }}" class="img-responsive">
					@endif
				@endforeach
			</div>
		</div>
	</div>

@stop
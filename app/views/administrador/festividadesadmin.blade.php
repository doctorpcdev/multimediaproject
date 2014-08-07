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
				<?php 
					$jinotega = DB::table('festividades')->where('departamento', 'Jinotega')->first();					

				 ?>
				<img src="{{ asset('img/'. $jinotega->ruta .'') }}" class="img-responsive">
				
			</div>
			<div class="tab-pane fade in active" id="matagalpa">
				
			</div>
			<div class="tab-pane fade in active" id="carazo">
				
			</div>
			<div class="tab-pane fade in active" id="esteli">				
			
			</div>
		</div>
	</div>

@stop
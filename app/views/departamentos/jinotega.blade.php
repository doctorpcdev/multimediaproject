@extends('templates.departamentostemplate')
@section('titulo')
	Jinotega
@stop
@section('slider')
	<div class="item active">
	    <img src="img/cocosyplaya.jpg" class="sliderImg slider img-responsive">   
	    <div class="titulSlideimg">
	        <h2>Bilwi, Puerto Cabezas</h2>
	    </div>             
	</div>
	<div class="item">
		<img src="img/Chinandega.jpg" class="sliderImg slider img-responsive">    
		<div class="titulSlideimg">
			<h2>Chinandega, Corinto</h2>
		</div>           
	</div>
	<div class="item">
	    <img src="img/sanjuganSlider2.jpg" class="sliderImg slider img-responsive">
		<div class="titulSlideimg">
			<h2>San Juan del sur</h2>
		</div>
	</div> 
@stop

@section('anuncios')
	<div class="col-md-7">
	    <div class="cuadrado nica col-xs-3 col-md-12">
	    	<a href="">Hoteles</a>
	    </div>
		<div class="cuadrado about col-xs-3 col-md-12">
			<a href="">Restaurantes</a>
		</div>
		<div class="cuadrado explo col-xs-3 col-md-12">
			<a href="">Traslado</a>
		</div>
		<div class="cuadrado plani col-xs-3 col-md-12">
		 	<a href="">Gasolineras</a>
		</div>
	</div>	
	
	<div class="col-md-5 col-xs-12">
		aqui va la imagen
	</div>
@stop

@section('informacionizquierda')
	<div>
	   	<h2>Tu Destino</h2>
	    <img src="img/mapaNic.jpg" class="img-responsive">
	  	</div>
	<div>
	    <h2>Intur Nicaragua</h2>
	    <iframe src="//www.youtube.com/embed/9t3XTxfOdp8"></iframe>
	</div>
	<div>
	   	<h2>NicaraguaTour</h2>
	   	<iframe src="//www.youtube.com/embed/UsOUVzr7MAg"></iframe>
	</div>
	<!--Ruben Dario  -->
	<div class="ruben">
		<h2>Principe de las Letras Castellanas</h2>
		<img src="img/ruben.jpg" class="img-responsive">
	</div>
@stop
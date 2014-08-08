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
<div class="anunciostitul">
	<h2>Necesitas Ayuda?</h2>             
</div>
<div class="row">
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

@section('infodepto')  
	<div>
		<h1 class="titul">Historia</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>   
	<div>
		<h1 class="titul">Cultura</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>  
@stop    

        
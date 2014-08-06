@extends('templates.maintemplate')

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


@section('segundoslider')
	<div><h3><img src="img/gastronomia.jpg"></h3><span>Gastronomía</span></div>
	<div><h3><img src="img/bailes.jpg"></h3><span>Danzas Típicas</span></div>
	<div><h3><img src="img/artesanias.jpg"></h3><span>Artesanías</span></div>
	<div><h3><img src="img/leyendas.jpg"></h3><span>Leyendas</span></div>
	<div><h3><img src="img/perhisto.jpg"></h3><span>Personajes Historico</span></div>
	<div><h3><img src="img/tesorocolo.jpg"></h3><span>Tesoros Coloniales</span></div>  
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

@section('clima')
	<h2>Estado del Clima</h2>
	<!-- www.TuTiempo.net - Ancho:603px - Alto:197px -->
	<div id="TT_RxngLxtBYMSQKL1KjfuDzzjDDsnl1KrFbtEt1siIKkj"></div>
	<script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_RxngLxtBYMSQKL1KjfuDzzjDDsnl1KrFbtEt1siIKkj">
	</script>
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


@section('calendario')
	<img src="img/calendario.png" class="img-responsive">
@stop
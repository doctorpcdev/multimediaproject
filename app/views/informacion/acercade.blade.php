@extends('templates.departamentostemplate')
@section('titulo')
	Acerca De
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

@section('infodepto')  
	<div>
		<h1 class="titul">Misión</h1>
		<p>Fortalecer información de lugares turísticos en Nicaragua, captando así a nuestros visitantes motivados por la belleza de la naturaleza, la protección y conservación del medio ambiente, nuestra historia,  cultura, tradiciones. Compartiendo aventura y brindando servicios turísticos de calidad.</p>
	</div>   
	<div>
		<h1 class="titul">Visión</h1>
		<p>Ser reconocidos como una guía de turismo en desarrollo, brindando servicios de calidad a turistas nacionales y extranjeros. Promover el turismo en Nicaragua, ayudando al cuido de las áreas protegidas para un mejor atractivo turístico del país.</p>
	</div>  
@stop

@section('otrainfo')
	<div class="desarrolladores">
		<div class="row">
			<div class="col-md-3">
				<div class="info">
					<img src="img/foto.jpg" class="img-circle">	
					<div class="yo">Norwin Guerreo | <span>Web Developer</span></div>
					<p>acerca de mi</p>
					<div class="social">
						<a href="https://www.facebook.com/norwingc" target="new"><img src="img/facebooklogo.png"></a>
						<a href="https://twitter.com/norwingc" target="new"><img src="img/twitterlogo.png"></a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="info">
					<img src="img/foto.jpg" class="img-circle">	
					<div class="yo">Norwin Guerreo | <span>Web Developer</span></div>
					<p>acerca de mi</p>
					<div class="social">
						<a href="https://www.facebook.com/norwingc" target="new"><img src="img/facebooklogo.png"></a>
						<a href="https://twitter.com/norwingc" target="new"><img src="img/twitterlogo.png"></a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="info">
					<img src="img/foto.jpg" class="img-circle">	
					<div class="yo">Norwin Guerreo | <span>Web Developer</span></div>
					<p>acerca de mi</p>
					<div class="social">
						<a href="https://www.facebook.com/norwingc" target="new"><img src="img/facebooklogo.png"></a>
						<a href="https://twitter.com/norwingc" target="new"><img src="img/twitterlogo.png"></a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="info">
					<img src="img/foto.jpg" class="img-circle">	
					<div class="yo">Norwin Guerreo | <span>Web Developer</span></div>
					<p>acerca de mi</p>
					<div class="social">
						<a href="https://www.facebook.com/norwingc" target="new"><img src="img/facebooklogo.png"></a>
						<a href="https://twitter.com/norwingc" target="new"><img src="img/twitterlogo.png"></a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="contacto">
	<h1 class="titul">Contactenos</h1>
		@if(Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
		{{ Form::open(array('url' => 'contacto/send', 'class' => 'form-horizontal')) }}
			<div class="form-group">
				{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre')) }}	
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('comentario', 'Comentario', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::textarea('comentario', Input::old('comentario'), array('class' => 'form-control', 'placeholder'=> 'Comentario')) }}	
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('telefono', 'Telefono', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control', 'placeholder'=> 'Telefono')) }}	
				</div>
			</div>
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Enviar Comentario' , array('class'=> 'btn btn-success')) }}
			</div>	
		</div>
		{{ Form::close() }}
	</div>



@stop            
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Nicaragua Tours Blog</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		{{ HTML::style('css/blog.css') }}
          <!--PLUGIN -->
		{{ HTML::style('css/bootstrap/bootstrap.min.css') }}

</head>
<body>
 <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
	<header>
		<nav class="navbar navbar-inverse" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Nicaragua Blog</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>		    
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav blogmunu">
		        <li><a href="{{ URL::to('/') }}"><div class="logo"><img src="{{ asset('img/logoblog.png') }}"></div></a></li>
		        <li><a href="{{ URL::to('blog') }}"><h1>Blog Nicaragua</h1></a></li>		        
		      </ul>		      
		      <ul class="nav navbar-nav navbar-right usuariomenu">		        
		        <li class="dropdown">
		        	@if(Auth::check())
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->username }} <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			            <li><a href="{{ URL::to('usuarios/perfil/' . Auth::user()->id . '') }}">Perfil</a></li>
			            <li class="divider"></li>		           
			            <li><a href="{{ URL::to('articulo/create') }}">Crear Articulo</a></li>		           
			            <li class="divider"></li>
			            <li><a href="{{ URL::to('usuarios/logout') }}">Cerrar session</a></li>
			          </ul>
		        	@else
		        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Usuario <span class="caret"></span></a>
			        	<ul class="dropdown-menu" role="menu">
				            <li><a href="{{ URL::to('login') }}">Login</a></li>		           
				            <li class="divider"></li>
				            <li><a href="{{ URL::to('registrar') }}">Registrar</a></li>
			        	</ul>
			        @endif  
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>		
	</header>

	<section class="posts">
		@yield('contenido')
	</section>

	<footer>
		<h3>
			<strong>Powered by UNI</strong>
			<span class="mejor">
				@norwingc 2013
			</span>
		</h3>
	</footer>

 	{{ HTML::script('js/vendor/jquery-1.10.2.min.js') }}
    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/vendor/bootstrap.min.js') }}
    {{ HTML::script('js/main.js') }}
    {{ HTML::script('js/vendor/jquery.stellar.min.js') }}

    @yield('js')
</body>
</html>
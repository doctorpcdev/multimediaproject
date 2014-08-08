<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Nicaragua Tours</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

       
		{{ HTML::style('css/main.css') }}
 
        {{ HTML::style('css/slick.css') }}
		{{ HTML::style('css/monokai.min.css') }}
		{{ HTML::style('css/style.css') }}
        

        <!--PLUGIN -->
		{{ HTML::style('css/bootstrap/bootstrap.min.css') }}
        
    </head>
    <body>
     <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

       	<header>
       		<!-- slider -->
        	<section>
        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		            <!-- Indicators -->
		            <ol class="carousel-indicators">
		              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		            </ol> 
            		<!-- Wrapper for slides -->
		            <div class="carousel-inner">
		           		@yield('slider')             
		            </div>
		            <!-- Controls -->
		            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		              <span class="glyphicon glyphicon-chevron-left"></span>
		            </a>
		            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		              <span class="glyphicon glyphicon-chevron-right"></span>
		            </a>
          		</div>          
               <div class="titulSlider">
                   <h2>Para Conocer y Senir</h2>
               </div>
               <div class="logo">
                   <img src="img/logo.png">
               </div>   
        	</section>

          	<!-- Menu -->
        	<div class="degra">            
	            <nav class="navbar navbar-default menumain" role="navigation">
	              <!-- MENU MOVIL -->
	              <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                  <span class="sr-only">Nicaragua</span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                </button>                
	              </div>

	              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav">
	                  <li class="nica">
	                    <a href="#">nicaragua</a>	                    
	                    <span><img src="img/guardabarranco.png"></span>
	                  </li>
	                  <li class="about dropdown">
	                    <a href="" class="dropdown-toggle" data-toggle="dropdown">departamentos <span class="caret"></span></a> 
	                    <ul class="dropdown-menu" role="menu">
	                    	<li><a href="{{ URL::to('jinotega') }}">Jinotega</a></li>
	                    	<li><a href="#">Carazo</a></li>
	                    	<li><a href="#">Matagalpa</a></li>
	                    	<li><a href="#">Esteli</a></li>
	                    </ul>                 
	                  </li>
	                  <li class="explo">
	                    <a href="">Explorar</a>                
	                  </li>
	                  <li class="plani">
	                    <a href="">Acerca de</a>                  
	                  </li>
	                  <li class="len">
	                    <a href="{{ URL::to('blog') }}">Blog</a>                   
	                  </li>
	                </ul>
	              </div>
	            </nav>
        	</div> 
       	</header>
       <!-- End Menu -->	

		<!-- segundo slider -->
    	<section class="slidercenter degra" style="padding-bottom: 3em;">
        	<div class="degrawhite">
	        	<section id="features" class="blue">
	            	<div class="content">
	              		<div class="center">
	              			@yield('segundoslider')	                            
	              		</div>
	        	</section>
        	</div>
       </section>
       <!-- end segundo slider -->	

       <!-- INFORMACION -->
       <section class="informacion" >
			<div class="row">
				<!-- informacion izquierda -->
	           	<article class="col-md-3 degrawhite infoiz">
	            	<div>
	            		@yield('informacionizquierda')		            	
	            	</div>
	           	</article>
	        	<!-- end informacion izquierda -->

				<!--informacion central -->
				<div class="col-md-9 centermod">
					<div class="row">
						<article class="col-md-9 degrawhite infocenter" style="padding: 10px">               
	                		<div class="clima" style="overflow:hidden">
	                			@yield('clima')	                    		
	                  		</div>                  
	               		</article>


	               		<!-- informacion derecha -->
	                 	<article class="col-md-3 anuncios">
	                		<div class="anunciostitul">
	                    		<h2>Necesitas Ayuda?</h2>             
	                  		</div>
	                		<div class="row">
	                			@yield('anuncios')	                    		
	                  		</div>
	                	</article>
                 		<!-- end informacion derecha -->
                 	</div>
					<!--end row informacion Central -->
					
					<!-- info central abajo -->
					<div class="row infocenter infoserver">
            			<div class="col-md-4">              
			            	<h2>Tipo De Cambio</h2>
			              	<div class="cuadradoinfo"></div>
			              	
            			</div>     
            			<div class="col-md-4">
              				<h2>Lineas Aereas</h2>
               				<div class="cuadradoinfo"></div>
            			</div>
            			<div class="col-md-4">
	              			<h2>Tour Operadora</h2>
	               			<div class="cuadradoinfo"></div>
            			</div>                
           			</div>
           			<!--end info central abajo -->

					<!-- calendario -->	
           			<div class="calendario">
           				@yield('calendario')              			
            		</div> 
            		<!--end calendario -->
               	</div>
               	<!--end informacion central -->  
			</div>
			<!-- end row -->
       </section>
       <!--end infromacion -->	

		

		<footer>
			derechos reservados
		</footer>



      	{{ HTML::script('js/vendor/jquery-1.10.2.min.js') }}
      	{{ HTML::script('js/plugins.js') }}
      	{{ HTML::script('js/vendor/bootstrap.min.js') }}
      	{{ HTML::script('js/main.js') }}

      	{{ HTML::script('js/slick.js') }}
      	{{ HTML::script('js/scripts.js') }}


      </body>
</html>
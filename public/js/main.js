$(document).on('ready', primera);

function primera(){

	$( window ).resize(function() {
		if($(window).width() > 1024){
			tamSlider();
		}else{
			 $('.slider').css({'height': 350});					
		}
	
	});	

	$('#mobile-menu-button').on('click', function(event) {
	  event.preventDefault();
	  $(this).toggleClass('active');
	  $('#segundomenu  .navsecond').slideToggle("fast");
	});

		
	tamSlider();	
}

function tamSlider(){
	if($(window).width() < 1024){
		 $('.slider').css({'height': 350});		
	}else{
		$('.slider').css({'height': $(window).height() -85});	
	}	
}

$(document).ready(function(){
	
	$("#carousel").owlCarousel({
		pagination: false,
		autoPlay: true
	});
	
	$('#mobile-navigation').after().on('click',function(){
		if($('#mobile-navigation').hasClass('active')){
			$('#mobile-navigation').removeClass('active');
		}else{
			$('#mobile-navigation').addClass('active');
		}
	});
	
});
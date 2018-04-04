$(document).ready(function(){
	$('div.avatar ul li.dropdown a').on('click', function(){
		if($('div.avatar ul li.dropdown ul.hidden-menu').hasClass('active')){
			$('div.avatar ul li.dropdown ul.hidden-menu').removeClass('active');
		}else{
			$('div.avatar ul li.dropdown ul.hidden-menu').addClass('active');
		}
	})
});
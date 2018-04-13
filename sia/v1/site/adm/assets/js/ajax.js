var ajaxSend = function(path, script, params, element){
	
	var parameters = params;
	
	console.log(parameters);
	
	$.ajax({
		url: 'controllers/'+path+'/'+script+'.controller.php',
		dataType: 'html',
		data: {'params': params},
		beforeSend: function(){
			$('body').find('button#new_type')
					 .removeClass('fa-plus')
					 .addClass('fa-spinner')
					 .addClass('fa-pulse')
					 .addClass('fa-3x')
					 .addClass('fa-fw');
		},
		success: function(msg){
			$('body').find('button#new_type')
			 		 .addClass('fa-plus')
			 		 .removeClass('fa-spinner')
			 		 .removeClass('fa-pulse')
			 		 .removeClass('fa-3x')
			 		 .removeClass('fa-fw');
			$('body').find('.new_post_type')
					 .fadeOut('fast')
					 .remove();
			console.log(msg);
		}
	})
	

	
};
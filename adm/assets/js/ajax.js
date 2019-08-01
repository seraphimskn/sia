var ajaxSend = function(path, script, params){
	
	$.ajax({
		url: 'controllers/commons/ajax.controller.php',
		method: 'post',
		dataType: 'html',
		data: { 'params': params,
			   	'script': script,
			   	'path' : path},			   
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
			var data = JSON.parse(msg);
			var type = '<article class="col-12"><input type="radio" value="'+data.msg[0].option_value+'" id="'+data.msg[0].option_value+'" name="'+data.msg[0].option_type+'"> <label for="'+data.msg[0].option_value+'">'+data.msg[0].option_name+'</label></article>';
			var container = $('body').find('.post-type #the_types');
			container.find('span').fadeOut().remove();
			container.append(type);
		}
	})
	

	
};
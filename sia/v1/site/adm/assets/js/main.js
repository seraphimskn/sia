$(document).ready(function(){
	
	$('div.avatar ul li.dropdown a#viewing').on('click', function(){
		if($('div.avatar ul li.dropdown ul.hidden-menu').hasClass('active')){
			$('div.avatar ul li.dropdown ul.hidden-menu').removeClass('active');
			return false;
		}else{
			$('div.avatar ul li.dropdown ul.hidden-menu').addClass('active');
			return false;
		}
	});
	
	$('nav.vertical-nav').after().on('click', function(){
		if($('nav.vertical-nav').hasClass('active')){
			$('nav.vertical-nav').removeClass('active');
		}else{
			$('nav.vertical-nav').addClass('active');
		}
	});
	
	tinymce.init({
		selector: "textarea#tinyMCE",
		height: 500,
		resize: false,
		theme: 'modern',
		menubar: false,
		plugins: [
		    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
		    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
		  ],
		toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | forecolor backcolor",
		toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | visualchars visualblocks nonbreaking template pagebreak restoredraft",
		image_advtab: true,
		branding: false
	});
	
	$('#new_type').on('click', function(){
	
		var addPostTypeDocker = '<div class="dock position-absolute new_post_type" style="z-index: 9; left: 0; bottom: -25%; box-shadow: 5px 10px 15px #666666"><form name="new_post_type" class="form-control" id="new_post_type"><div class="form-control input-group mb-3"><input type="text" name="option_name" class="form-control" placeholder="Tipo de Post"><input type="hidden" name="option_type" value="post_type" /><button class="btn btn-primary" id="add_post_type"><i class="fa fa-plus" aria-hidden="true"></i></div><input type="hidden" value="true" name="secure"></form></div>';
		
		$(this).after(addPostTypeDocker).fadeIn();
		
		var addNewType = $('body').find('button#add_post_type');
		
		addNewType.on('click', function(){
			var form = $('body').find('form#new_post_type');
			ajaxSend('configs', 'config', form.serialize(), 'the_types');
			return false;
		});
		
		return false;
		
	});
	
	
});
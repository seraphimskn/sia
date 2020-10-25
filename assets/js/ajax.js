//function to send the request to the bills
var getBoleto = function(form, url){

	var the_form = form;

	$.post(url, the_form, function(msg){
		console.log(msg);
	});

}

//function to send the form without the image
var sendForm = function(form, script, folder){

	var the_script = 'models/'+ folder +'/' + script + '.model.php';
	var the_form   = $(''+form+'').serialize();

	retorno = $.post(
		the_script, 
		the_form, 
		function(msg){ 
			if(msg == 1){				
				$('#main').prepend('<span class="alert alert-success float-left text-center col-12" role="alert">Cadastro atualizado!</span>').slideDown();
				$([document.documentElement, document.body]).animate({
					scrollTop: $('header').offset().top
				}, 500);
			}else{
				$('#main').prepend('<span class="alert alert-danger float-left text-center col-12" role="alert">Cadastro não atualizado, contate o suporte.</span>').slideDown();
				$([document.documentElement, document.body]).animate({
					scrollTop: $('header').offset().top
				}, 500);
			};
		}
	);
	
};

//function to send the deletion command to the database
var sendDelete = function(id, script, folder){

	var the_script = 'models/'+ folder +'/'+ script +".model.php";
	var the_id = id;

	console.log(the_id);

	retorno = $.post(
		the_script, 
		the_id, 
		function(msg){ 
			if(msg == 1){
				$.when($('#main .table').find('#item-'+the_id.id).fadeOut()).then(function(){
					$.when($('#main').prepend('<span class="alert alert-danger float-left text-center col-12" role="alert" style="display: none;">Cadastro excluído com sucesso.</span>')).then(function(){
						$.when($('#main .table').find('#item-'+the_id.id).remove()).then(function(){
							$('#main').find('.alert').slideDown();
						});
					});
				});				
			}else{
				$.when($('#main').prepend('<span class="alert alert-danger float-left text-center col-12" role="alert" style="display: none;">Cadastro não excluído, contate o suporte.</span>')).then(function(){
					$('#main').find('.alert').slideDown();
				});
			}
		}
	);

};

//function to send the form with an image
var sendUpload = function(form, script, folder){

	var the_script = 'models/'+ folder +'/' + script + '.model.php';
	var the_form   = form;

	retorno = $.ajax({
		url : the_script, 
		data: the_form, 
		type: 'POST',		
		cache: false,
		contentType: false,
		processData: false,
		xhr: function(){
			var myXhr = $.ajaxSettings.xhr();
			if(myXhr.upload){
				myXhr.upload.addEventListener('progress', function(){
				}, false);
			}
			return myXhr;
		},
		success: function(msg){ 
			if(msg == 1){				
				$('#main').prepend('<span class="alert alert-success float-left text-center col-12" role="alert">Cadastro atualizado!</span>').slideDown();
				$([document.documentElement, document.body]).animate({
					scrollTop: $('header').offset().top
				}, 500);
			}else{
				$('#main').prepend('<span class="alert alert-danger float-left text-center col-12" role="alert">Cadastro não atualizado, contate o suporte.</span>').slideDown();
				$([document.documentElement, document.body]).animate({
					scrollTop: $('header').offset().top
				}, 500);
			};
		}
	});

};
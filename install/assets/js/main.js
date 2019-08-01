$(function(){
	
	$('#primaryColor').spectrum({
		color: "#ffffff",
		showInput: true,
		preferredFormat: 'hex'
	});
	
	$('#secondaryColor').spectrum({
		color: "#348eb4",
		showInput: true,
		preferredFormat: 'hex'
	});
	
	$('#fontColor').spectrum({
		color: "#000000",
		showInput: true,
		preferredFormat: 'hex'
	});
	
	$("#file").on("change", function(){
		
		var img = this.files[0];
		
		var reader = new FileReader();
		
		reader.onload = function(){
			var output = $("#preview");
			output.attr('src', reader.result);
		};
		
		console.log(img);
		
		$.post({
			
			data: {img: img},
			cache: false,
			processData: false,
			beforeSend: function(){
				$("div form div div i").removeClass('d-none').fadeIn('fast');
			}
			
		}).done(function(){
			
			$.when($("div form div div i").fadeOut('slow')).then(function(){
				reader.readAsDataURL(img).fadeIn('fast');
			});
		
		});
		
	});
	
});

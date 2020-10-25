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
	
	$('#edit_url').on('click', function(){
		
		$('#the_slug').fadeOut();
		$('#page_slug').fadeIn();
		
		return false;
	});
	
	$('#new_type').on('click', function(){
	
		var addPostTypeDocker = '<div class="dock position-absolute new_post_type" style="z-index: 9; left: 0; bottom: -25%; box-shadow: 5px 10px 15px #666666"><form class="form-control" id="new_post_type"><div class="form-control input-group mb-3"><input type="text" name="option_name" class="form-control" placeholder="Tipo de Post"><button class="btn btn-primary" id="add_post_type"><i class="fa fa-plus" aria-hidden="true"></i></div><input type="hidden" value="true" name="secure"><input type="hidden" name="new_type" value="true"><input type="hidden" name="for" value="'+$('form.row').attr('name')+'"><input type="hidden" name="userID" value="'+$(this).attr('data-session')+'"></form></div>';
		
		$(this).after(addPostTypeDocker).fadeIn();
		
		var addNewType = $('body').find('button#add_post_type');
		
		addNewType.on('click', function(){
			var form = $('body').find('form#new_post_type');
			ajaxSend('configs', 'config', form.serializeArray());
			return false;
		});
		
		return false;
		
	});	

	//starts the users ajax sends
	//create the FormData object
	var form = new FormData();

	//returns the preview of the image uploaded
	$('#file').on('change', function(){
		var img = this.files[0];
			
		var reader = new FileReader();

		reader.onload = function(){
			var output = $("#preview");
			output.attr('src', reader.result);
		};

		reader.readAsDataURL(img);

		//apends the name and the file to the ajax form
		$('#imagem').val(img.name);
		form.append('imagem', img);

	});

	//onclick event to start the ajax edition of the user profile
	$('#sendEdit').on('click', function(){

		//prevent the page refresh on the onclick event
		event.preventDefault();	

		var form_id = $(this).parent().parent().attr('id');
		var script = form_id.split('edit')[1];

		if(typeof tinymce !== 'undefined'){
			
			var textarea = $('#'+form_id+'').find('textarea').attr('id');

			$('#'+textarea+'').html(tinymce.get(textarea).getContent());
		
		}

		if(typeof $('#imagem').val() != 'undefined' && $('#imagem').val() != ''){
			var the_form = $('#'+form_id+'').serializeArray();
			for(var i=0; i < the_form.length; i++){
				form.append(the_form[i].name, the_form[i].value);
			}
			sendUpload(form, 'edit', script);
			for(var i=0; i < the_form.length; i++){
				form.delete(the_form[i].name, the_form[i].value);
			}			
		}else{
			sendForm('#'+form_id+'', 'edit', script);			
		}

		if(typeof tinymce !== 'undefined'){
			tinymce.execCommand('mceRemoveEditor', false, textarea);
			tinymce.execCommand('mceAddEditor', false, textarea);
		}

		//hide the alert span
		setTimeout(function(){
			$.when($('body').find('.alert').slideUp('fast')).then(function(){				
				$('body').find('.alert').remove();	
			});
		}, 5000);

	});

	$('#sendRegister').on('click', function(){

		event.preventDefault();

		var form_id = $(this).parent().parent().attr('id');

		sendForm('#'+form_id+'', 'register', 'payments');

		//hide the alert span
		setTimeout(function(){
			if($('body').find('.alert').hasClass('alert-success')){
				document.location.href = './payments/contract_payments';
			};
			$.when($('body').find('.alert').slideUp('fast')).then(function(){				
				$('body').find('.alert').remove();	
			});
		}, 5000);		
		

	});

	//onclick event to start the ajax user addition
	$('#sendAdd').on('click', function(){

		//prevent the page refresh on the onclick event
		event.preventDefault();	

		var form_id = $(this).parent().parent().attr('id');
		var script = form_id.split('add')[1];

		//creating the bills
		/* if($('#formaPagamento').val() == 'boleto'){
			var the_form = $(this).parent().parent();
			
			var url = 'https://geraboleto.sicoobnet.com.br/geradorBoleto/GerarBoleto.do';

			var d = new Date();
			
			var vencimento = (parseInt(d.getMonth()) + 2);
			var mesAtual = (parseInt(d.getMonth()) + 1);

			var cp = the_form[0].elements.cpf_cnpj.value;
			var cpf_cnpj = '';
			for(var i = 0; i < cp.length; i++){
				cpf_cnpj += cp[i].replace(/[\D]+/, '');  
			}

			if(vencimento < 10){
				var dataVenc = '0'+String(vencimento);
			}else
			if(vencimento > 12){
				var dataVenc = '01';
			}

			if(mesAtual < 10){
				var mes = '0'+String(mesAtual);
			}

			var boleto = {
					'coopCartao': '3010',
					'numCliente': '1871668',
					'dataEmissao': ''+d.getFullYear()+mes+d.getDate()+'',
					'codTipoVencimento': '1',
					'dataVencimentoTit': ''+d.getFullYear()+dataVenc+the_form[0].elements.data_cobranca.value+'',
					'valorTitulo': the_form[0].elements.valor.value,
					'numContaCorrente': '741280',
					'codEspDocumento': 'DS',
					'nomeSacado': the_form[0].elements.nome.value,
					'cpfCGC': cpf_cnpj,
					'endereco': the_form[0].elements.endereco.value,
					'bairro': the_form[0].elements.bairro.value,
					'cidade': the_form[0].elements.cidade.value,
					'uf': the_form[0].elements.estado.value,
					'codMunicipio': '44444',
					'chaveAcessoWeb': 'D9380049-646F-4A60-97DF-99533DE6F6D6'
					};

			getBoleto(boleto, url);
			
		} */

		if(typeof tinymce !== 'undefined'){

			var textarea = $('#'+form_id+'').find('textarea');

			textarea.each(function(index, value){
				if(value.id == 'conteudo'){
					$('#'+value.id+'').html(tinymce.get(value.id).getContent());
					tinymce.get(value.id).setContent('');
				}
				if(value.id == 'observacoes'){
					$('#'+value.id+'').html(tinymce.get(value.id).getContent());
					tinymce.get(value.id).setContent('');
				}
			});

			//$('#'+textarea+'').html(tinymce.get(textarea).getContent());

		}

		if(typeof $('#imagem').val() != 'undefined' && $('#imagem').val() != ''){
			var the_form = $('#'+form_id+'').serializeArray();
			for(var i=0; i < the_form.length; i++){
				form.append(the_form[i].name, the_form[i].value);
			}
			sendUpload(form, 'add', script);
			for(var i=0; i < the_form.length; i++){
				form.delete(the_form[i].name, the_form[i].value);
			}
		}else{
			sendForm('#'+form_id+'', 'add', script);
		}

		$('#'+form_id+' input').val('');

		$('#'+form_id+' textarea').val('');

		$('#'+form_id+' #preview').attr('src', 'assets/img/no-image.png');

		var checkbox = $('#'+form_id+' input[type="checkbox"]');
		var radio = $('#'+form_id+' input[type="radio"]');

		checkbox.each(function(index, value){
			if($(this).prop('checked')){
				$(this).prop('checked', false);
			};			
		});

		radio.each(function(index, value){
			if($(this).prop('checked')){
				$(this).prop('checked', false);
			};
		});

		//hide the alert span
		setTimeout(function(){
			$.when($('body').find('.alert').slideUp('fast')).then(function(){
				if($('body').find('.alert').hasClass('alert-success')){
					document.location.href = './'+script+'/view';
				};
				$('body').find('.alert').remove();			
			});
		}, 5000);

	});

	$('.sendDelete').on('click', function(){
		
		//prevent the page refresh on the onclick button
		event.preventDefault();

		//setup the script variable to send
		var script = $(this).attr('data-script');

		//setup the post variables to send
		var id = {"id" : $(this).attr('data-id'), "send" : "delete"};

		//send the deletion commnand function
		sendDelete(id, 'view', script);

		//hide the alert span
		setTimeout(function(){
			$.when($('body').find('.alert').slideUp('fast')).then(function(){
				$('body').find('.alert').remove();
			});
		}, 5000);

	});

	$('#nivel').on('change', function(){
		var valueLevel = $(this).children('option:selected').val();
		if(valueLevel == 3){
			$('.categoria.text').hide();
			$('.categoria.select').show();
			$('.profissao').show();
			$('.convenio').show();
			$('.vendedor').show();
			$('.contrato').show();
		}else
		if(valueLevel == 4){
			$('.categoria.text').show();
			$('.convenio').show();
			$('.categoria.select').hide();
			$('.profissao').hide();
			$('.vendedor').show();
			$('.contrato').show();
		}else{
			$('.categoria').hide();
			$('.profissao').hide();
			$('.convenio').hide();
			$('.vendedor').hide();
			$('.contrato').hide();
		};
		if(valueLevel == 3 || valueLevel == 4){
			$('.forma_de_pagamento').show();
		}else{
			$('.forma_de_pagamento').hide();
		}
		if(valueLevel == 1 || valueLevel == 2 || valueLevel == 5){
			$('.data-cobranca').hide();
		}else{
			$('.data-cobranca').show();
		};
		if(valueLevel != 4){
			$('.desconto').hide();
		}else{
			$('.desconto').show();
		}
	});

	$('#convenio').on('change', function(){

		var convenio = $(this).val();

		$.post('models/users/add.model.php', 
				{send: true, id_convenio: convenio}, 
				function(msg){
					var valor = JSON.parse(msg);
					$('#valorPlano').val(valor.valor);
				}
			);

		console.log(convenio);

	});

	$('.categoria select').on('change', function(){
		var valueType = $(this).children('option:selected').val();
		if(valueType == 'dependente'){
			$.when($('.data-cobranca').hide()).then(function(){
				$('.convenio').hide();
				$('.vendedor').hide();
				$('.contrato').hide();
				$('.forma_de_pagamento').hide();
				$('#search-titular').show();
			});
		}else{
			$('#search-titular').hide();
			$('.convenio').show();
			$('.vendedor').show();
			$('.contrato').show();
			$('.data-cobranca').show();
		}
	});

	$('#search-titular').on('keypress', function(){
		var min = $(this).val();
		if(min.length >= 2){
			$('.auto-search').find('.result').remove();
			$.ajax({
				url: 'models/users/view.model.php',
				method: 'post',
				dataType: 'json',
				data: {
					term: min,
					secure: true,
					type: 'busca',
					send: true
				},
				beforeSend: function(){
					$('#search-titular').addClass('position-relative').append('<i class="fa fa-spinner fa-pulse" aria-hidden="true" style="position: absolute; right: 0; font-size: 8px"></i>');
				},
				success: function(data){
					$('#search-titular').removeClass('position-relative').find('i.fa-spinner').remove();
					var ul = '<ul class="result"></ul>';
					$.when($('.auto-search').append(ul)).then(function(){
						for(var i = 0; i < data.length; i++){
							$('.auto-search').find('.result').append('<li class="item-selection" data-id="'+data[i].id+'">'+data[i].nome+'</li>');
						};
						$('.auto-search').find('li').on('click', function(){
							var id = $(this).attr('data-id');
							var text = $(this).text();
							$('#id-titular').val(id);
							$('#search-titular').val(text);
							$('.auto-search').find('ul').remove();
						});
					});							
				}
			});
		}
	});

	$('#destinatarios').on('keypress', function(){
		var min = $(this).val();
		if(min.length >= 2){
			$('.auto-search').find('.result').remove();
			$.ajax({
				url: 'models/mailing/view.model.php',
				method: 'post',
				dataType: 'json',
				data: {
					term: min,
					secure: true,
					type: 'busca',
					send: true
				},
				beforeSend: function(){
					$('#search-titular').addClass('position-relative').append('<i class="fa fa-spinner fa-pulse" aria-hidden="true" style="position: absolute; right: 0; font-size: 8px"></i>');
				},
				success: function(data){
					$('#search-titular').removeClass('position-relative').find('i.fa-spinner').remove();
					var ul = '<ul class="result"></ul>';
					$.when($('.auto-search').append(ul)).then(function(){
						for(var i = 0; i < data.length; i++){
							$('.auto-search').find('.result').append('<li class="item-selection" data-id="'+data[i].id+'">'+data[i].nome+'</li>');
						};
						$('.auto-search').find('li').on('click', function(){
							var id = $(this).attr('data-id');
							var text = $(this).text();
							$('#id-titular').val(id);
							$('#search-titular').val(text);
							$('.auto-search').find('ul').remove();
						});
					});							
				}
			});
		}
	});

	$('#search-user').on('click', function(){

		event.preventDefault();

		var the_form = $('#searchuser');		
		the_form.append('<input type="hidden" name="secure" value="true">');
		var script = 'models/commons/home.model.php';

		$.post(
			script,
			the_form.serialize()
		).done(function(result){
			var json = JSON.parse(result)[0];
			if(typeof json != 'undefined'){
				$('#imagem').attr('src', json.imagem);
				$('#nome').html(json.nome);
				$('#id_user').html(json.id);
				$('#id_usuario').val(json.id);
				if(json.ativo == 1){
					$('#status').html('<span class="badge badge-success" role="badge">Ativo</span>');
				}else{
					$('#status').html('<span class="badge badge-danger" role="badge">Inativo</span>');
					$('.dados_venda').css('display', 'none');
				}
				$('#beneficiario').slideDown();
			}else{
				var msg = JSON.parse(result);
				$('#dashboard-parceiro').append('<div class="alert alert-danger col-12 text-center" role="alert" style="margin-top: 2rem">'+msg.error+'</div>').slideDown();
				setTimeout(function(){
					$.when($('body').find('.alert').slideUp()).then(function(){
						$('body').find('.alert').remove();
					});
				}, 1500);
			}
		});

	});

	$('#sendCompra').on('click', function(){
		
		event.preventDefault();

		var the_form = $('#sendVenda');
		the_form.append('<input type="hidden" name="secure" value="true" class="secure" />');
		the_form.append('<input type="hidden" name="confirmar" value="true" class="confirmar" />');

		var script = 'models/commons/home.model.php';

		$.post(
			script,
			the_form.serialize()
		).done(function(result){
			$(document).find('.secure').remove();
			$(document).find('.confirmar').remove();
			var json = JSON.parse(result);
			the_form.append('<input type="hidden" name="valor_desconto" value="'+json.desconto+'" class="desconto" />');
			the_form.append('<div><label>Valor com Desconto</label><input type="text" name="valor_desconto" value="'+json.desconto+'" class="desconto form-control" /></div>');
			the_form.find('#sendCompra').remove()
			the_form.append('<button class="btn btn-success" id="confirmarCompra">Confirmar Compra</button>');

			the_form.find('#confirmarCompra').on('click', function(){
		
				event.preventDefault();
		
				var form = $('#sendVenda');
				form.append('<input type="hidden" name="gravar" value="true" class="gravar" />');
				var script = 'models/commons/home.model.php';
		
				$.post(
					script,
					form.serialize()
				).done(function(result){
					var response = JSON.parse(result);
					//form.find('.gravar').remove();
					//form.find('.desconto').remove();
					if(response.success == 1){
						var background = '<div style="float: left; position: fixed; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.75); z-index: 10"></div>'
						var popup = '<div class="col-3 row position-absolute" style="background-color: #FFFFFF; z-index: 11; top: 25%; left: 40%; padding: 1.5rem; border-radius: 1.5rem;"><h2 class="col-12 text-center my-2">Venda Concluída!</h2><span class="col-12">Você ganhou '+response.pontos+' pontos de fidelidade!</span><a href="./" class="btn btn-primary" id="voltar" style="float: right; margin-top: 2rem">Voltar</a></div>';
						$('body').append(background).append(popup);
					}
				});		
		
			});

		});		

	});

	$('#selecionaTipoContrato select').on('change', function(){
		var valueType = $(this).children('option:selected').val();

		var novo  = '<div id="novo" class="col-12">';
		    novo += '<div class="termo">';
			novo += '<div class="texto">';
			novo +=	'Atenção, esta ação irá criar um novo contrato vazio. Esta ação, uma vez tomada, não poderá ser desfeita e o contrato permanecerá inativo no sistema até que ele seja vinculado a um beneficiário e um a vendedor.';
			novo +=	'<div class="ciente">';
			novo += '<label for="ciente">Estou ciente e quero continuar:</label> <input type="checkbox" name="ciente" id="ciente" />';
			novo +=	'</div>';
			novo +=	'<button name="criarNovo" id="sendNewContract" class="btn btn-primary float-right" value="novo">Criar Novo Contrato</button>';
			novo += '</div>';
			novo += '</div>';
			novo += '</div>';

		var existente  = '<div id="existente" class="col-12">';
			existente += '<div class="termo">';
			existente += '<div class="text">';
			existente += 'Atenção, esta ação incluirá um contrato vazio com numeração já existente anterior à implantação do sistema. Esta ação, uma vez tomada, não poderá ser desfeita e o contrato permanecerá inativo no sistema até que ele seja vinculado a um beneficiário e um a vendedor.';
			existente += '<div class="ciente">';
			existente += '<label for="ciente">Estou ciente e quero continuar:</label> <input type="checkbox" name="ciente" id="ciente" />';
			existente += '</div>';
			existente += '</div>';
			existente += '</div>';
			existente += '<div class="formulario">';
			existente += '<div class="id">';
			existente += '<label for="id">Número do Contrato: </label>';
			existente += '<input type="text" name="id" id="id" class="form-control" placeholder="Insira o número desse contrato" required />';
			existente += '</div>';
			existente += '<div class="data_venda">';
			existente += '<label for="data_venda">Data da Venda deste Contrato: </label>';
			existente += '<input type="date" name="data_venda" id="data_venda" class="form-control" placeholder="dd/mm/yyyy" required />';
			existente += '</div>';
			existente += '<div class="data_vencimento">';
			existente += '<label for="data_vencimento">Data de Vencimento deste Contrato: </label>';
			existente += '<input type="date" name="data_vencimento" id="data_vencimento" class="form-control" placeholder="dd/mm/yyyy" required />';
			existente += '</div>';
			existente += '<button name="criarAntigo" id="sendNewContract" class="btn btn-primary float-right" value="antigo">Enviar Contrato</button>';
			existente += '</div>';
			existente += '</div>'; 

		if(valueType == 'novo'){
			$('#addcontract').append(novo);
			$('#addcontract').find('#existente').remove();
		}else 
		if(valueType == 'existente'){
			$('#addcontract').append(existente);
			$('#addcontract').find('#novo').remove();
		}

		$('#addcontract').find('.btn').on('click', function(){
		
			event.preventDefault();

			var ciente = $('form').find('#ciente');

			if(ciente[0].checked == false){
				$('.form').append('<label class="alert alert-danger" role="alert">Você precisa aceitar o termo de ciência para continuar.</label>');	
				setTimeout(function(){
					$('.form').find('.alert').fadeOut();}, 2500);
			}else{
				var id = $(this).attr('name');
				if(id == 'criarNovo'){
					var form = $('#addcontract');
					form.append('<input type="hidden" name="send" value="true" />');
					form.append('<input type="hidden" name="contract_type" value="new" />');

					var script = 'models/contracts/add.model.php';
					
					$.post(
						script, 
						form.serialize())
						.done(function(e){

							var msg = JSON.parse(e);

							$('.form').append('<label class="alert alert-success" role="alert">'+ msg['msg'] +'</label>');
							setTimeout(function(){
								$('.form').find('.alert').fadeOut();}, 2500);
						});

				}else
				if(id == 'criarAntigo'){
					
					var form = $('#addcontract');

					for(var i = 0; i < form[0].elements.length; i++){
						var value = form[0].elements[i].value;
						if(value == ''){
							
							var node = document.createElement('LABEL');
							var msg = document.createTextNode('Campo obrigatório!');

							node.className = 'alert alert-danger';
							node.appendChild(msg);

							form[0].elements[i].parentNode.appendChild(node);
							form[0].elements[i].style.borderColor = 'red';

							setTimeout(function(){
								$('form').find('.alert').slideUp();
							}, 2500);

							return false;

						}else{

							form[0].elements[i].style.borderColor = '#ced4da';

						}
					}

					form.append('<input type="hidden" name="send" value="true" />');
					form.append('<input type="hidden" name="contract_type" value="old" />');

					var script = 'models/contracts/add.model.php';

					$.post(
						script,
						form.serialize()
					).done(function(e){
						var msg = JSON.parse(e);

						$('.form').append('<label class="alert alert-success" role="alert">'+ msg['msg'] +'</label>');
						setTimeout(function(){
							$('.form').find('.alert').fadeOut();}, 2500);
					});

				};
			};

		});

	});
	
	$('#newCard').on('click', function(){
		event.preventDefault();

		var script = 'models/newcard/view.model.php';
		var id = $('form #userID').val(); 
		$.post(script, {id: id,  send: true})
		 .done(function(msg){
			var status = JSON.parse(msg);
			if(status.sent == true){
				$('form').prepend('<div class="alert alert-success col-12 text-center" role="alert">Solicitação enviada com sucesso. Em breve entraremos em contato.</div>');
				setTimeout(function(){$('form').find('.alert').fadeOut();}, 2500);
			}else{
				$('form').prepend('<div class="alert alert-danger col-12 text-center" role="alert">Houve um erro ao ser enviada sua solicitação, tente novamente mais tarde.</div>');
				setTimeout(function(){$('form').find('.alert').fadeOut();}, 2500);
			}
		});

	});	

	$('.viewChange').on('click', function(){
		if($(this).find('.switchButton').hasClass('off')){
			$.when($(this).find('.switchButton').addClass('on').removeClass('off')).then(function(){
				$('.visionMain').addClass('legendOff');
				$('.visionUser').removeClass('legendOff');
				$.when($(document).find('.primary').removeClass('on').addClass('off')).then(function(){
					$(document).find('.secondary').removeClass('off').addClass('on');
				});
			});
		}else if($(this).find('.switchButton').hasClass('on')){
			$.when($(this).find('.switchButton').addClass('off').removeClass('on')).then(function(){
				$('.visionMain').removeClass('legendOff');
				$('.visionUser').addClass('legendOff');
				$.when($(document).find('.secondary').removeClass('on').addClass('off')).then(function(){
					$(document).find('.primary').removeClass('off').addClass('on');
				});
			});
		}
	});

});
<div id="loginForm" class="row">
	<div class="col-12 main-logo">
		<img src="{$configs['logo']}" class="img-fluid">
	</div>	
	<div class="col-3 form dock">
		{if isset($data['error']) and $data['error'] eq 'outofdate'}
			<div class="alert alert-danger msg">Este link está vencido, por favor solicite um novo link para redefinir sua senha.</div>
			<a href="./recuperar_senha">Retornar</a>
		{elseif isset($data['redefine'])}
			{if isset($data['success'])}
				<div class="alert alert-success msg">Sua senha foi alterada com sucesso.</div>
			{elseif isset($data['error'])}
				{if $data['error'] eq 'wrongpasswords'}
					<div class="alert alert-danger msg">As senhas não coincidem. Por favor, tente novamente.</div>
				{elseif $data['error'] eq 'samepasswords'}
					<div class="alert alert-danger msg">A nova senha não pode ser igual a anterior. Por favor, tente novamente.</div>
				{elseif $data['error'] eq 'tableerror'}
					<div class="alert alert-danger msg">Houve um erro de comunicação com o banco de dados. Por favor, tente mais tarde.</div>
				{/if}	
			{/if}
			<form name="login" action="" method="post" enctype="multipart/form-data" class="form-control">				
				{if isset($data['success'])}
					<a href="./login">Fazer Login</a>
				{else}
					<span class="title">Resetar Senha</span>
					<input type="password" name="senha" class="form-control" placeholder="Nova Senha:" required>
					<input type="password" name="confirma_senha" class="form-control" placeholder="Confirme a Nova Senha:" required> 
					<button name="send" class="btn btn-primary btn-block">Enviar</button>
				{/if}
			</form>	
		{/if}			
	</div>
</div>
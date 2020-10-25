<div id="loginForm" class="row">
	<div class="col-12 main-logo">
		<img src="{$configs['logo']}" class="img-fluid">
	</div>	
	<div class="col-3 form dock">
		{if isset($data['error'])}
			{if $data['error'] neq false}
				{foreach from=$data['error'] item=error}
				<div class="alert alert-danger msg">{$error}</div>
				{/foreach}
			{/if}
		{elseif isset($data['sent'])}
			<div class="alert alert-success msg">Link enviado, verifique seu e-mail em alguns minutos.</div>
		{/if}
		<form name="login" action="" method="post" enctype="multipart/form-data" class="form-control">
            <span class="title">Resetar Senha</span>
			<input type="email" name="email" class="form-control" placeholder="E-mail:" required>
			<button name="send" class="btn btn-primary btn-block">Enviar</button>
		</form>
	</div>
</div>
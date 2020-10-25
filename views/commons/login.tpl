<div class="bg-login">
	<div id="loginForm" class="row">
		<div class="col-12 main-logo">
			<img src="assets/imgs/LOGO-PNG-03.png" class="img-fluid">
		</div>	
		<div class="col-3 form dock">
			{if isset($data['error'])}
				<div class="alert alert-danger msg">{$data['error']}</div>
			{/if}
			<form name="login" action="" method="post" enctype="multipart/form-data" class="form-control">
				<input type="text" name="login" class="form-control" placeholder="Login:" required>
				<input type="password" name="senha" class="form-control" placeholder="Senha:" required>
				<button name="send" class="btn btn-primary btn-block btn-style">Entrar</button>
				<span class="recovery-link"><a href="recuperar_senha">Esqueci Minha Senha</a></span>
			</form>
		</div>
	</div>
</div>
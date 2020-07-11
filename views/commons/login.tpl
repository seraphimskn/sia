<div id="loginForm" class="row">
	<div class="col-12 main-logo">
		<img src="{$configs['logo']}" class="img-fluid">
	</div>	
	<div class="col-3 form dock">
		{if isset($data['error'])}
			<div class="alert alert-danger msg">{$data['error']}</div>
		{/if}
		<form name="login" action="" method="post" enctype="multipart/form-data" class="form-control">
			<input type="text" name="user_name" class="form-control" placeholder="Login:" required>
			<input type="password" name="password" class="form-control" placeholder="Password:" required>
			<button name="send" class="btn btn-primary btn-block">Entrar</button>
		</form>
	</div>
</div>
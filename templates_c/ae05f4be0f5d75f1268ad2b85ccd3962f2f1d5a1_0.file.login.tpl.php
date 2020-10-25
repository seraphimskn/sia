<?php
/* Smarty version 3.1.30, created on 2020-04-12 19:19:47
  from "/var/www/html/sigms/views/commons/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e9369d3e3d2f4_46451845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae05f4be0f5d75f1268ad2b85ccd3962f2f1d5a1' => 
    array (
      0 => '/var/www/html/sigms/views/commons/login.tpl',
      1 => 1586718917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9369d3e3d2f4_46451845 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="bg-login">
	<div id="loginForm" class="row">
		<div class="col-12 main-logo">
			<img src="assets/imgs/LOGO-PNG-03.png" class="img-fluid">
		</div>	
		<div class="col-3 form dock">
			<?php if (isset($_smarty_tpl->tpl_vars['data']->value['error'])) {?>
				<div class="alert alert-danger msg"><?php echo $_smarty_tpl->tpl_vars['data']->value['error'];?>
</div>
			<?php }?>
			<form name="login" action="" method="post" enctype="multipart/form-data" class="form-control">
				<input type="text" name="login" class="form-control" placeholder="Login:" required>
				<input type="password" name="senha" class="form-control" placeholder="Senha:" required>
				<button name="send" class="btn btn-primary btn-block btn-style">Entrar</button>
				<span class="recovery-link"><a href="recuperar_senha">Esqueci Minha Senha</a></span>
			</form>
		</div>
	</div>
</div><?php }
}

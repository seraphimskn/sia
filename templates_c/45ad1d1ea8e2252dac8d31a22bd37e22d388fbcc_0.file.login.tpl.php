<?php
/* Smarty version 3.1.30, created on 2020-07-24 03:34:29
  from "C:\xampp\htdocs\adm_conecta\views\commons\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f1a3aa52ba8e8_31592220',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45ad1d1ea8e2252dac8d31a22bd37e22d388fbcc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\adm_conecta\\views\\commons\\login.tpl',
      1 => 1595554467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f1a3aa52ba8e8_31592220 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="loginForm" class="row">
	<div class="col-12 main-logo text-center">
		<img src="<?php echo $_smarty_tpl->tpl_vars['configs']->value['logo'];?>
" class="img-fluid">
	</div>	
	<div class="col-3 form dock mx-auto">
		<?php if (isset($_smarty_tpl->tpl_vars['data']->value['error'])) {?>
			<div class="alert alert-danger msg"><?php echo $_smarty_tpl->tpl_vars['data']->value['error'];?>
</div>
		<?php }?>
		<form name="login" action="" method="post" enctype="multipart/form-data" class="form-control">
			<input type="text" name="user_name" class="form-control" placeholder="Login:" required>
			<input type="password" name="password" class="form-control" placeholder="Password:" required>
			<button name="send" class="btn btn-primary btn-block">Entrar</button>
		</form>
	</div>
</div><?php }
}

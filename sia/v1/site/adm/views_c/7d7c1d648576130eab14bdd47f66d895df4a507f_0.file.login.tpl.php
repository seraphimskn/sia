<?php
/* Smarty version 3.1.30, created on 2018-04-04 20:05:32
  from "C:\xampp\htdocs\bandnews\site\adm\views\commons\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac513ecece5c9_70991960',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d7c1d648576130eab14bdd47f66d895df4a507f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\adm\\views\\commons\\login.tpl',
      1 => 1522865130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac513ecece5c9_70991960 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="loginForm" class="row">
	<div class="col-12 main-logo">
		<img src="../<?php echo $_smarty_tpl->tpl_vars['configs']->value['logo'];?>
" class="img-fluid">
	</div>	
	<div class="col-3 form dock">
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

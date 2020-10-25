<?php
/* Smarty version 3.1.30, created on 2020-03-23 15:23:48
  from "/var/www/html/sigms/views/newcard/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e78d48405fc53_64831383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6de78cee37c498954bfdef3f5b08aa0a0233ba9a' => 
    array (
      0 => '/var/www/html/sigms/views/newcard/view.tpl',
      1 => 1584130659,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e78d48405fc53_64831383 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row col-12">
    <h4 class="title">Solicitar 2ª Via do seu Cartão</h4>
    <div class="form col-12">
        <form enctype="multipart/form-data" method="post" action="">
            <input type="hidden" name="userId" id="userID" value="<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
" />
            <button class="btn btn-success" id="newCard">Nova Carteirinha</button>
        </form>
    </div>
</div>
<div class="row col-12">
    <h4 class="title">Visualização Virtual</h4>
    <div class="clearfix col-12"></div>
    <div class="cartao col-10 row">
        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['qrCode']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    </div>
</div><?php }
}

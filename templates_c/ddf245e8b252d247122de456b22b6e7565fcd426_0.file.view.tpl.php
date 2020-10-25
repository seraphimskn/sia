<?php
/* Smarty version 3.1.30, created on 2020-03-27 12:50:53
  from "/var/www/html/sigms/views/levels/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e7df6adabc865_20141470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ddf245e8b252d247122de456b22b6e7565fcd426' => 
    array (
      0 => '/var/www/html/sigms/views/levels/view.tpl',
      1 => 1584130666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7df6adabc865_20141470 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Nível</th>
            <th scope="col"><a href="levels/add">Adicionar</a></th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['levels']->value, 'level');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['level']->value) {
?>
        <tr id="item-<?php echo $_smarty_tpl->tpl_vars['level']->value->id;?>
">
            <td><?php echo $_smarty_tpl->tpl_vars['level']->value->nome;?>
</td>
            <td><a href="levels/edit/<?php echo $_smarty_tpl->tpl_vars['level']->value->id;?>
">Editar</a> | <a href="#" data-id="<?php echo $_smarty_tpl->tpl_vars['level']->value->id;?>
" data-script="levels" class="sendDelete">Excluir</a></td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
</table><?php }
}

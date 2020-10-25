<?php
/* Smarty version 3.1.30, created on 2020-03-31 17:39:20
  from "/var/www/html/sigms/views/plans/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e83804817f327_69309062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47901c49e2f5ba0b752cd5af6ed2cc912b524a3b' => 
    array (
      0 => '/var/www/html/sigms/views/plans/view.tpl',
      1 => 1584130654,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e83804817f327_69309062 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Plano</th>
            <th scope="col">Valor</th>
            <th scope="col"><a href="plans/add">Adicionar</a></th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'plan');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
?>
        <tr id="item-<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
">
            <td><?php echo $_smarty_tpl->tpl_vars['plan']->value->nome;?>
</td>
            <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['plan']->value->valor,2,',','.');?>
</td>
            <td><a href="plans/edit/<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
">Editar</a> | <a href="#" data-id="<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
" data-script="plans" class="sendDelete">Excluir</a></td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
</table><?php }
}

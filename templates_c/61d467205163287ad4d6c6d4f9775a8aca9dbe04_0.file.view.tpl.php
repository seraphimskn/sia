<?php
/* Smarty version 3.1.30, created on 2020-04-12 19:13:13
  from "/var/www/html/sigms/views/points/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e936849610863_55083491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61d467205163287ad4d6c6d4f9775a8aca9dbe04' => 
    array (
      0 => '/var/www/html/sigms/views/points/view.tpl',
      1 => 1584130657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e936849610863_55083491 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Valor</th>            
            <th scope="col">Pontos</th>
            <th scope="col"><a href="points/add">Adicionar</a><th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pontos']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr id="item-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
            <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['item']->value->valor,2,',','.');?>
</td>            
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->pontos;?>
</td>
            <td><a href="points/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">Editar</a> | <a href="#" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
" data-script="points" class="sendDelete">Editar</a></td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <tbody>
</table><?php }
}

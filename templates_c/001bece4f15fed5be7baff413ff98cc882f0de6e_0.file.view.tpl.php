<?php
/* Smarty version 3.1.30, created on 2020-03-31 17:39:17
  from "/var/www/html/sigms/views/mailing/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e838045424808_96998037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '001bece4f15fed5be7baff413ff98cc882f0de6e' => 
    array (
      0 => '/var/www/html/sigms/views/mailing/view.tpl',
      1 => 1584130671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e838045424808_96998037 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Tipo de Mala-Direta</th>            
            <th scope="col">Data de Envio</th>
            <th scope="col">Usuários</th>
            <th scope="col">Tipo de envio</th>
            <th scope="col"><a href="mailing/add">Adicionar</a><th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mailing']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr id="mailing-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->tipo;?>
</td>            
            <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento));?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->destinatarios;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->tipo_envio;?>
</td>
            <td><a href="mailing/edit">Editar</a></td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <tbody>
</table><?php }
}

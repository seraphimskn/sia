<?php
/* Smarty version 3.1.30, created on 2020-01-16 15:28:17
  from "/var/www/html/sigms/views/nfe/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e208111f1d525_92212948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17806b0b2203fb9bf3e889c6333f17ac789f4b7c' => 
    array (
      0 => '/var/www/html/sigms/views/nfe/view.tpl',
      1 => 1578587525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e208111f1d525_92212948 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nº Nota</th>            
            <th scope="col">Contrato</th>
            <th scope="col">Beneficiário</th>
            <th scope="col">Data de Expedição</th>
            <th scope="col"><th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nfe']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr id="nfe-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
</td>            
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nota;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->beneficiario;?>
</td>
            <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento));?>
</td>
            <td><a href="nfe/view_nfe/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">Visualizar</a></td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <tbody>
</table><?php }
}

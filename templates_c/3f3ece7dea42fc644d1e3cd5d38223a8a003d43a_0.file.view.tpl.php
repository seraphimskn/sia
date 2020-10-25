<?php
/* Smarty version 3.1.30, created on 2020-03-31 17:39:24
  from "/var/www/html/sigms/views/payments/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e83804c3a1714_60081023',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f3ece7dea42fc644d1e3cd5d38223a8a003d43a' => 
    array (
      0 => '/var/www/html/sigms/views/payments/view.tpl',
      1 => 1584130658,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e83804c3a1714_60081023 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titular</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contratos']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr id="item-<?php echo $_smarty_tpl->tpl_vars['item']->value->id_contrato;?>
">
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->id_contrato;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->beneficiario;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->vendedor;?>
</td>
            <td>
            <?php if ($_smarty_tpl->tpl_vars['item']->value->status == 0) {?>
                <span class="badge badge-danger">Inativo</span>
            <?php } else { ?>
                <span class="badge badge-success">Ativo</span>
            <?php }?>
            </td>
            <td><a href="payments/contract_payments/<?php echo $_smarty_tpl->tpl_vars['item']->value->id_contrato;?>
">Ver Pagamentos do Contrato</a></td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
</table><?php }
}

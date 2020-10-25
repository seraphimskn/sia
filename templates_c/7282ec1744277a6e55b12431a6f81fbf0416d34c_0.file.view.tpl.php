<?php
/* Smarty version 3.1.30, created on 2020-03-27 12:51:56
  from "/var/www/html/sigms/views/bills/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e7df6ecd3c1e5_40284346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7282ec1744277a6e55b12431a6f81fbf0416d34c' => 
    array (
      0 => '/var/www/html/sigms/views/bills/view.tpl',
      1 => 1584130669,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7df6ecd3c1e5_40284346 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row col-12" id="bills">
    <h4 class="title">Boletos</h4>
    <?php if (isset($_smarty_tpl->tpl_vars['boletos']->value)) {?>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Código do Boleto</th>            
                <th scope="col">Vencimento</th>
                <th scope="col">Pagamento</th>
                <th scope="col">Valor</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['boletos']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <tr id="boleto-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value->codigo;?>
</td>            
                <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento));?>
</td>
                <td>
                <?php if (!is_null($_smarty_tpl->tpl_vars['item']->value->data_pagamento)) {?>
                    <?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento));?>

                <?php } else { ?>
                    --
                <?php }?>
                </td>
                <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['item']->value->valor,2,',','.');?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value->status;?>
</td>
                <td><a href="bills/add">2ª Via</a></td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <tbody>
    </table>
    <?php } else { ?>
        <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['boletos']->value;?>
</span>       
    <?php }?>
</div><?php }
}

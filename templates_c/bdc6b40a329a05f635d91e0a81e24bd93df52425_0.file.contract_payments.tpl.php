<?php
/* Smarty version 3.1.30, created on 2020-03-23 15:36:55
  from "/var/www/html/sigms/views/payments/contract_payments.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e78d797d7a1c5_26521366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdc6b40a329a05f635d91e0a81e24bd93df52425' => 
    array (
      0 => '/var/www/html/sigms/views/payments/contract_payments.tpl',
      1 => 1584130658,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e78d797d7a1c5_26521366 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Valor da Parcela</th>
            <th scope="col">Data do Vencimento</th>
            <th scope="col">Status</th>
            <th scope="col">Data do Pagamento</th>
            <th scope="col">Forma de Pagamento</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagamentos']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr id="item-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
</td>
            <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['item']->value->valor,2,',','.');?>
</td>
            <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento));?>
</td>            
            <td>
                <?php if ($_smarty_tpl->tpl_vars['item']->value->data_pagamento == '') {?>
                    <?php if (date('Y-m-d',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento)) > date('Y-m-d')) {?>
                        <span class="badge badge-primary">A vencer</span>
                    <?php } elseif (date('Y-m-d',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento)) == date('Y-m-d')) {?>
                        <span class="badge badge-warning">Vence hoje</span>
                    <?php } elseif (date('Y-m-d',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento)) < date('Y-m-d')) {?>
                        <span class="badge badge-danger">Atrasado</span>
                    <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['item']->value->data_pagamento != '') {?>
                    <span class="badge badge-success">Pago</span>
                <?php }?>
            </td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['item']->value->data_pagamento == '') {?>
                    <?php if (date('Y-m-d',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento)) > date('Y-m-d')) {?>
                        --
                    <?php } elseif (date('Y-m-d',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento)) == date('Y-m-d')) {?>
                        Vence hoje
                    <?php } else { ?>
                        Pagamento atrasado.
                    <?php }?>
                <?php } else { ?>
                    <?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_pagamento));?>

                <?php }?>
            </td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['item']->value->forma_pagamento == '') {?>
                    --
                <?php } elseif ($_smarty_tpl->tpl_vars['item']->value->forma_pagamento == 'cartao') {?>
                    Cartão de Crédito
                <?php } elseif ($_smarty_tpl->tpl_vars['item']->value->forma_pagamento == 'dinheiro') {?>
                    Dinheiro 
                <?php } elseif ($_smarty_tpl->tpl_vars['item']->value->forma_pagamento == 'cheque') {?>
                    Cheque
                <?php }?>
            </td>
            <td>
                <?php if (strtolower($_smarty_tpl->tpl_vars['userLevel']->value) == 'administrador' || strtolower($_smarty_tpl->tpl_vars['userLevel']->value) == 'super-administrador') {?> 
                    <?php if ($_smarty_tpl->tpl_vars['item']->value->data_pagamento != '') {?>
                    <?php } else { ?>
                        <a href="payments/register/<?php echo $_smarty_tpl->tpl_vars['item']->value->id_pagamento;?>
">Registrar Pagamento</a> | <a href="#" class="geraBoleto" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value->id_pagamento;?>
">Gerar Boleto</a>
                    <?php }?>
                <?php }?>
            </td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
</table><?php }
}

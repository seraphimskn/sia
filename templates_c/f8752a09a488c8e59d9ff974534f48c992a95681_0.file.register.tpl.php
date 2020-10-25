<?php
/* Smarty version 3.1.30, created on 2020-02-15 20:47:47
  from "/var/www/html/sigms/views/payments/register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e4858f3854cb2_21747548',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8752a09a488c8e59d9ff974534f48c992a95681' => 
    array (
      0 => '/var/www/html/sigms/views/payments/register.tpl',
      1 => 1581799647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4858f3854cb2_21747548 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editpayments">
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['idPagamento']->value;?>
">
         <div class="nome col">
            <label for="nome">Forma de Pagamento:</label>
            <select name="tipo_pagamento" class="form-control">
                <option value="">Selecione uma forma de pagamento</option>
                <option value="dinheiro">Dinheiro</option>
                <option value="cheque">Cheque</option>
                <option value="cartao">Cartão de Crédito</option>
            </select>
        </div>
        <div class="valor col row">
            <label for="valor">Valor:</label> <input type="text" name="valor" class="form-control" value="R$ <?php echo number_format($_smarty_tpl->tpl_vars['dados']->value->valor,2,',','.');?>
" readonly/>
        </div>     
        <div class="col">
            <button class="btn btn-success float-right" id="sendRegister">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelRegister">Cancelar</button>
        </div>
    </form>
</div><?php }
}

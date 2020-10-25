<?php
/* Smarty version 3.1.30, created on 2020-03-23 15:23:48
  from "/var/www/html/sigms/views/modules/qrCode.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e78d4840656f1_76565501',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e9fb2cff2eb00dab560ea94b09b15a40ac0665e' => 
    array (
      0 => '/var/www/html/sigms/views/modules/qrCode.tpl',
      1 => 1584130660,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e78d4840656f1_76565501 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-12 row mx-auto" id="cartao">
    <section class="col-5 row mx-auto" id="dados">
        <div class="col-12"><strong><?php echo $_smarty_tpl->tpl_vars['user']->value->nome;?>
</strong></div>
        <div class="col-12"><strong><?php echo $_smarty_tpl->tpl_vars['user']->value->cpf_cnpj;?>
</strong></div>
        <div class="col-12"><strong><?php echo $_smarty_tpl->tpl_vars['user']->value->data_nascimento;?>
</strong></div>
        <div class="col-12"><strong><?php echo $_smarty_tpl->tpl_vars['user']->value->data_vencimento;?>
</strong></div>
    </section>
    <section class="col-5 mx-auto" id="qrCode">
        <?php echo $_smarty_tpl->tpl_vars['qrcode']->value;?>

    </section>
</div>
<?php }
}

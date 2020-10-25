<?php
/* Smarty version 3.1.30, created on 2020-04-08 13:58:56
  from "/var/www/html/sigms/views/products/product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e8dd8a01d0955_25720269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee6f94b339a703045256120c5850fc6706fba15f' => 
    array (
      0 => '/var/www/html/sigms/views/products/product.tpl',
      1 => 1584130648,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8dd8a01d0955_25720269 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <div class="avatar col-5">
        <img src="<?php echo $_smarty_tpl->tpl_vars['produto']->value->imagem;?>
" class="img-fluid" />
    </div>
    <div class="col-7">
        <h3><?php echo $_smarty_tpl->tpl_vars['produto']->value->produto;?>
</h3>
        <hr />
        <h4>Loja: <?php echo $_smarty_tpl->tpl_vars['produto']->value->parceiro->nome;?>
</h4>
        <div class="col-12 row">
            <h4 class="col-12">Descrição do Produto:</h4>
            <div class="col-12"><?php echo $_smarty_tpl->tpl_vars['produto']->value->descricao;?>
</div>
            <div class="col-12">Quantidade disponível: <strong><?php echo $_smarty_tpl->tpl_vars['produto']->value->quantidade;?>
</strong> unidades</div>
            <div class="col-12">Valor em pontos: <strong><?php echo $_smarty_tpl->tpl_vars['produto']->value->pontos;?>
</strong> pontos</div>
            <?php if ($_smarty_tpl->tpl_vars['qtdPontos']->value > 0) {?>
                <div class="col-12 mt-4" ><span class="alert alert-warning">Você ainda precisa de <strong><?php echo $_smarty_tpl->tpl_vars['qtdPontos']->value;?>
</strong> para resgatar este produto!</span></div>
            <?php } elseif (is_null($_smarty_tpl->tpl_vars['qtdPontos']->value)) {?>
                <div class="col-12 mt-4" ><span class="alert alert-warning">Você ainda não possui pontos de fidelidade. Use seu cartão e ganhe pontos!</span></div>
            <?php } else { ?>
                <div class="col-12 mt-4"><span class="alert alert-success">Você já pode resgatar este produto, vá até uma loja <?php echo $_smarty_tpl->tpl_vars['produto']->value->parceiro->nome;?>
 e peça o resgate do produto!</span></div>
            <?php }?>
        </div>
    </div>    
</div><?php }
}

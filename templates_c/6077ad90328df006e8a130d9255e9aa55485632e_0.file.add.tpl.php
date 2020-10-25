<?php
/* Smarty version 3.1.30, created on 2020-04-12 19:13:22
  from "/var/www/html/sigms/views/points/add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e936852d38c00_38564647',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6077ad90328df006e8a130d9255e9aa55485632e' => 
    array (
      0 => '/var/www/html/sigms/views/points/add.tpl',
      1 => 1584130656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e936852d38c00_38564647 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="addpoints">
        <input type="hidden" name="send" value="add" />
        <input type="hidden" name="id_parceiro" value="<?php echo $_smarty_tpl->tpl_vars['parceiro']->value;?>
" />
        <div class="nome col">
            <label for="nome">Valor:</label> <input type="text" name="valor" class="form-control" required/>
        </div>
        <div class="cpf_cnpj col">
            <label for="cpf_cnpj">Pontos:</label> <input type="text" name="pontos" class="form-control" required/>
        </div>        
        <div class="col">
            <button class="btn btn-success float-right" id="sendAdd">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div><?php }
}

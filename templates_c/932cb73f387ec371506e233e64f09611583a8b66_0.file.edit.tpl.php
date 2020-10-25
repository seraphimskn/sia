<?php
/* Smarty version 3.1.30, created on 2020-02-18 13:15:46
  from "/var/www/html/sigms/views/plans/edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e4be382ab3a99_62795403',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '932cb73f387ec371506e233e64f09611583a8b66' => 
    array (
      0 => '/var/www/html/sigms/views/plans/edit.tpl',
      1 => 1581543374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4be382ab3a99_62795403 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editplans">
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
" />
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->nome;?>
" />
        </div>
        <div class="valor col row">
            <label for="valor">Valor:</label> <input type="text" name="valor" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->valor;?>
"/>
        </div>
        <div class="ativo col row">
            <p>Nível Ativo:</p> 
            <div class="col-12"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value->ativo == 1) {?>checked<?php }?> /></div>
            <div class="col-12"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value->ativo == 1) {?>checked<?php }?> /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendEdit">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}

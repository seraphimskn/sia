<?php
/* Smarty version 3.1.30, created on 2020-02-17 18:08:45
  from "/var/www/html/sigms/views/contracts/add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e4ad6ad0a4627_94230811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd64675bc4c214cbb92223cd2914b1f948d918e63' => 
    array (
      0 => '/var/www/html/sigms/views/contracts/add.tpl',
      1 => 1581543366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4ad6ad0a4627_94230811 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form row float-left col-12">
    <div class="tipo_contrato col-12 my-5" id="selecionaTipoContrato">
        <label for="tipo_contrato">Informe abaixo se o contrato é novo ou já existente:</label>
        <select class="form-control">
            <option value="">Selecione um</option>
            <option value="novo">Novo Contrato</option>
            <option value="existente">Contrato Já Existente</option>
        </select>
    </div>
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="addcontract">        
    </form>
</div><?php }
}

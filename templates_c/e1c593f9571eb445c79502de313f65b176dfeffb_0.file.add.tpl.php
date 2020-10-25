<?php
/* Smarty version 3.1.30, created on 2020-02-14 19:48:45
  from "/var/www/html/sigms/views/plans/add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e46f99db727b2_80771724',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1c593f9571eb445c79502de313f65b176dfeffb' => 
    array (
      0 => '/var/www/html/sigms/views/plans/add.tpl',
      1 => 1581543374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e46f99db727b2_80771724 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="addplans">
    <input type="hidden" name="send" value="add" />
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" required/>
        </div>
        <div class="valor col row">
            <label for="valor">Valor:</label> <input type="text" name="valor" class="form-control" required/>
        </div>
        <div class="seguro col row">
            <label for="seguro">Possui seguro de vida:</label> <input type="checkbox" name="seguro_vida" value="1" class="form-control" />
        </div>
        <div class="ativo col row">
            <p>Nível Ativo:</p> 
            <div class="col-12"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" /></div>
            <div class="col-12"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendAdd">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div><?php }
}

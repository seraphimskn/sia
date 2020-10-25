<?php
/* Smarty version 3.1.30, created on 2020-03-13 14:46:47
  from "/var/www/html/sigms/views/mailing/add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e6b9cd7be4173_96036900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40068fa64102808efbb1692fcbdb0f574b621dc5' => 
    array (
      0 => '/var/www/html/sigms/views/mailing/add.tpl',
      1 => 1584106786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6b9cd7be4173_96036900 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="addmailing">
    <input type="hidden" name="send" value="add" />
    <input type="hidden" name="id_usuario" />
        <div class="col">
            <h5>Tipo de Mala-Direta</h5>
            <input type="radio" name="tipo" value="aniversario" id="aniversario" /> <label for="aniversario">Aniversariantes do Mês</label>
            <input type="radio" name="tipo" value="oferta" id="oferta" /> <label for="oferta">Ofertas</label>
            <input type="radio" name="tipo" value="informativo" id="informativo" /> <label for="informativo">Informativo</label>
            <input type="radio" name="tipo" value="vencimento_de_contrato" id="vencimento" /> <label for="vencimento">Vencimento de Contrato</label>
        </div>
        <div class="col">
            <h5>Tipo de Envio</h5>
            <select name="tipo_envio" id="tipo_envio" class="form-control">
                <option value="">Selecione a forma de envio da mala-direta</option>
                <option value="sms">SMS</option>
                <option value="email">E-Mail</option>
                <option value="all">E-Mail e SMS</option>
            </select>
        </div>
        <div class="col">
            <label for="destinatarios">Destinatarios</label>
            <small class="col-12"><strong>Caso haja mais de um destinatário, separe-os com um ';'</strong></small>
            <textarea class="form-control" id="destinatarios" name="destinatarios"></textarea>
        </div>
        <div class="col">
            <label for="conteudo">Conteúdo a ser enviado</label>
            <textarea class="form-control" id="conteudo" name="conteudo"></textarea>
        </div>
        <div class="col">
            <label for="observacoes">Observações</label>
            <textarea class="form-control" id="observacoes" name="observacoes"></textarea>
        </div>
        <div class="col">
            <button class="btn btn-success float-right" id="sendAdd">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['tinyMCE']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}

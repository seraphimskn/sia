<?php
/* Smarty version 3.1.30, created on 2020-04-12 19:06:33
  from "/var/www/html/sigms/views/levels/edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e9366b90aa0f6_83735405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'baf72d17a48e2ae99c53288160e7f14c8a61c509' => 
    array (
      0 => '/var/www/html/sigms/views/levels/edit.tpl',
      1 => 1584130666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9366b90aa0f6_83735405 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['levels']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editlevels">
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['the_id']->value;?>
" />
    <input type="hidden" name="userName" value="<?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
">
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->nome;?>
" required/>
        </div>
        <div class="permissoes col row">
            <div class="todos col-3 border rounded">
                <p class="title h4 border-bottom">Todas as Permissões <input type="checkbox" class="form-controll float-right" value="all" name="all" <?php if ($_smarty_tpl->tpl_vars['item']->value->permissoes == 'all') {?>checked<?php }?> /></p>
            </div>
            <div class="usuarios col-3 border rounded">
                <p class="title h4 border-bottom">Usuários </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="usuarios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios) && in_array('adicionar',$_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios)) {?>checked<?php }?> /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="usuarios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios) && in_array('visualizar',$_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios)) {?>checked<?php }?> /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="usuarios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios) && in_array('editar',$_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios)) {?>checked<?php }?> /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="usuarios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios) && in_array('apagar',$_smarty_tpl->tpl_vars['item']->value->permissoes->usuarios)) {?>checked<?php }?> /></p>
            </div>
            <div class="niveis col-3 border rounded">
                <p class="title h4 border-bottom">Níveis </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="niveis[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->niveis) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->niveis) && in_array('adicionar',$_smarty_tpl->tpl_vars['item']->value->permissoes->niveis)) {?>checked<?php }?> /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="niveis[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->niveis) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->niveis) && in_array('visualizar',$_smarty_tpl->tpl_vars['item']->value->permissoes->niveis)) {?>checked<?php }?> /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="niveis[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->niveis) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->niveis) && in_array('editar',$_smarty_tpl->tpl_vars['item']->value->permissoes->niveis)) {?>checked<?php }?> /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="niveis[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->niveis) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->niveis) && in_array('apagar',$_smarty_tpl->tpl_vars['item']->value->permissoes->niveis)) {?>checked<?php }?> /></p>
            </div>
             <div class="planos col-3 border rounded">
                <p class="title h4 border-bottom">Planos </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="planos[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->planos) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->planos) && in_array('adicionar',$_smarty_tpl->tpl_vars['item']->value->permissoes->planos)) {?>checked<?php }?> /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="planos[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->planos) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->planos) && in_array('visualizar',$_smarty_tpl->tpl_vars['item']->value->permissoes->planos)) {?>checked<?php }?> /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="planos[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->planos) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->planos) && in_array('editar',$_smarty_tpl->tpl_vars['item']->value->permissoes->planos)) {?>checked<?php }?> /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="planos[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->planos) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->planos) && in_array('apagar',$_smarty_tpl->tpl_vars['item']->value->permissoes->planos)) {?>checked<?php }?> /></p>
            </div>
            <div class="relatorios col-3 border rounded">
                <p class="title h4 border-bottom">Relatórios </p>
                <p class="h5">Adimplência <input type="checkbox" class="form-controll" value="adimplencia" name="relatorios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && in_array('adimplencia',$_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios)) {?>checked<?php }?>/></p>
                <p class="h5">Aniversariantes <input type="checkbox" class="form-controll" value="aniversariantes" name="relatorios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && in_array('aniversariantes',$_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios)) {?>checked<?php }?>/></p>
                <p class="h5">Novos Beneficiários <input type="checkbox" class="form-controll" value="novos_beneficiarios" name="relatorios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && in_array('novos_beneficiarios',$_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios)) {?>checked<?php }?> /></p>
                <p class="h5">Medição <input type="checkbox" class="form-controll" value="medicao" name="relatorios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && in_array('medicao',$_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios)) {?>checked<?php }?>/></p>
                <p class="h5">Segurados <input type="checkbox" class="form-controll" value="segurados" name="relatorios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && in_array('segurados',$_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios)) {?>checked<?php }?>/></p>
                <p class="h5">Vendas por Vendedor <input type="checkbox" class="form-controll" value="vendas_por_vendedor" name="relatorios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && in_array('vendas_por_vendedor',$_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios)) {?>checked<?php }?>/></p>
                <p class="h5">Compras <input type="checkbox" class="form-controll" value="compras" name="relatorios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && in_array('compras',$_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios)) {?>checked<?php }?>/></p>
                <p class="h5">Vendas <input type="checkbox" class="form-controll" value="venda_individual" name="relatorios[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios) && in_array('venda_individual',$_smarty_tpl->tpl_vars['item']->value->permissoes->relatorios)) {?>checked<?php }?>/></p>
            </div>
            <div class="boletos col-3 border rounded">
                <p class="title h4 border-bottom">Boletos </p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="boletos[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->boletos)) {?>checked<?php }?>/></p>
            </div>
            <div class="contrato col-3 border rounded">
                <p class="title h4 border-bottom">Contrato </p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="contrato[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->contrato) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->contrato) && in_array('visualizar',$_smarty_tpl->tpl_vars['item']->value->permissoes->contrato)) {?>checked<?php }?>/></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="adicionar" name="contrato[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->contrato) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->contrato) && in_array('adicionar',$_smarty_tpl->tpl_vars['item']->value->permissoes->contrato)) {?>checked<?php }?>/></p>
            </div>
            <div class="mailing col-3 border rounded">
                <p class="title h4 border-bottom">Mailing  </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="mailing[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->mailing) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->mailing) && in_array('adicionar',$_smarty_tpl->tpl_vars['item']->value->permissoes->mailing)) {?>checked<?php }?>/></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="mailing[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->mailing) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->mailing) && in_array('visualizar',$_smarty_tpl->tpl_vars['item']->value->permissoes->mailing)) {?>checked<?php }?>/></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="mailing[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->mailing) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->mailing) && in_array('editar',$_smarty_tpl->tpl_vars['item']->value->permissoes->mailing)) {?>checked<?php }?>/></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="mailing[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->mailing) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->mailing) && in_array('apagar',$_smarty_tpl->tpl_vars['item']->value->permissoes->mailing)) {?>checked<?php }?>/></p>
            </div>
            <div class="produtos col-3 border rounded">
                <p class="title h4 border-bottom">Produtos </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="produtos[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->produtos) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->produtos) && in_array('adicionar',$_smarty_tpl->tpl_vars['item']->value->permissoes->produtos)) {?>checked<?php }?>/></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="produtos[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->produtos) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->produtos) && in_array('visualizar',$_smarty_tpl->tpl_vars['item']->value->permissoes->produtos)) {?>checked<?php }?>/></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="produtos[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->produtos) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->produtos) && in_array('editar',$_smarty_tpl->tpl_vars['item']->value->permissoes->produtos)) {?>checked<?php }?>/></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="produtos[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->produtos) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->produtos) && in_array('apagar',$_smarty_tpl->tpl_vars['item']->value->permissoes->produtos)) {?>checked<?php }?>/></p>
            </div>
            <div class="nfe col-3 border rounded">
                <p class="title h4 border-bottom">NFe </p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="nfe[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->nfe)) {?>checked<?php }?>/></p>
            </div>
            <div class="fidelidade col-3 border rounded">
                <p class="title h4 border-bottom">Fidelidade </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="fidelidade[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade) && in_array('adicionar',$_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade)) {?>checked<?php }?>/></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="fidelidade[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade) && in_array('visualizar',$_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade)) {?>checked<?php }?>/></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="fidelidade[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade) && in_array('editar',$_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade)) {?>checked<?php }?>/></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="fidelidade[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade) && in_array('apagar',$_smarty_tpl->tpl_vars['item']->value->permissoes->fidelidade)) {?>checked<?php }?>/></p>
            </div>
            <div class="2-via col-3 border rounded">
                <p class="title h4 border-bottom">2ª Via de Carteirinha </p>
                <p class="h5">Solicitar <input type="checkbox" class="form-controll" value="adicionar" name="segunda_via[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->segunda_via) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->segunda_via) && in_array('adicionar',$_smarty_tpl->tpl_vars['item']->value->permissoes->segunda_via)) {?>checked<?php }?>/></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="segunda_via[]" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->permissoes->segunda_via) && is_array($_smarty_tpl->tpl_vars['item']->value->permissoes->segunda_via) && in_array('visualizar',$_smarty_tpl->tpl_vars['item']->value->permissoes->segunda_via)) {?>checked<?php }?>/></p>
            </div>
        </div>
        <div class="ativo col row">
            <p>Nível Ativo:</p> 
            <div class="col-12"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->ativo) && $_smarty_tpl->tpl_vars['item']->value->ativo == 1) {?>checked<?php }?>/></div>
            <div class="col-12"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" <?php if (isset($_smarty_tpl->tpl_vars['item']->value->ativo) && $_smarty_tpl->tpl_vars['item']->value->ativo == 0) {?>checked<?php }?>/></div>
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

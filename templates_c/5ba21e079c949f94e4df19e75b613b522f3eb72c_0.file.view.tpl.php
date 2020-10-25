<?php
/* Smarty version 3.1.30, created on 2020-03-27 12:49:12
  from "/var/www/html/sigms/views/reports/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e7df6481f3ac9_22723329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ba21e079c949f94e4df19e75b613b522f3eb72c' => 
    array (
      0 => '/var/www/html/sigms/views/reports/view.tpl',
      1 => 1584130651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7df6481f3ac9_22723329 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="general row col-12">
    <?php if ($_smarty_tpl->tpl_vars['dataUser']->value->permissoes == 'all') {?>
    <div class="row col-6 " id="payments">
        <h4 class="title">Relatório de Adimplência</h4>        
        <?php if (isset($_smarty_tpl->tpl_vars['data']->value->payments)) {?>            
            <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->payments)) {?>
            <table class="table table-sm table-striped">
                <thead>
                    <th scope="col">Contrato</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Status</th>
                    <th scope="col"><a href="reports/payments">Ver Todos</a></th>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->payments, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr id="contract-<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->usuario;?>
</td>
                        <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento));?>
</td>
                        <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['item']->value->valor,2,',','.');?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value->status == 0 && $_smarty_tpl->tpl_vars['item']->value->data_vencimento <= date('Y-m-d')) {?>
                                <span class="badge badge-danger">ATRASADO</span>
                            <?php } elseif ($_smarty_tpl->tpl_vars['item']->value->status == 0 && $_smarty_tpl->tpl_vars['item']->value->data_vencimento > date('Y-m-d')) {?>
                                <span class="badge badge-secondary">ABERTO</span>
                            <?php } else { ?>
                                <span class="badge badge-success">PAGO</span>
                            <?php }?>
                        </td>
                        <td><a href="reports/report/<?php echo $_smarty_tpl->tpl_vars['item']->value->boleto;?>
">Detalhar</a></td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <tbody>
            </table>
            <?php } else { ?>
                <span class="alert alert-danger text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->payments;?>
</span>
            <?php }?>
        <?php }?>
    </div>
    <div class="table row col-6 " id="births">
        <h4 class="title">Relatório de Aniversariantes</h4>
        <?php if (isset($_smarty_tpl->tpl_vars['data']->value->births)) {?>            
            <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->births)) {?>
            <table class="table table-sm table-striped">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col">Idade</th>
                    <th scope="col"><a href="reports/births">Ver Todos</a></th>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->births, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr id="user-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nome;?>
</td>
                        <td><?php echo date('d/m',strtotime($_smarty_tpl->tpl_vars['item']->value->data_nascimento));?>
</td>
                        <td><?php echo date('Y')-date('Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_nascimento));?>
</td>                        
                        <td><a href="mailing/birthday/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">Enviar Parabéns</a></td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </tbody>
            </table>
            <?php } else { ?>
                <span class="alert alert-danger text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->births;?>
</span>
            <?php }?>
        <?php }?>
    </div>
    <div class="table row col-6 " id="newcomers">
        <h4 class="title">Relatório de Novos Beneficiários</h4>
        <?php if (isset($_smarty_tpl->tpl_vars['data']->value->newcomers)) {?>
            <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->newcomers)) {?>
            <table class="table table-sm table-striped">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col"><a href="reports/newcomers">Ver Todos</a></th>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->newcomers, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr id="user-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nome;?>
</td>
                        <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_cadastro));?>
</td>                  
                        <td><a href="reports/report/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">Detalhes</a></td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </tbody>
            </table>
            <?php } else { ?>
                <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->newcomers;?>
</span>
            <?php }?>
        <?php }?>
    </div>
    <div class="table row col-6 " id="prospects">
        <h4 class="title">Relatório de Medição</h4>
        <?php if (isset($_smarty_tpl->tpl_vars['data']->value->prospects)) {?>
            <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->prospects)) {?>
                <div class="table-headers row col-12">
                    <div class="col">Valor Total Recebido</div>
                    <div class="col">Data</div>
                    <div class="col"><a href="reports/prospects">Detalhar</a></div>
                </div>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->prospects, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <article class="table-row row col-12" id="prospect">
                        <div class="col">R$ <?php echo number_format($_smarty_tpl->tpl_vars['item']->value,2,',','.');?>
</div>
                        <div class="col"><?php echo date('d/m/Y');?>
</div>
                        <div class="col"></div>   
                    </article>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php } else { ?>
                <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->prospects;?>
</span>
            <?php }?>
        <?php }?>
    </div>
    <div class="table row col-6 " id="assurances">
        <h4 class="title">Relatório de Segurados</h4>
        <?php if (isset($_smarty_tpl->tpl_vars['data']->value->assurances)) {?>
            <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->assurances)) {?>
            <table class="table table-sm table-striped">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Data do Cadastro</th>
                    <th scope="col"><a href="reports/assurances">Detalhar</a></th>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->assurances, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr id="user-<?php echo $_smarty_tpl->tpl_vars['item']->value->id_usuario;?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nome_usuario;?>
</td>
                        <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_cadastro));?>
</td>                  
                        <td><a href="reports/report/<?php echo $_smarty_tpl->tpl_vars['item']->value->id_usuario;?>
">Detalhes</a></td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </tbody>
            </table>
            <?php } else { ?>
                <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->assurances;?>
</span>
            <?php }?>
        <?php }?>
    </div>
    <div class="table row col-6 " id="by-seller">
        <h4 class="title">Relatório de Cadastros por Vendedor</h4>
        <?php if (isset($_smarty_tpl->tpl_vars['data']->value->byseller)) {?>
            <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->byseller)) {?>
            <table class="table table-sm table-striped">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Data da Venda</th>
                    <th scope="col">Nome do Vendedor</th>
                    <th scope="col"><a href="reports/byseller">Ver Todos</a></th>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->byseller, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr id="contrato-<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->beneficiario;?>
</td>
                        <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_venda));?>
</td>     
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->vendedor;?>
</td>             
                        <td><a href="reports/report/<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">Detalhes</a></td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </tbody>
            </table>
            <?php } else { ?>
                <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->byseller;?>
</span>
            <?php }?>
        <?php }?>
    </div>
    <?php }?>
    <?php if (is_array($_smarty_tpl->tpl_vars['dataUser']->value->permissoes)) {?>
        <?php if (isset($_smarty_tpl->tpl_vars['dataUser']->value->permissoes['relatorios']) && $_smarty_tpl->tpl_vars['dataUser']->value->permissoes['relatorios'] == 'compras') {?>
        <div class="table row col-12" id="financials">
            <h4 class="title">Relatórios Financeiros</h4>
            <?php if (isset($_smarty_tpl->tpl_vars['data']->value->financials)) {?>
                <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->financials)) {?>
                <table class="table table-striped">
                    <thead>
                        <th scope="col">Nota N°</th>
                        <th scope="col">Data da Venda</th>
                        <th scope="col">Nome do Beneficiário</th>
                        <th scope="col">Valor da Nota</th>
                        <th scope="col"><a href="reports/financials">Ver Todos</a></th>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->financials, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr id="venda-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nota;?>
</td>
                            <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_compra));?>
</td>     
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->beneficiario;?>
</td>
                            <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['item']->value->valor,2,',','.');?>
</td>             
                            <td><a href="reports/report/<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">Detalhes</a></td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </tbody>
                </table>
                <?php } else { ?>
                    <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->financials;?>
</span>
                <?php }?>
            <?php }?>        
        </div>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['dataUser']->value->permissoes['relatorios']) && $_smarty_tpl->tpl_vars['dataUser']->value->permissoes['relatorios'] == 'venda_individual') {?>
        <div class="table row col-6 " id="sells">
            <h4 class="title">Relatório de Vendas</h4>
            <?php if (isset($_smarty_tpl->tpl_vars['data']->value->selling)) {?>
                <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->selling)) {?>
                <table class="table table-striped">
                    <thead>
                        <th scope="col">Nº do Contrato</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data da Venda</th>
                        <th scope="col"><a href="reports/byseller">Ver Todos</a></th>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->selling, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr id="contrato-<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->beneficiario;?>
</td>
                            <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_venda));?>
</td>   
                            <td><a href="reports/report/<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">Detalhes</a></td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </tbody>
                </table>
                <?php } else { ?>
                    <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->selling;?>
</span>
                <?php }?>
            <?php }?>
        </div>
        <?php }?>
    <?php }?>
</div><?php }
}

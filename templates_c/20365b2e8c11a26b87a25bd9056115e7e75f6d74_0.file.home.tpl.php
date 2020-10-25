<?php
/* Smarty version 3.1.30, created on 2020-04-12 19:15:54
  from "/var/www/html/sigms/views/commons/home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e9368ea0d2f10_61241749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20365b2e8c11a26b87a25bd9056115e7e75f6d74' => 
    array (
      0 => '/var/www/html/sigms/views/commons/home.tpl',
      1 => 1586718917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9368ea0d2f10_61241749 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['userLevel']->value == 'administrador' || $_smarty_tpl->tpl_vars['userLevel']->value == 'super-administrador') {
$_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['googleAPI']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="row primary on">
    <table class="col-5 table table-borderless table-striped table-sm" id="last-users">
        <thead>
            <tr>
                <th colspan="2"><h5>Últimos Cadastros</h5></th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($_smarty_tpl->tpl_vars['users']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                <tr id="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->nome;?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['user']->value->data_cadastro));?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>
        </tbody>
    </table>
    <section class="col-5 table" id="financial-use">
        <h5>Valor Total Gasto Através do Cartão</h5>
        <article id="total" class="table-row row">
        <?php if (isset($_smarty_tpl->tpl_vars['compras']->value)) {?>
           <div class="col">Total de Gastos até <?php echo date('d/m/Y');?>
</div> 
           <div class="col">R$<?php echo $_smarty_tpl->tpl_vars['compras']->value;?>
</div>
        <?php }?>
        </article>
        <table class="col-12 table table-sm table-striped" id="financial-use-by-user">
            <thead> 
                <th colspan="2"><h5>Valores gastos por usuários</h5></th>
            </thead>
            <tbody>
            <?php if (isset($_smarty_tpl->tpl_vars['gastosUsuarios']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gastosUsuarios']->value, 'usuario');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['nome'];?>
</td>
                        <td>R$ <?php echo $_smarty_tpl->tpl_vars['usuario']->value['valorTotal'];?>
</td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php }?>
            </tbody>
        </table>
    </section>
</div>
<div class="row col-12 secondary off" id="dashboard-beneficiario">
    <div class="fidelidade col-6">
        <h3>Você possui</h3>
        <h4><?php echo $_smarty_tpl->tpl_vars['fidelidade']->value[0]->pontos;?>
 pts</h4>
    </div>    
    <div class="proxima-parcela col-6">
        <?php if (date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['data_pagamento']->value)) < date('d/m/Y')) {?>
        <h3>Sua parcela está atrasada</h3>
        <h4>Vencimento: <strong style="color: red"><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['data_pagamento']->value));?>
</strong></h4>
        <?php } else { ?>
        <h3>Sua próxima parcela vence no dia</h3>
        <h4><strong style="color: green"><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['data_pagamento']->value));?>
</strong></h4>
        <?php }?>
    </div>
    <div class="compras col-12">
        <h3>Suas últimas compras</h3>
        <?php if (is_array($_smarty_tpl->tpl_vars['compras']->value)) {?>
        <table class="table table-striped table-hover">
            <thead class="table-headers">
                <tr>
                    <th scope="col">Local da compra</th>
                    <th scope="col">Valor da compra</th>
                    <th scope="col">Data da compra</th>
                    <th scope="col">Pontos ganhos</th>
                </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compras']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr id="contrato-<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nome_parceiro;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->valor_compra;?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_compra));?>
</td>    
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->pontos;?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
        </table>
        <?php } else { ?>
        <span class="alert alert-warning"><?php echo $_smarty_tpl->tpl_vars['compras']->value;?>
</span>
        <?php }?>
    </div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['userLevel']->value == 'vendedor') {?>
<div class="row primary on">
    <div class="row col-8" id="sells">
        <h4 class="title">Relatório de Vendas</h4>
        <?php if (isset($_smarty_tpl->tpl_vars['data']->value->selling)) {?>
            <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->selling)) {?>
            <table class="table table-striped table-hover">
                <thead class="table-headers row col-12">
                    <tr>
                        <th scope="col">Nº do Contrato</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data da Venda</th>
                        <th scope="col"></th>
                    </tr>
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
</div>
<div class="row col-12 secondary off" id="dashboard-beneficiario">
    <div class="fidelidade col-6">
        <h3>Você possui</h3>
        <h4><?php echo $_smarty_tpl->tpl_vars['fidelidade']->value[0]->pontos;?>
 pts</h4>
    </div>    
    <div class="proxima-parcela col-6">
        <?php if (date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['data_pagamento']->value)) < date('d/m/Y')) {?>
        <h3>Sua parcela está atrasada</h3>
        <h4>Vencimento: <strong style="color: red"><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['data_pagamento']->value));?>
</strong></h4>
        <?php } else { ?>
        <h3>Sua próxima parcela vence no dia</h3>
        <h4><strong style="color: green"><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['data_pagamento']->value));?>
</strong></h4>
        <?php }?>
    </div>
    <div class="compras col-12">
        <h3>Suas últimas compras</h3>
        <?php if (is_array($_smarty_tpl->tpl_vars['compras']->value)) {?>
        <table class="table table-striped table-hover">
            <thead class="table-headers">
                <tr>
                    <th scope="col">Local da compra</th>
                    <th scope="col">Valor da compra</th>
                    <th scope="col">Data da compra</th>
                    <th scope="col">Pontos ganhos</th>
                </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compras']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr id="contrato-<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nome_parceiro;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->valor_compra;?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_compra));?>
</td>    
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->pontos;?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
        </table>
        <?php } else { ?>
        <span class="alert alert-warning"><?php echo $_smarty_tpl->tpl_vars['compras']->value;?>
</span>
        <?php }?>
    </div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['userLevel']->value == 'beneficiario') {?>
<div class="row col-12" id="dashboard-beneficiario">
    <div class="fidelidade col-6">
        <h3>Você possui</h3>
        <h4><?php echo $_smarty_tpl->tpl_vars['fidelidade']->value[0]->pontos;?>
 pts</h4>
    </div>    
    <div class="proxima-parcela col-6">
        <?php if (date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['data_pagamento']->value)) < date('d/m/Y')) {?>
        <h3>Sua parcela está atrasada</h3>
        <h4>Vencimento: <strong style="color: red"><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['data_pagamento']->value));?>
</strong></h4>
        <?php } else { ?>
        <h3>Sua próxima parcela vence no dia</h3>
        <h4><strong style="color: green"><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['data_pagamento']->value));?>
</strong></h4>
        <?php }?>
    </div>
    <div class="compras col-12">
        <h3>Suas últimas compras</h3>
        <?php if (is_array($_smarty_tpl->tpl_vars['compras']->value)) {?>
        <table class="table table-striped table-hover">
            <thead class="table-headers">
                <tr>
                    <th scope="col">Local da compra</th>
                    <th scope="col">Valor da compra</th>
                    <th scope="col">Data da compra</th>
                    <th scope="col">Pontos ganhos</th>
                </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compras']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr id="contrato-<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nome_parceiro;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->valor_compra;?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_compra));?>
</td>    
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->pontos;?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
        </table>
        <?php } else { ?>
        <span class="alert alert-warning"><?php echo $_smarty_tpl->tpl_vars['compras']->value;?>
</span>
        <?php }?>
    </div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['userLevel']->value == 'parceiro') {?>
<div class="row" id="dashboard-parceiro">
    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['scannerModule']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <div class="col-5 row">
        <form class="form-control col-10" method="post" enctype="multipart/form-data" action="" id="searchuser">
            <div class="h3 text-center col-12">Busca por CPF do Beneficiario</div>
            <div class="clear col-12 my-auto py-2"></div>
            <div class="row">
                <input type="text" class="form-control col-8" name="cpf" placeholder="Digite o CPF"> <button class="btn btn-primary col-4" id="search-user"><i class="fa fa-search" aria-hidden="true"></i></button>            
            </div>
        </form>
    </div>
</div>
<div class="col-5 my-3 mx-auto" id="result">
    <section class="row" id="beneficiario" style="display: none">
        <div class="avatar col-6 mx-auto">
            <img src="" class="img-fluid" id="imagem" />
            <h5 id="nome"></h5>
        </div>
        <div class="dados col-12">
            <table class="table table-sm table-striped">
                <tr>
                    <th scope="row">ID de Usuário</th>
                    <td id="id_user"></td>
                </tr>
                <tr>
                    <th scope="row">Status do Contrato</th>
                    <td id="status"></td>
                </tr>                        
            </table>
        </div>
        <div class="dados_venda col-12">
            <form class="form-controll" id="sendVenda">
                <input type="hidden" name="id_parceiro" value="<?php echo $_smarty_tpl->tpl_vars['dataUser']->value->id;?>
" />
                <input type="hidden" name="id_usuario" id="id_usuario" value="" />
                <input type="hidden" name="desconto" value="<?php echo $_smarty_tpl->tpl_vars['dataUser']->value->desconto;?>
" />
                <input type="hidden" name="send" value="compra" />
                <div>
                    <label>Nº da Nota:</label>
                    <input type="text" name="nota" placeholder="Digite o número da nota da compra" class="form-control" />
                </div>
                <div>
                    <label>Valor da Compra</label>
                    <input type="text" name="valor" placeholder="Digite o valor da compra" class="form-control" />
                </div>
                <button class="btn btn-success" id="sendCompra" value="send">Revisar compra</button>
            </form>
        </div>
    </section>
</div>
<?php }
}
}

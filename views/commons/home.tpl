{if $userLevel eq 'administrador' || $userLevel eq 'super-administrador'}
{include file=$googleAPI}
<div class="row primary on">
    <table class="col-5 table table-borderless table-striped table-sm" id="last-users">
        <thead>
            <tr>
                <th colspan="2"><h5>Últimos Cadastros</h5></th>
            </tr>
        </thead>
        <tbody>
        {if isset($users)}
            {foreach from=$users item=$user}
                <tr id="{$user->id}">
                    <td>{$user->nome}</td>
                    <td>{date('d/m/Y', strtotime($user->data_cadastro))}</td>
                </tr>
            {/foreach}
        {/if}
        </tbody>
    </table>
    <section class="col-5 table" id="financial-use">
        <h5>Valor Total Gasto Através do Cartão</h5>
        <article id="total" class="table-row row">
        {if isset($compras)}
           <div class="col">Total de Gastos até {date('d/m/Y')}</div> 
           <div class="col">R${$compras}</div>
        {/if}
        </article>
        <table class="col-12 table table-sm table-striped" id="financial-use-by-user">
            <thead> 
                <th colspan="2"><h5>Valores gastos por usuários</h5></th>
            </thead>
            <tbody>
            {if isset($gastosUsuarios)}
                {foreach from=$gastosUsuarios item=$usuario}
                    <tr>
                        <td>{$usuario['nome']}</td>
                        <td>R$ {$usuario['valorTotal']}</td>
                    </tr>
                {/foreach}
            {/if}
            </tbody>
        </table>
    </section>
</div>
<div class="row col-12 secondary off" id="dashboard-beneficiario">
    <div class="fidelidade col-6">
        <h3>Você possui</h3>
        <h4>{$fidelidade[0]->pontos} pts</h4>
    </div>    
    <div class="proxima-parcela col-6">
        {if date('d/m/Y', strtotime($data_pagamento)) < date('d/m/Y')}
        <h3>Sua parcela está atrasada</h3>
        <h4>Vencimento: <strong style="color: red">{date('d/m/Y', strtotime($data_pagamento))}</strong></h4>
        {else}
        <h3>Sua próxima parcela vence no dia</h3>
        <h4><strong style="color: green">{date('d/m/Y', strtotime($data_pagamento))}</strong></h4>
        {/if}
    </div>
    <div class="compras col-12">
        <h3>Suas últimas compras</h3>
        {if is_array($compras)}
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
            {foreach from=$compras item=$item}
                <tr id="contrato-{$item->contrato}">
                    <td>{$item->nome_parceiro}</td>
                    <td>{$item->valor_compra}</td>
                    <td>{date('d/m/Y', strtotime($item->data_compra))}</td>    
                    <td>{$item->pontos}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        {else}
        <span class="alert alert-warning">{$compras}</span>
        {/if}
    </div>
</div>
{elseif $userLevel eq 'vendedor'}
<div class="row primary on">
    <div class="row col-8" id="sells">
        <h4 class="title">Relatório de Vendas</h4>
        {if isset($data->selling)}
            {if is_array($data->selling)}
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
                {foreach from=$data->selling item=$item}
                    <tr id="contrato-{$item->contrato}">
                        <td>{$item->contrato}</td>
                        <td>{$item->beneficiario}</td>
                        <td>{date('d/m/Y', strtotime($item->data_venda))}</td>    
                        <td><a href="reports/report/{$item->contrato}">Detalhes</a></td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
            {else}
                <span class="alert alert-warning text-center col-12" role="alert">{$data->selling}</span>
            {/if}
        {/if}
    </div>    
</div>
<div class="row col-12 secondary off" id="dashboard-beneficiario">
    <div class="fidelidade col-6">
        <h3>Você possui</h3>
        <h4>{$fidelidade[0]->pontos} pts</h4>
    </div>    
    <div class="proxima-parcela col-6">
        {if date('d/m/Y', strtotime($data_pagamento)) < date('d/m/Y')}
        <h3>Sua parcela está atrasada</h3>
        <h4>Vencimento: <strong style="color: red">{date('d/m/Y', strtotime($data_pagamento))}</strong></h4>
        {else}
        <h3>Sua próxima parcela vence no dia</h3>
        <h4><strong style="color: green">{date('d/m/Y', strtotime($data_pagamento))}</strong></h4>
        {/if}
    </div>
    <div class="compras col-12">
        <h3>Suas últimas compras</h3>
        {if is_array($compras)}
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
            {foreach from=$compras item=$item}
                <tr id="contrato-{$item->contrato}">
                    <td>{$item->nome_parceiro}</td>
                    <td>{$item->valor_compra}</td>
                    <td>{date('d/m/Y', strtotime($item->data_compra))}</td>    
                    <td>{$item->pontos}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        {else}
        <span class="alert alert-warning">{$compras}</span>
        {/if}
    </div>
</div>
{elseif $userLevel eq 'beneficiario'}
<div class="row col-12" id="dashboard-beneficiario">
    <div class="fidelidade col-6">
        <h3>Você possui</h3>
        <h4>{$fidelidade[0]->pontos} pts</h4>
    </div>    
    <div class="proxima-parcela col-6">
        {if date('d/m/Y', strtotime($data_pagamento)) < date('d/m/Y')}
        <h3>Sua parcela está atrasada</h3>
        <h4>Vencimento: <strong style="color: red">{date('d/m/Y', strtotime($data_pagamento))}</strong></h4>
        {else}
        <h3>Sua próxima parcela vence no dia</h3>
        <h4><strong style="color: green">{date('d/m/Y', strtotime($data_pagamento))}</strong></h4>
        {/if}
    </div>
    <div class="compras col-12">
        <h3>Suas últimas compras</h3>
        {if is_array($compras)}
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
            {foreach from=$compras item=$item}
                <tr id="contrato-{$item->contrato}">
                    <td>{$item->nome_parceiro}</td>
                    <td>{$item->valor_compra}</td>
                    <td>{date('d/m/Y', strtotime($item->data_compra))}</td>    
                    <td>{$item->pontos}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        {else}
        <span class="alert alert-warning">{$compras}</span>
        {/if}
    </div>
</div>
{elseif $userLevel eq 'parceiro'}
<div class="row" id="dashboard-parceiro">
    {include file=$scannerModule}
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
                <input type="hidden" name="id_parceiro" value="{$dataUser->id}" />
                <input type="hidden" name="id_usuario" id="id_usuario" value="" />
                <input type="hidden" name="desconto" value="{$dataUser->desconto}" />
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
{/if}
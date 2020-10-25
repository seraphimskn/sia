<div class="general row col-12">
    {if $dataUser->permissoes eq 'all'}
    <div class="row col-6 " id="payments">
        <h4 class="title">Relatório de Adimplência</h4>        
        {if isset($data->payments)}            
            {if is_array($data->payments)}
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
                {foreach from=$data->payments item=$item}
                    <tr id="contract-{$item->contrato}">
                        <td>{$item->contrato}</td>
                        <td>{$item->usuario}</td>
                        <td>{date('d/m/Y', strtotime($item->data_vencimento))}</td>
                        <td>R$ {number_format($item->valor, 2, ',', '.')}</td>
                        <td>
                            {if $item->status == 0 && $item->data_vencimento <= date('Y-m-d')}
                                <span class="badge badge-danger">ATRASADO</span>
                            {elseif $item->status == 0 && $item->data_vencimento > date('Y-m-d')}
                                <span class="badge badge-secondary">ABERTO</span>
                            {else}
                                <span class="badge badge-success">PAGO</span>
                            {/if}
                        </td>
                        <td><a href="reports/report/{$item->boleto}">Detalhar</a></td>
                    </tr>
                {/foreach}
                <tbody>
            </table>
            {else}
                <span class="alert alert-danger text-center col-12" role="alert">{$data->payments}</span>
            {/if}
        {/if}
    </div>
    <div class="table row col-6 " id="births">
        <h4 class="title">Relatório de Aniversariantes</h4>
        {if isset($data->births)}            
            {if is_array($data->births)}
            <table class="table table-sm table-striped">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col">Idade</th>
                    <th scope="col"><a href="reports/births">Ver Todos</a></th>
                </thead>
                <tbody>
                {foreach from=$data->births item=$item}
                    <tr id="user-{$item->id}">
                        <td>{$item->nome}</td>
                        <td>{date('d/m', strtotime($item->data_nascimento))}</td>
                        <td>{date('Y') - date('Y', strtotime($item->data_nascimento))}</td>                        
                        <td><a href="mailing/birthday/{$item->id}">Enviar Parabéns</a></td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
            {else}
                <span class="alert alert-danger text-center col-12" role="alert">{$data->births}</span>
            {/if}
        {/if}
    </div>
    <div class="table row col-6 " id="newcomers">
        <h4 class="title">Relatório de Novos Beneficiários</h4>
        {if isset($data->newcomers)}
            {if is_array($data->newcomers)}
            <table class="table table-sm table-striped">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col"><a href="reports/newcomers">Ver Todos</a></th>
                </thead>
                <tbody>
                {foreach from=$data->newcomers item=$item}
                    <tr id="user-{$item->id}">
                        <td>{$item->nome}</td>
                        <td>{date('d/m/Y', strtotime($item->data_cadastro))}</td>                  
                        <td><a href="reports/report/{$item->id}">Detalhes</a></td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
            {else}
                <span class="alert alert-warning text-center col-12" role="alert">{$data->newcomers}</span>
            {/if}
        {/if}
    </div>
    <div class="table row col-6 " id="prospects">
        <h4 class="title">Relatório de Medição</h4>
        {if isset($data->prospects)}
            {if is_array($data->prospects)}
                <div class="table-headers row col-12">
                    <div class="col">Valor Total Recebido</div>
                    <div class="col">Data</div>
                    <div class="col"><a href="reports/prospects">Detalhar</a></div>
                </div>
                {foreach from=$data->prospects item=$item}
                    <article class="table-row row col-12" id="prospect">
                        <div class="col">R$ {number_format($item, 2, ',', '.')}</div>
                        <div class="col">{date('d/m/Y')}</div>
                        <div class="col"></div>   
                    </article>
                {/foreach}
            {else}
                <span class="alert alert-warning text-center col-12" role="alert">{$data->prospects}</span>
            {/if}
        {/if}
    </div>
    <div class="table row col-6 " id="assurances">
        <h4 class="title">Relatório de Segurados</h4>
        {if isset($data->assurances)}
            {if is_array($data->assurances)}
            <table class="table table-sm table-striped">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Data do Cadastro</th>
                    <th scope="col"><a href="reports/assurances">Detalhar</a></th>
                </thead>
                <tbody>
                {foreach from=$data->assurances item=$item}
                    <tr id="user-{$item->id_usuario}">
                        <td>{$item->nome_usuario}</td>
                        <td>{date('d/m/Y', strtotime($item->data_cadastro))}</td>                  
                        <td><a href="reports/report/{$item->id_usuario}">Detalhes</a></td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
            {else}
                <span class="alert alert-warning text-center col-12" role="alert">{$data->assurances}</span>
            {/if}
        {/if}
    </div>
    <div class="table row col-6 " id="by-seller">
        <h4 class="title">Relatório de Cadastros por Vendedor</h4>
        {if isset($data->byseller)}
            {if is_array($data->byseller)}
            <table class="table table-sm table-striped">
                <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">Data da Venda</th>
                    <th scope="col">Nome do Vendedor</th>
                    <th scope="col"><a href="reports/byseller">Ver Todos</a></th>
                </thead>
                <tbody>
                {foreach from=$data->byseller item=$item}
                    <tr id="contrato-{$item->contrato}">
                        <td>{$item->beneficiario}</td>
                        <td>{date('d/m/Y', strtotime($item->data_venda))}</td>     
                        <td>{$item->vendedor}</td>             
                        <td><a href="reports/report/{$item->contrato}">Detalhes</a></td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
            {else}
                <span class="alert alert-warning text-center col-12" role="alert">{$data->byseller}</span>
            {/if}
        {/if}
    </div>
    {/if}
    {if is_array($dataUser->permissoes)}
        {if isset($dataUser->permissoes['relatorios']) && $dataUser->permissoes['relatorios'] == 'compras'}
        <div class="table row col-12" id="financials">
            <h4 class="title">Relatórios Financeiros</h4>
            {if isset($data->financials)}
                {if is_array($data->financials)}
                <table class="table table-striped">
                    <thead>
                        <th scope="col">Nota N°</th>
                        <th scope="col">Data da Venda</th>
                        <th scope="col">Nome do Beneficiário</th>
                        <th scope="col">Valor da Nota</th>
                        <th scope="col"><a href="reports/financials">Ver Todos</a></th>
                    </thead>
                    <tbody>
                    {foreach from=$data->financials item=$item}
                        <tr id="venda-{$item->id}">
                            <td>{$item->nota}</td>
                            <td>{date('d/m/Y', strtotime($item->data_compra))}</td>     
                            <td>{$item->beneficiario}</td>
                            <td>R$ {number_format($item->valor, 2, ',', '.')}</td>             
                            <td><a href="reports/report/{$item->contrato}">Detalhes</a></td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
                {else}
                    <span class="alert alert-warning text-center col-12" role="alert">{$data->financials}</span>
                {/if}
            {/if}        
        </div>
        {/if}
        {if isset($dataUser->permissoes['relatorios']) && $dataUser->permissoes['relatorios'] == 'venda_individual'}
        <div class="table row col-6 " id="sells">
            <h4 class="title">Relatório de Vendas</h4>
            {if isset($data->selling)}
                {if is_array($data->selling)}
                <table class="table table-striped">
                    <thead>
                        <th scope="col">Nº do Contrato</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data da Venda</th>
                        <th scope="col"><a href="reports/byseller">Ver Todos</a></th>
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
        {/if}
    {/if}
</div>
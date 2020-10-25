<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Imagem</th>            
            <th scope="col">Produto</th>
            <th scope="col">Pontos</th>
            <th scope="col">Quantidade Disponível</th>
            {if strtolower($userLevel) neq 'beneficiario'}
                <th scope="col"><a href="products/add">Adicionar</a><th>
            {else}
                <th scope="col"></th>
            {/if}
        </tr>
    </thead>
    <tbody>
    {foreach from=$produtos item=$item}
        <tr id="item-{$item->id}">
            <td><img src="{$item->imagem}" class="img-fluid" width="50px" /></td>            
            <td>{$item->produto}</td>
            <td>{$item->pontos}</td>
            <td>{$item->quantidade}</td>
            {if strtolower($userLevel) neq 'beneficiario'}
                <td><a href="products/edit/{$item->id}">Editar</a> | <a href="#" data-id="{$item->id}" data-script="products" class="sendDelete">Excluir</a></td>
            {else}
                <td><a href="products/product/{$item->id}">Ver Produto</a></td>
            {/if}
        </tr>
    {/foreach}
    <tbody>
</table>
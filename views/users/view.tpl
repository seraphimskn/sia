{if strtolower($userLevel) neq 'vendedor'}
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Login</th>
            <th scope="col"><a href="users/add">Adicionar</a></th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$usuarios item=$usuario}
        <tr id="item-{$usuario->id}">
            <td>{$usuario->nome}</td>
            <td>{$usuario->cpf_cnpj}</td>
            <td><a href="users/edit/{$usuario->id}">Editar</a> | <a href="#" data-id="{$usuario->id}" data-script="users" class="sendDelete">Excluir</a></td>
        </tr>
    {/foreach}
    </tbody>
</table>
{else}
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Login</th>
            <th scope="col"><a href="users/add">Adicionar</a></th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$usuarios item=$usuario}
        {foreach from=$usuario item=$dado}
        <tr id="item-{$dado->id}">
            <td>{$dado->nome}</td>
            <td>{$dado->cpf_cnpj}</td>
            <td><a href="users/edit/{$dado->id}">Editar</a></td>
        </tr>
        {/foreach}
    {/foreach}
    </tbody>
</table>
{/if}
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Nível</th>
            <th scope="col"><a href="levels/add">Adicionar</a></th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$levels item=$level}
        <tr id="item-{$level->id}">
            <td>{$level->nome}</td>
            <td><a href="levels/edit/{$level->id}">Editar</a> | <a href="#" data-id="{$level->id}" data-script="levels" class="sendDelete">Excluir</a></td>
        </tr>
    {/foreach}
    </tbody>
</table>
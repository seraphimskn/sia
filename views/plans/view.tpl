<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Plano</th>
            <th scope="col">Valor</th>
            <th scope="col"><a href="plans/add">Adicionar</a></th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$plans item=$plan}
        <tr id="item-{$plan->id}">
            <td>{$plan->nome}</td>
            <td>R$ {number_format($plan->valor, 2, ',', '.')}</td>
            <td><a href="plans/edit/{$plan->id}">Editar</a> | <a href="#" data-id="{$plan->id}" data-script="plans" class="sendDelete">Excluir</a></td>
        </tr>
    {/foreach}
    </tbody>
</table>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Valor</th>            
            <th scope="col">Pontos</th>
            <th scope="col"><a href="points/add">Adicionar</a><th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$pontos item=$item}
        <tr id="item-{$item->id}">
            <td>R$ {number_format($item->valor, 2, ',', '.')}</td>            
            <td>{$item->pontos}</td>
            <td><a href="points/edit/{$item->id}">Editar</a> | <a href="#" data-id="{$item->id}" data-script="points" class="sendDelete">Editar</a></td>
        </tr>
    {/foreach}
    <tbody>
</table>
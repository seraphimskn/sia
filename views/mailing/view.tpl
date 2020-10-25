<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Tipo de Mala-Direta</th>            
            <th scope="col">Data de Envio</th>
            <th scope="col">Usuários</th>
            <th scope="col">Tipo de envio</th>
            <th scope="col"><a href="mailing/add">Adicionar</a><th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$mailing item=$item}
        <tr id="mailing-{$item->id}">
            <td>{$item->tipo}</td>            
            <td>{date('d/m/Y', strtotime($item->data_vencimento))}</td>
            <td>{$item->destinatarios}</td>
            <td>{$item->tipo_envio}</td>
            <td><a href="mailing/edit">Editar</a></td>
        </tr>
    {/foreach}
    <tbody>
</table>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nº Nota</th>            
            <th scope="col">Contrato</th>
            <th scope="col">Beneficiário</th>
            <th scope="col">Data de Expedição</th>
            <th scope="col"><th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$nfe item=$item}
        <tr id="nfe-{$item->id}">
            <td>{$item->id}</td>            
            <td>{$item->nota}</td>
            <td>{$item->contrato}</td>
            <td>{$item->beneficiario}</td>
            <td>{date('d/m/Y', strtotime($item->data_vencimento))}</td>
            <td><a href="nfe/view_nfe/{$item->id}">Visualizar</a></td>
        </tr>
    {/foreach}
    <tbody>
</table>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titular</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$contratos item=$item}
        <tr id="item-{$item->id_contrato}">
            <td>{$item->id_contrato}</td>
            <td>{$item->beneficiario}</td>
            <td>{$item->vendedor}</td>
            <td>
            {if $item->status eq 0}
                <span class="badge badge-danger">Inativo</span>
            {else}
                <span class="badge badge-success">Ativo</span>
            {/if}
            </td>
            <td><a href="payments/contract_payments/{$item->id_contrato}">Ver Pagamentos do Contrato</a></td>
        </tr>
    {/foreach}
    </tbody>
</table>
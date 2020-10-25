<div class="row col-12" id="bills">
    <h4 class="title">Boletos</h4>
    {if isset($boletos)}
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Código do Boleto</th>            
                <th scope="col">Vencimento</th>
                <th scope="col">Pagamento</th>
                <th scope="col">Valor</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$boletos item=$item}
            <tr id="boleto-{$item->id}">
                <td>{$item->codigo}</td>            
                <td>{date('d/m/Y', strtotime($item->data_vencimento))}</td>
                <td>
                {if !is_null($item->data_pagamento)}
                    {date('d/m/Y', strtotime($item->data_vencimento))}
                {else}
                    --
                {/if}
                </td>
                <td>R$ {number_format($item->valor, 2, ',', '.')}</td>
                <td>{$item->status}</td>
                <td><a href="bills/add">2ª Via</a></td>
            </tr>
        {/foreach}
        <tbody>
    </table>
    {else}
        <span class="alert alert-warning text-center col-12" role="alert">{$boletos}</span>       
    {/if}
</div>
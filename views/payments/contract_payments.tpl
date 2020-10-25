<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Valor da Parcela</th>
            <th scope="col">Data do Vencimento</th>
            <th scope="col">Status</th>
            <th scope="col">Data do Pagamento</th>
            <th scope="col">Forma de Pagamento</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$pagamentos item=$item}
        <tr id="item-{$item->id}">
            <td>{$item->id}</td>
            <td>R$ {number_format($item->valor, 2, ',', '.')}</td>
            <td>{date('d/m/Y', strtotime($item->data_vencimento))}</td>            
            <td>
                {if $item->data_pagamento eq ''}
                    {if date('Y-m-d', strtotime($item->data_vencimento)) > date('Y-m-d')}
                        <span class="badge badge-primary">A vencer</span>
                    {elseif date('Y-m-d', strtotime($item->data_vencimento)) eq date('Y-m-d')}
                        <span class="badge badge-warning">Vence hoje</span>
                    {elseif date('Y-m-d', strtotime($item->data_vencimento)) < date('Y-m-d')}
                        <span class="badge badge-danger">Atrasado</span>
                    {/if}
                {elseif $item->data_pagamento neq ''}
                    <span class="badge badge-success">Pago</span>
                {/if}
            </td>
            <td>
                {if $item->data_pagamento eq ''}
                    {if date('Y-m-d', strtotime($item->data_vencimento)) > date('Y-m-d')}
                        --
                    {elseif date('Y-m-d', strtotime($item->data_vencimento)) eq date('Y-m-d')}
                        Vence hoje
                    {else}
                        Pagamento atrasado.
                    {/if}
                {else}
                    {date('d/m/Y', strtotime($item->data_pagamento))}
                {/if}
            </td>
            <td>
                {if $item->forma_pagamento eq ''}
                    --
                {elseif $item->forma_pagamento eq 'cartao'}
                    Cartão de Crédito
                {elseif $item->forma_pagamento eq 'dinheiro'}
                    Dinheiro 
                {elseif $item->forma_pagamento eq 'cheque'}
                    Cheque
                {/if}
            </td>
            <td>
                {if strtolower($userLevel) eq 'administrador' || strtolower($userLevel) eq 'super-administrador'} 
                    {if $item->data_pagamento neq ''}
                    {else}
                        <a href="payments/register/{$item->id_pagamento}">Registrar Pagamento</a> | <a href="#" class="geraBoleto" data-id="{$item->id_pagamento}">Gerar Boleto</a>
                    {/if}
                {/if}
            </td>
        </tr>
    {/foreach}
    </tbody>
</table>
<div class="row col-12" id="assurances">
    <h4 class="title">Relatório de Assegurados</h4>
    {if isset($data->assurances)}
        {if is_array($data->assurances)}
        <table class="table table-striped table-hover">
            <thead>
                <th scope="col">Contrato nº</th>
                <th scope="col">Titular do Contrato</th>
                <th scope="col">Valor</th>
                <th scope="col">Vencimento</th>
                <th scope="col">Pagamento</th>
                <th scope="col">Status</th>
                <th><a href="#" class="export">Exportar Relatório</a></th>
            </thead>
            <tbody>
            {foreach from=$data->assurances item=$item}
                <tr id="prospect-{$item->contrato}">
                    <td>{$item->id_contrato}</td>
                    <td>{$item->nome_usuario}</td>
                    <td>R$ {number_format($item->valor_plano, 2, ',', '.')}</td>
                    <td>{date('d/m/Y', strtotime($item->data_vencimento))}</td>
                    <td>
                    {if !is_null($item->data_pagamento)}
                        {date('d/m/Y', strtotime($item->data_pagamento))}
                    {else}
                        --
                    {/if}
                    </td>
                    <td>{$item->status}</td>
                    <td></td>
                </tr>
            {/foreach}
        </tbody>
        </table>
        {else}
            <span class="alert alert-warning text-center col-12" role="alert">{$data->assurances}</span>
        {/if}
    {/if}
</div>
<script language="javascript">
$('.export').on('click', function(){ldelim}

		event.preventDefault();

        var table = $(this).parent().parent().parent().parent();
        var headers = table[0].tHead.rows[0].cells;
        var body = table[0].tBodies[0].rows;
        var header = {};
        var rows   = {};
        //console.log(table);

        for(var i = 0; i < headers.length; i+=1){ldelim}
            header[i] = headers[i].innerText;
        {rdelim}

        for(var i = 0; i < body.length; i+=1){ldelim}
            var cells = body[i].cells;
            rows[i] = {};
            for(var j = 0; j < cells.length; j+=1){ldelim}
                rows[i][j] = cells[j].innerText;
            {rdelim}
        {rdelim}        


		$.post('controllers/reports/assurances.controller.php', {ldelim}'send': true, 'dados': {ldelim}header, rows{rdelim}{rdelim}, function(msg){ldelim}
			var href = msg.replace('../../', '');
            window.open(href);
		{rdelim});

	{rdelim});
</script>
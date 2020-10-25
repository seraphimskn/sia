<div class="row col-12" id="financials">
    <h4 class="title">Relatórios Financeiros</h4>
    {if isset($data->financials)}
        {if is_array($data->financials)}
        <table class="table table-striped table-hover">
            <thead>
                <th scope="col">Nota N°</th>
                <th scope="col">Data da Venda</th>
                <th scope="col">Nome do Beneficiário</th>
                <th scope="col">Valor da Nota</th>
                <th scope="col"><a href="#" class="export">Exportar Relatório</a></th>
            </thead>
            <tbody>
            {foreach from=$data->financials item=$item}
                <tr id="venda-{$item->id}">
                    <td>{$item->nota}</td>
                    <td>{date('d/m/Y', strtotime($item->data_compra))}</td>     
                    <td>{$item->beneficiario}</td>
                    <td>R$ {number_format($item->valor, 2, ',', '.')}</td>             
                    <td><a href="reports/report/{$item->id}">Detalhes</a></td>
                </tr>
            {/foreach}
            </tbody>
            <tfoot>
                <tr class="table-info">
                    <td colspan="3">Total</td>
                    <td>R$ {number_format($data->total, 2, ',', '.')}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        {else}
            <span class="alert alert-warning text-center col-12" role="alert">{$data->financials}</span>
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


		$.post('controllers/reports/financials.controller.php', {ldelim}'send': true, 'dados': {ldelim}header, rows{rdelim}{rdelim}, function(msg){ldelim}
			var href = msg.replace('../../', '');
            window.open(href);
		{rdelim});

	{rdelim});
</script>
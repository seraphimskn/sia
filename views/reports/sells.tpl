<div class="row col-12" id="sells">
    <h4 class="title">Relatório de Vendas</h4>
    {if isset($data->selling)}
        {if is_array($data->selling)}
        <table class="table table-striped table-hover">
            <thead class="table-headers col-12">
                <tr>
                    <th scope="col">Nº do Contrato</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data da Venda</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$data->selling item=$item}
                <tr id="contrato-{$item->contrato}">
                    <td>{$item->contrato}</td>
                    <td>{$item->beneficiario}</td>
                    <td>{date('d/m/Y', strtotime($item->data_venda))}</td>    
                    <td><a href="reports/report/{$item->contrato}">Detalhes</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        {else}
            <span class="alert alert-warning text-center col-12" role="alert">{$data->selling}</span>
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


		$.post('controllers/reports/sells.controller.php', {ldelim}'send': true, 'dados': {ldelim}header, rows{rdelim}{rdelim}, function(msg){ldelim}
			var href = msg.replace('../../', '');
            window.open(href);
		{rdelim});

	{rdelim});
</script>
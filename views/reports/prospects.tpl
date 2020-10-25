<div class="row col-12" id="prospects">
    <h4 class="title">Relatório de Medição</h4>
    {if isset($data->prospects)}
        {if is_array($data->prospects)}
        <table class="table table-striped table-hover">
            <thead>
                <th scope="col">Contrato nº</th>
                <th scope="col">Titular do Contrato</th>
                <th scope="col">Valor Recebido</th>
                <th scope="col">Data</th>
                <th scope="col"><a href="#" class="export">Exportar Relatório</a></th>
            </thead>
            <tbody>
            {foreach from=$data->prospects item=$item}
                <tr id="prospect-{$item->contrato}">
                    <td>{$item->contrato}</td>
                    <td>{$item->usuario}</td>
                    <td>R$ {number_format($item->valor, 2, ',', '.')}</td>
                    <td>{date('d/m/Y', strtotime($item->data_pagamento))}</td>
                    <td></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        {else}
            <span class="alert alert-warning text-center col-12" role="alert">{$data->prospects}</span>
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


		$.post('controllers/reports/prospects.controller.php', {ldelim}'send': true, 'dados': {ldelim}header, rows{rdelim}{rdelim}, function(msg){ldelim}
			var href = msg.replace('../../', '');
            window.open(href);
		{rdelim});

	{rdelim});
</script>
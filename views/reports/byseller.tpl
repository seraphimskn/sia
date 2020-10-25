<div class="tow col-12" id="by-seller">
    <h4 class="title">Relatório de Cadastros por Vendedor</h4>
    {if isset($data->byseller)}
        {if is_array($data->byseller)}
        <table class="table table-striped table-hover">
            <thead>
                <th scope="col">Nome</th>
                <th scope="col">Data da Venda</th>
                <th scope="col">Nome do Vendedor</th>
                <th scope="col">Plano</th>
                <th scope="col">Valor do Plano</th>
                <th scope="col"><a href="#" class="export">Exportar Relatório</a></th>
            </thead>
            <tbody>
            {foreach from=$data->byseller item=$item}
                <tr id="contrato-{$item->contrato}">
                    <td>{$item->beneficiario}</td>
                    <td>{date('d/m/Y', strtotime($item->data_venda))}</td>     
                    <td>{$item->vendedor}</td>
                    <td>{$item->plano}</td>
                    <td>R$ {number_format($item->valor, 2, ',', '.')}</td>             
                    <td><a href="reports/report/{$item->contrato}">Detalhes</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        {else}
            <span class="alert alert-warning text-center col-12" role="alert">{$data->byseller}</span>
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


		$.post('controllers/reports/byseller.controller.php', {ldelim}'send': true, 'dados': {ldelim}header, rows{rdelim}{rdelim}, function(msg){ldelim}
			var href = msg.replace('../../', '');
            window.open(href);
		{rdelim});

	{rdelim});
</script>
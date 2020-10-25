<div class="row col-12" id="payments">
    <h4 class="title">Relatório de Adimplência</h4>
    {if isset($data->payments)}
        {if is_array($data->payments)}
        <table class="table table-striped table-hover">
            <thead>
                <th scope="col">Contrato</th>
                <th scope="col">Usuário</th>
                <th scope="col">Vencimento</th>
                <th scope="col">Valor</th>
                <th scope="col">Status</th>
                <th scope="col"><a href="#" class="export">Exportar Relatório</a></th>
            </thead>
            <tbody>
            {foreach from=$data->payments item=$item}
                <tr id="contract-{$item->contrato}">
                    <td>{$item->contrato}</td>
                    <td>{$item->usuario}</td>
                    <td>{date('d/m/Y', strtotime($item->data_vencimento))}</td>
                    <td>R$ {number_format($item->valor, 2, ',', '.')}</td>
                    <td>
                        {if $item->status == 0 && $item->data_vencimento <= date('Y-m-d')}
                            <span class="badge badge-danger">ATRASADO</span>
                        {elseif $item->status == 0 && $item->data_vencimento > date('Y-m-d')}
                            <span class="badge badge-secondary">ABERTO</span>
                        {else}
                            <span class="badge badge-success">PAGO</span>
                        {/if}
                    </div>
                    <td><a href="reports/report/{$item->boleto}">Detalhar</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        {else}
            <span class="alert alert-danger text-center col-12" role="alert">{$data->payments}</span>
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


		$.post('controllers/reports/payments.controller.php', {ldelim}'send': true, 'dados': {ldelim}header, rows{rdelim}{rdelim}, function(msg){ldelim}
			var href = msg.replace('../../', '');
            window.open(href);
		{rdelim});

	{rdelim});
</script>
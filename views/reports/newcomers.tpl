<div class="row col-12" id="newcomers">
    <h4 class="title">Relatório de Novos Beneficiários</h4>
    {if isset($data->newcomers)}
        {if is_array($data->newcomers)}
        <table class="table table-striped table-hover">
            <thead>
                <th scope="col" style="display: none">QRCode</th>
                <th scope="col">Nome</th>                
                <th scope="col">CPF</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Data de Cadastro</th>
                <th scope="col"><a href="#" class="export">Exportar Relatório</a></th>
            </thead>
            <tbody>
            {foreach from=$data->newcomers item=$item}
                <tr id="user-{$item->id}">
                    <td style="display: none">{$item->user_hash}</td>
                    <td>{$item->nome}</td>                                      
                    <td>{$item->cpf_cnpj}</td>
                    <td>{date('d/m/Y', strtotime($item->data_nascimento))}</td>
                    <td>{date('d/m/Y', strtotime($item->data_cadastro))}</td>  
                    <td><a href="reports/report/{$item->id}">Detalhes</a></td>
                </article>
            {/foreach}
            </tbody>
        </table>
        {else}
            <span class="alert alert-warning text-center col-12" role="alert">{$data->newcomers}</span>
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


		$.post('controllers/reports/newcomers.controller.php', {ldelim}'send': true, 'dados': {ldelim}header, rows{rdelim}{rdelim}, function(msg){ldelim}
			var href = msg.replace('../../', '');
            window.open(href);
		{rdelim});

	{rdelim});
</script>
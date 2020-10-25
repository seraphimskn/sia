<?php
/* Smarty version 3.1.30, created on 2020-03-27 12:49:25
  from "/var/www/html/sigms/views/reports/financials.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e7df6556130d5_04811614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5a40a29b768c0264546e2a136af0a8bd7634d32' => 
    array (
      0 => '/var/www/html/sigms/views/reports/financials.tpl',
      1 => 1584130652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7df6556130d5_04811614 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row col-12" id="financials">
    <h4 class="title">Relatórios Financeiros</h4>
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value->financials)) {?>
        <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->financials)) {?>
        <table class="table table-striped table-hover">
            <thead>
                <th scope="col">Nota N°</th>
                <th scope="col">Data da Venda</th>
                <th scope="col">Nome do Beneficiário</th>
                <th scope="col">Valor da Nota</th>
                <th scope="col"><a href="#" class="export">Exportar Relatório</a></th>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->financials, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr id="venda-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nota;?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_compra));?>
</td>     
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->beneficiario;?>
</td>
                    <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['item']->value->valor,2,',','.');?>
</td>             
                    <td><a href="reports/report/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">Detalhes</a></td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
            <tfoot>
                <tr class="table-info">
                    <td colspan="3">Total</td>
                    <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['data']->value->total,2,',','.');?>
</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <?php } else { ?>
            <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->financials;?>
</span>
        <?php }?>
    <?php }?>
</div>
<?php echo '<script'; ?>
 language="javascript">
$('.export').on('click', function(){

		event.preventDefault();

        var table = $(this).parent().parent().parent().parent();
        var headers = table[0].tHead.rows[0].cells;
        var body = table[0].tBodies[0].rows;
        var header = {};
        var rows   = {};
        //console.log(table);

        for(var i = 0; i < headers.length; i+=1){
            header[i] = headers[i].innerText;
        }

        for(var i = 0; i < body.length; i+=1){
            var cells = body[i].cells;
            rows[i] = {};
            for(var j = 0; j < cells.length; j+=1){
                rows[i][j] = cells[j].innerText;
            }
        }        


		$.post('controllers/reports/financials.controller.php', {'send': true, 'dados': {header, rows}}, function(msg){
			var href = msg.replace('../../', '');
            window.open(href);
		});

	});
<?php echo '</script'; ?>
><?php }
}

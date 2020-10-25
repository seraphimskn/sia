<?php
/* Smarty version 3.1.30, created on 2020-03-27 12:49:22
  from "/var/www/html/sigms/views/reports/byseller.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e7df65266f069_56878797',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f030774d6940d31197c9015561613ab3813a888' => 
    array (
      0 => '/var/www/html/sigms/views/reports/byseller.tpl',
      1 => 1584130649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7df65266f069_56878797 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="tow col-12" id="by-seller">
    <h4 class="title">Relatório de Cadastros por Vendedor</h4>
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value->byseller)) {?>
        <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->byseller)) {?>
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->byseller, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr id="contrato-<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->beneficiario;?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_venda));?>
</td>     
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->vendedor;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->plano;?>
</td>
                    <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['item']->value->valor,2,',','.');?>
</td>             
                    <td><a href="reports/report/<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">Detalhes</a></td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
        </table>
        <?php } else { ?>
            <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->byseller;?>
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


		$.post('controllers/reports/byseller.controller.php', {'send': true, 'dados': {header, rows}}, function(msg){
			var href = msg.replace('../../', '');
            window.open(href);
		});

	});
<?php echo '</script'; ?>
><?php }
}

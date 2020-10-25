<?php
/* Smarty version 3.1.30, created on 2020-03-31 17:38:12
  from "/var/www/html/sigms/views/reports/payments.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e8380047ad259_56778692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd57c8431432602ca37ccf56f0094d379e21ed1f7' => 
    array (
      0 => '/var/www/html/sigms/views/reports/payments.tpl',
      1 => 1584130650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8380047ad259_56778692 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row col-12" id="payments">
    <h4 class="title">Relatório de Adimplência</h4>
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value->payments)) {?>
        <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->payments)) {?>
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->payments, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr id="contract-<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->usuario;?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento));?>
</td>
                    <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['item']->value->valor,2,',','.');?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value->status == 0 && $_smarty_tpl->tpl_vars['item']->value->data_vencimento <= date('Y-m-d')) {?>
                            <span class="badge badge-danger">ATRASADO</span>
                        <?php } elseif ($_smarty_tpl->tpl_vars['item']->value->status == 0 && $_smarty_tpl->tpl_vars['item']->value->data_vencimento > date('Y-m-d')) {?>
                            <span class="badge badge-secondary">ABERTO</span>
                        <?php } else { ?>
                            <span class="badge badge-success">PAGO</span>
                        <?php }?>
                    </div>
                    <td><a href="reports/report/<?php echo $_smarty_tpl->tpl_vars['item']->value->boleto;?>
">Detalhar</a></td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
        </table>
        <?php } else { ?>
            <span class="alert alert-danger text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->payments;?>
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


		$.post('controllers/reports/payments.controller.php', {'send': true, 'dados': {header, rows}}, function(msg){
			var href = msg.replace('../../', '');
            window.open(href);
		});

	});
<?php echo '</script'; ?>
><?php }
}

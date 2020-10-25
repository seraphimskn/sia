<?php
/* Smarty version 3.1.30, created on 2020-04-12 19:09:45
  from "/var/www/html/sigms/views/reports/sells.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e936779df12d5_73968294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30fac7755790e96bfa0c8fa50e60cb1f8dd5703c' => 
    array (
      0 => '/var/www/html/sigms/views/reports/sells.tpl',
      1 => 1584130649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e936779df12d5_73968294 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row col-12" id="sells">
    <h4 class="title">Relatório de Vendas</h4>
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value->selling)) {?>
        <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->selling)) {?>
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->selling, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr id="contrato-<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->beneficiario;?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_venda));?>
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
            <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->selling;?>
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


		$.post('controllers/reports/sells.controller.php', {'send': true, 'dados': {header, rows}}, function(msg){
			var href = msg.replace('../../', '');
            window.open(href);
		});

	});
<?php echo '</script'; ?>
><?php }
}

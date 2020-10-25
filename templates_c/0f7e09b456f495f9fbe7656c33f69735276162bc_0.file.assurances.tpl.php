<?php
/* Smarty version 3.1.30, created on 2020-02-17 17:21:49
  from "/var/www/html/sigms/views/reports/assurances.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e4acbad898e40_73204199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f7e09b456f495f9fbe7656c33f69735276162bc' => 
    array (
      0 => '/var/www/html/sigms/views/reports/assurances.tpl',
      1 => 1581796371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4acbad898e40_73204199 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row col-12" id="assurances">
    <h4 class="title">Relatório de Assegurados</h4>
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value->assurances)) {?>
        <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->assurances)) {?>
        <table class="table table-striped table-hover">
            <thead>
                <th scope="col">Contrato nº</th>
                <th scope="col">Titular do Contrato</th>
                <th scope="col">Valor</th>
                <th scope="col">Vencimento</th>
                <th scope="col">Pagamento</th>
                <th scope="col">Status</th>
                <th><a href="#" class="export">Exportar Relatório</a></th>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->assurances, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr id="prospect-<?php echo $_smarty_tpl->tpl_vars['item']->value->contrato;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->id_contrato;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nome_usuario;?>
</td>
                    <td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['item']->value->valor_plano,2,',','.');?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_vencimento));?>
</td>
                    <td>
                    <?php if (!is_null($_smarty_tpl->tpl_vars['item']->value->data_pagamento)) {?>
                        <?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_pagamento));?>

                    <?php } else { ?>
                        --
                    <?php }?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->status;?>
</td>
                    <td></td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
        </table>
        <?php } else { ?>
            <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->assurances;?>
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


		$.post('controllers/reports/assurances.controller.php', {'send': true, 'dados': {header, rows}}, function(msg){
			var href = msg.replace('../../', '');
            window.open(href);
		});

	});
<?php echo '</script'; ?>
><?php }
}

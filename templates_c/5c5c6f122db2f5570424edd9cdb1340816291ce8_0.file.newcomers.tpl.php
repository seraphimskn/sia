<?php
/* Smarty version 3.1.30, created on 2020-03-27 12:49:30
  from "/var/www/html/sigms/views/reports/newcomers.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e7df65a78a0a9_12942643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c5c6f122db2f5570424edd9cdb1340816291ce8' => 
    array (
      0 => '/var/www/html/sigms/views/reports/newcomers.tpl',
      1 => 1584130651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7df65a78a0a9_12942643 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row col-12" id="newcomers">
    <h4 class="title">Relatório de Novos Beneficiários</h4>
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value->newcomers)) {?>
        <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->newcomers)) {?>
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->newcomers, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr id="user-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
                    <td style="display: none"><?php echo $_smarty_tpl->tpl_vars['item']->value->user_hash;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nome;?>
</td>                                      
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->cpf_cnpj;?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_nascimento));?>
</td>
                    <td><?php echo date('d/m/Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_cadastro));?>
</td>  
                    <td><a href="reports/report/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">Detalhes</a></td>
                </article>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
        </table>
        <?php } else { ?>
            <span class="alert alert-warning text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->newcomers;?>
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


		$.post('controllers/reports/newcomers.controller.php', {'send': true, 'dados': {header, rows}}, function(msg){
			var href = msg.replace('../../', '');
            window.open(href);
		});

	});
<?php echo '</script'; ?>
><?php }
}

<?php
/* Smarty version 3.1.30, created on 2020-02-15 20:43:22
  from "/var/www/html/sigms/views/reports/births.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e4857ea56e853_89634195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15fcb91ab9e6f2ba015916d60053f27536a4fc2c' => 
    array (
      0 => '/var/www/html/sigms/views/reports/births.tpl',
      1 => 1581796369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4857ea56e853_89634195 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row col-12" id="births">
    <h4 class="title">Relatório de Aniversariantes</h4>    
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value->births)) {?>
        <?php if (is_array($_smarty_tpl->tpl_vars['data']->value->births)) {?>
        <table class="table table-striped table-hover">
            <thead>
                <th scope="col">Nome</th>
                <th scope="col">Data</th>
                <th scope="col">Idade</th>
                <th scope="col"><a href="#" class="export">Exportar Relatório</a></th>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value->births, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr id="user-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nome;?>
</td>
                    <td><?php echo date('d/m',strtotime($_smarty_tpl->tpl_vars['item']->value->data_nascimento));?>
</td>
                    <td><?php echo date('Y')-date('Y',strtotime($_smarty_tpl->tpl_vars['item']->value->data_nascimento));?>
</td>                        
                    <td><a href="mailing/birthday/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">Enviar Parabéns</a></td>
                </article>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
        </table>
        <?php } else { ?>
            <span class="alert alert-danger text-center col-12" role="alert"><?php echo $_smarty_tpl->tpl_vars['data']->value->births;?>
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


		$.post('controllers/reports/births.controller.php', {'send': true, 'dados': {header, rows}}, function(msg){
			var href = msg.replace('../../', '');
            window.open(href);
		});

	});
<?php echo '</script'; ?>
><?php }
}

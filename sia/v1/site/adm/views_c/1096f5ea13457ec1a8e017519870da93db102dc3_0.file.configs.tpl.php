<?php
/* Smarty version 3.1.30, created on 2018-04-16 21:14:46
  from "C:\xampp\htdocs\hangar\site\adm\views\configs\configs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ad4f62602a250_28737786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1096f5ea13457ec1a8e017519870da93db102dc3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hangar\\site\\adm\\views\\configs\\configs.tpl',
      1 => 1523386638,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ad4f62602a250_28737786 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h5 class="title"><i class="fa fa-list" aria-hidden="true"></i> Configura&ccedil;&otilde;s Gerais</h5>
<div class="row float-left col-12 configs list">
	<section class="dock list first float-left">
		<section class="top-bar col-12">
			<div class="controls col-7 float-left">
				<div class="form-check form-check-inline float-left">
					<input type="checkbox" class="checkall form-check-input" name="checkall" id="checkall" />
					<label for="checkall" class="form-check-label">Marcar Todos</label>
				</div>
				<div class="float-left">
					<a href="config/add" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar Novo</a>
					<a href="#" class="btn btn-secondary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Tornar Rascunho</a>
					<a href="#" class="btn btn-danger btn-sm" role="button"><i class="fa fa-trash" aria-hidden="true"></i> Apagar</a>
				</div>
			</div>
        	<form class="search navbar-form float-right col-3" method="post" enctype="multipart/form-data" name="search-post">
        		<div class="form-group float-left">
        			<input type="text" class="form-control" name="search" placeholder="Procurar" />
        		</div>
        		<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
        	</form>
    	</section>
    	<section class="table col-12 float-left">
    		<div class="thead col-12 float-left row">
    			<div class="empty col-1"></div>
    			<div class="col-3"><h6>T&iacute;tulo</h6></div>
    			<div class="col-6"><h6>Conte&uacute;do</h6></div>
    			<div class="col-2"><h6>A&ccedil;&otilde;es</h6></div>
    		</div>
    		<div class="tbody col-12 row">
    		<?php if (is_array($_smarty_tpl->tpl_vars['configurations']->value)) {?>
    			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['configurations']->value, 'configuration');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['configuration']->value) {
?>
    				<article class="the_config row float-left col-12">
    					<div class="checkbox col-1"><form class="form-check-inline"><input type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value->ID;?>
" /></form></div>
    					<div class="col-3"><?php echo $_smarty_tpl->tpl_vars['configuration']->value->config_name;?>
</div>
    					<div class="col-6"><?php echo $_smarty_tpl->tpl_vars['configuration']->value->config_value;?>
</div>
    					<div class="col-2"><a href="config/update/<?php echo $_smarty_tpl->tpl_vars['configuration']->value->ID;?>
" class="btn btn-primary btn-sm" role="btn"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a> <a href="#" class="btn btn-danger btn-sm" role="btn"><i class="fa fa-trash" aria-hidden="true"></i> Apagar</a></div>
    				</article>
    			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    		<?php } else { ?>
    				<article class="the_extension row float-left col-12">
    					<div class="col-12"><?php echo $_smarty_tpl->tpl_vars['configurations']->value;?>
</div>
    				</article>
    		<?php }?>
    		</div>
    	</section>
	</section>
</div><?php }
}

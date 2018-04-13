<?php
/* Smarty version 3.1.30, created on 2018-04-12 16:14:31
  from "C:\xampp\htdocs\bandnews\site\adm\views\pages\page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5acf69c71cab22_96075761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0137d8c6a44c707a835bdf407b6982d4f11085e8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\adm\\views\\pages\\page.tpl',
      1 => 1523542421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5acf69c71cab22_96075761 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form name="add_page" method="post" enctype="multipart/form-data" action="" class="row">
<section class="top-row col-12 row first">
	<h2>T&iacute;tulo da P&aacute;gina</h2>
	<input type="text" name="page_title" class="form-control" required />
	<span></span>
</section>
<section class="post-body col-8 row dock first float-left">
<h4>Conte&uacute;do da P&aacute;gina</h4>
<textarea name="page_value" id="tinyMCE"></textarea>
</section>
<section class="right row col-3">
    <section class="controls col-12 row float-right dock">
    	<div class="col-12">
    		<button class="btn btn-primary" name="publish" id="publish"><i class="fa fa-pencil" aria-hidden="true"></i> Publicar</button>
    		<button class="btn btn-danger" name="delete" id="delete"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
    		<div class="col-12 status">
    			<span><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
 <a href="#" role="button" class="btn btn-warning btn-sm" >Tornar Rascunho</a></span>
    		</div>
    	</div>
    </section>
    <section class="post-type dock float-right col-12">
    	<h6>Tipo da P&aacute;gina</h6>
    	<div class="the_types float-left">
    		<?php if (is_array($_smarty_tpl->tpl_vars['page_types']->value)) {?>
    			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page_types']->value, 'type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
?>
    				<article><input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['type']->value->option_value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['type']->value->option_value;?>
" name="page_type"> <label for="<?php echo $_smarty_tpl->tpl_vars['type']->value->option_value;?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value->option_value;?>
</label></article>
    			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    		<?php } else { ?>
    			<span>N&atilde; h&aacute; um tipo de post definido ainda.</span>
    		<?php }?>
    	</div>
    	<a href="#" role="button" class="btn btn-sm btn-secondary" id="new_type">Adicionar Tipo de P&aacute;gina</a>
    </section>
    <section class="post-image dock float-right col-12">
    	<h6>Imagem Destacada</h6>
    	<div class="the_image">
    		<div class="image_preview col-12"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" class="img-fluid" /></div>
    		<input type="hidden" value="" name="options['featured-image']" />
    		<a href="#" role="button" class="btn btn-secondary btn-sm" id="add_image">Adicionar Imagem em Destaque</a> 
    	</div>
	</section>
</section>
<section class="bottom float-left dock first options row">
	<section class="seo col-12 row">
		<h4>SEO da P&aacute;gina</h4>
		<div class="form-group col-3">
			<label>TAGs</label>
    		<input type="text" name="page_options['seo']"  class="form-control" placeholder="tags..."/>
    		<small class="red">*Separe as TAGs com ";"</small>
		</div>
		<div class="form-group col-6">
			<label>Meta-Description</label>
			<input type="text" name="page_options['meta-description']" class="form-control" placeholder="Lorem ipsum dolor sit amet..." />
		</div>
		<div class="form-group col-3">
			<label>Palavra-Chave</label>
    		<input type="text" name="page_options['keyword]"  class="form-control" placeholder="keyword..."/>
    		<small class="red">*Use no m&aacute;ximo 2 palavras-chave</small>
		</div>
	</section>
	<section class="extensions col-12 row">
		<h4>Plug-ins Ativos e Extens&otilde;es</h4>
		<div class="form-group col-5">
			<label>Tipo de Plug-in/Extens&atilde;o</label>
			<select class="form-control" name="options['extensions']">
				<?php if (isset($_smarty_tpl->tpl_vars['extensions']->value)) {?>
					<?php if (is_array($_smarty_tpl->tpl_vars['extensions']->value)) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extensions']->value, 'extension');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['extension']->value) {
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['extension']->value->option_name;?>
" <?php if ($_smarty_tpl->tpl_vars['post_options']->value->extension == $_smarty_tpl->tpl_vars['extension']->value->option_name) {?>selected<?php }?>>$extension->option_value</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					<?php }?>
				<?php } else { ?>
					<option value="">N&atilde;o h&aacute; nenhum plug-in ou extens&atilde;o instalados</option>
				<?php }?>
			</select>
		</div>
		<div class="form-group col-2">
			<label>ID do Plug-in/Extens&atilde;o</label>
			<select class="form-control" name="options['extensions']['extension_id']" readonly>
			</select>
		</div>
		<div class="form-group col-3 controls">
			<label>&nbsp;</label>
			<a href="#" role="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Mais</a>
			<a href="#" role="button" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i> Remover</a>
		</div>
	</section>
</section>
</form>
<?php echo $_smarty_tpl->tpl_vars['tinyMCE']->value;
}
}

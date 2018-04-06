<?php
/* Smarty version 3.1.30, created on 2018-03-28 16:21:04
  from "C:\xampp\htdocs\bandnews\site\views\templates\commons\about-us.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5abba4d08e0f54_13263261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca420db432b2a9fe523bd5fca4c3e50039383dfb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\views\\templates\\commons\\about-us.tpl',
      1 => 1522180915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modules/youtube.tpl' => 1,
    'file:modules/twitter.tpl' => 1,
    'file:modules/facebook.tpl' => 1,
    'file:modules/most-readed.tpl' => 1,
    'file:modules/staff.tpl' => 1,
    'file:modules/newsletter.tpl' => 1,
  ),
),false)) {
function content_5abba4d08e0f54_13263261 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="internal main row">
	<section class="pagetitle row">
		<h2><?php echo $_smarty_tpl->tpl_vars['page']->value->page_title;?>
</h2>
		<div class="socialmedias">
		<span>Siga-nos em nossas redes sociais</span>
		<div class="links">
			<a href="<?php echo $_smarty_tpl->tpl_vars['youtube_link']->value;?>
" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['facebook_link']->value;?>
" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['twitter_link']->value;?>
" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['instagram_link']->value;?>
" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
	</div>
	</section>
	<div class="left col-md-7 col-xs-12">
		<section class="col-12 featured content">
			<?php echo $_smarty_tpl->tpl_vars['page']->value->options->Destaque;?>

		</section>
		<section class="col-md-12 col-xs-12 about content">
			<?php echo $_smarty_tpl->tpl_vars['page']->value->content;?>

		</section>
		<section class="about left bottom modules col-md-12 col-xs-12 no-wrap">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page']->value->options->aditional, 'aditional');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['aditional']->value) {
?>
				<?php if ($_smarty_tpl->tpl_vars['aditional']->value === "youtube") {?>
					<?php if (!isset($_smarty_tpl->tpl_vars['module_error_message']->value)) {?>
						<?php $_smarty_tpl->_subTemplateRender("file:modules/youtube.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

					<?php } else { ?>
						<?php echo $_smarty_tpl->tpl_vars['module_error_message']->value;?>

					<?php }?>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['aditional']->value === "twitter") {?>
					<?php if (!isset($_smarty_tpl->tpl_vars['module_error_message']->value)) {?>
						<?php $_smarty_tpl->_subTemplateRender("file:modules/twitter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

					<?php } else { ?>
						<?php echo $_smarty_tpl->tpl_vars['module_error_message']->value;?>

					<?php }?>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['aditional']->value === "facebook") {?>
					<?php if (!isset($_smarty_tpl->tpl_vars['module_error_message']->value)) {?>
						<?php $_smarty_tpl->_subTemplateRender("file:modules/facebook.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

					<?php } else { ?>
						<?php echo $_smarty_tpl->tpl_vars['module_error_message']->value;?>

					<?php }?>
				<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</section>
	</div>
	<section class="right modules col-md-5 col-xs-12">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page']->value->options->aditional, 'aditional');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['aditional']->value) {
?>
			<?php if ($_smarty_tpl->tpl_vars['aditional']->value === "most-readed") {?>
				<?php if (!isset($_smarty_tpl->tpl_vars['module_error_message']->value)) {?>
					<?php $_smarty_tpl->_subTemplateRender("file:modules/most-readed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

				<?php } else { ?>
					<?php echo $_smarty_tpl->tpl_vars['module_error_message']->value;?>

				<?php }?>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['aditional']->value === "staff") {?>
				<?php if (!isset($_smarty_tpl->tpl_vars['module_error_message']->value)) {?>
					<?php $_smarty_tpl->_subTemplateRender("file:modules/staff.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

				<?php } else { ?>
					<?php echo $_smarty_tpl->tpl_vars['module_error_message']->value;?>

				<?php }?>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['aditional']->value === "newsletter") {?>
				<?php if (!isset($_smarty_tpl->tpl_vars['module_error_message']->value)) {?>
					<?php $_smarty_tpl->_subTemplateRender("file:modules/newsletter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

				<?php } else { ?>
					<?php echo $_smarty_tpl->tpl_vars['module_error_message']->value;?>

				<?php }?>
			<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</section>
</div><?php }
}

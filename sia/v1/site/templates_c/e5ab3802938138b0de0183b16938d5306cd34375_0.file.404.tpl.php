<?php
/* Smarty version 3.1.30, created on 2018-03-29 16:45:55
  from "C:\xampp\htdocs\bandnews\site\views\templates\commons\404.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5abcfc2307f4a1_86969829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5ab3802938138b0de0183b16938d5306cd34375' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\views\\templates\\commons\\404.tpl',
      1 => 1522180915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abcfc2307f4a1_86969829 (Smarty_Internal_Template $_smarty_tpl) {
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
	<div class="col-12">
		<h1>Desculpe-nos, a página procurada não existe.</h1>
	</div>
</div><?php }
}

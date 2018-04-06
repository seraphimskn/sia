<?php
/* Smarty version 3.1.30, created on 2018-03-27 22:02:19
  from "C:\xampp\htdocs\bandnews\site\views\templates\commons\footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5abaa34b70a5e5_28290186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38f2f38c368c352d6c0277f00fede41913f30ba3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\views\\templates\\commons\\footer.tpl',
      1 => 1522180914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abaa34b70a5e5_28290186 (Smarty_Internal_Template $_smarty_tpl) {
?>
</div>
<footer class="row">
	<div class="col-md-6 col-xs-12">
    	<div id="logoFooter">
    	<?php if (isset($_smarty_tpl->tpl_vars['logo_footer']->value)) {?>
    		<img src="<?php echo $_smarty_tpl->tpl_vars['logo_footer']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['logo_footer']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
" class="img-fluid" />
    	<?php } else { ?>
    		<span><?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
</span>
    	<?php }?>
    	</div>
    	<div id="sitemap">
    	<ul>
    	<li class="title">
    		MAPA DO SITE
    	</li>
    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navItem']->value, 'link');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
?>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->slug;?>
"><?php echo $_smarty_tpl->tpl_vars['link']->value->page;?>
</a></li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    	</ul>
    	</div>
    	<div id="band">
    		<img src="assets/imgs/grupo-bandeirantes.png" alt="grupo-bandeirantes" title="Grupo Bandeirantes" class="img-fluid" />
    	</div>
	</div>
	<div class="col-md-6 col-xs-12">
		<div class="socialmedias col-12">
			<a href="<?php echo $_smarty_tpl->tpl_vars['youtube_link']->value;?>
" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['facebook_link']->value;?>
" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['twitter_link']->value;?>
" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['instagram_link']->value;?>
" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
		<div class="adbutton col-12">
			<a href=#><img src="assets/imgs/addbutton.png" alt="adbutton" title="Quero Anunciar na BandNews" class="img-fluid" /></a>
		</div>
		<span id="slogan">Em 20 minutos, tudo pode mudar.</span>
	</div>
	<div id="copyright"><?php echo $_smarty_tpl->tpl_vars['copyrights']->value;?>
</div>
</footer>
</body>
</html><?php }
}

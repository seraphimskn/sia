<?php
/* Smarty version 3.1.30, created on 2018-03-28 16:21:05
  from "C:\xampp\htdocs\bandnews\site\views\templates\modules\most-readed.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5abba4d105dad3_04758578',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '033c58b8c33417993e8e906b68bdd97077560092' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\views\\templates\\modules\\most-readed.tpl',
      1 => 1522180915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abba4d105dad3_04758578 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="mostReaded col-md-12 col-xs-12">
	<h2>MAIS LIDAS</h2>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['most_readed']->value, 'bestnew');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bestnew']->value) {
?>
		<article id="article-view-<?php echo $_smarty_tpl->tpl_vars['bestnew']->value->ID;?>
" class="col-md-12 col-xs-12 home-view">
			<h2><?php echo $_smarty_tpl->tpl_vars['bestnew']->value->post_title;?>
</h2>
			<small><a href="staff/<?php echo $_smarty_tpl->tpl_vars['bestnew']->value->author_link;?>
"><?php echo $_smarty_tpl->tpl_vars['bestnew']->value->author_name;?>
</a> - <?php echo $_smarty_tpl->tpl_vars['bestnew']->value->date;?>
</small>
			<a href="article/<?php echo $_smarty_tpl->tpl_vars['bestnew']->value->link;?>
" class="excerpt">
				<p><?php echo $_smarty_tpl->tpl_vars['bestnew']->value->excerpt;?>
</p>
			</a>
		</article>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	<a href="articles" class="more">MAIS NOT&Iacute;CIAS</a>
</section><?php }
}

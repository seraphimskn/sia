<?php
/* Smarty version 3.1.30, created on 2018-03-28 16:21:05
  from "C:\xampp\htdocs\bandnews\site\views\templates\modules\staff.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5abba4d11de616_01044609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2c1f9dddca3ad0e477d0ad9f95db4accd53c46f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\views\\templates\\modules\\staff.tpl',
      1 => 1522180915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abba4d11de616_01044609 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="authors col-md-12 col-xs-12">
    <ul>
    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['staffs']->value, 'staff');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['staff']->value) {
?>
    	<li>
    		<a href="staff/<?php echo $_smarty_tpl->tpl_vars['staff']->value->link;?>
"><span class="staff-name"><?php echo $_smarty_tpl->tpl_vars['staff']->value->post_title;?>
</span><img src="<?php echo $_smarty_tpl->tpl_vars['staff']->value->image;?>
" title="<?php echo $_smarty_tpl->tpl_vars['staff']->value->post_title;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['staff']->value->image;?>
" class="img-fluid" /></a>
    	</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ul>
</section><?php }
}

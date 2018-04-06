<?php
/* Smarty version 3.1.30, created on 2018-03-28 16:21:04
  from "C:\xampp\htdocs\bandnews\site\views\templates\modules\youtube.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5abba4d0dadb15_16149899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4386f9e0ad52d244233f33f03608139992461b0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\views\\templates\\modules\\youtube.tpl',
      1 => 1522180915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5abba4d0dadb15_16149899 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="featured-video col-md-12 col-xs-12">
	<h2>V&iacute;deo em destaque</h2>
	<?php if (isset($_smarty_tpl->tpl_vars['video']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['video']->value->post_value;?>
 <?php }?>
</section><?php }
}

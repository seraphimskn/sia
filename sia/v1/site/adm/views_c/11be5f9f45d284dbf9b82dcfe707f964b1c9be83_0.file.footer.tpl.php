<?php
/* Smarty version 3.1.30, created on 2018-04-06 16:53:35
  from "C:\xampp\htdocs\bandnews\site\adm\views\commons\footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac789ef18ea68_02828098',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11be5f9f45d284dbf9b82dcfe707f964b1c9be83' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\adm\\views\\commons\\footer.tpl',
      1 => 1523026206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac789ef18ea68_02828098 (Smarty_Internal_Template $_smarty_tpl) {
?>
<footer <?php if (true == $_smarty_tpl->tpl_vars['sessionLogged']->value) {?>class="internal"<?php }?>>
	<span><?php echo $_smarty_tpl->tpl_vars['configs']->value['copyrights'];?>
</span>
</footer>
</div>
</body>
</html><?php }
}

<?php
/* Smarty version 3.1.30, created on 2020-03-13 14:46:47
  from "/var/www/html/sigms/views/modules/tinyMCE.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e6b9cd7bea2a9_24353037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '983644d9b0a3c80b6ec9a907773005451ecfcebf' => 
    array (
      0 => '/var/www/html/sigms/views/modules/tinyMCE.tpl',
      1 => 1584106778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6b9cd7bea2a9_24353037 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['tinyMCEscript']->value;?>

<?php if (isset($_smarty_tpl->tpl_vars['consoles']->value) && is_array($_smarty_tpl->tpl_vars['consoles']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['consoles']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
echo '<script'; ?>
 language="javascript">
tinymce.init({
    selector: "textarea<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
",
    height: 500,
    resize: false,
    theme: 'modern',
    menubar: false,
    plugins: [
        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
    ],
    toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
    toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | forecolor backcolor",
    toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | visualchars visualblocks nonbreaking template pagebreak restoredraft",
    image_advtab: true,
    branding: false
});
<?php echo '</script'; ?>
>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }
}
}

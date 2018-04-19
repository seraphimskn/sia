<?php /* Smarty version 3.1.30, created on 2018-04-17 19:21:23
         compiled from "C:\xampp\htdocs\hangar\site\system\defines\config.conf" */ ?>
<?php
/* Smarty version 3.1.30, created on 2018-04-17 19:21:23
  from "C:\xampp\htdocs\hangar\site\system\defines\config.conf" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ad62d13a6dac9_80964749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b11c475d63777e90432c72924c2e2a5e0e36269' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hangar\\site\\system\\defines\\config.conf',
      1 => 1523907837,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ad62d13a6dac9_80964749 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigVars($_smarty_tpl, array (
  'sections' => 
  array (
    'database' => 
    array (
      'vars' => 
      array (
        'step' => 'dbConfigs',
        'db' => 'hangar',
        'host' => 'localhost',
        'dbUser' => 'root',
        'dbPwd' => '',
        'tablePrefix' => 'ha_',
        'send' => 'Enviar',
      ),
    ),
    'constants' => 
    array (
      'vars' => 
      array (
        'images_path' => 'assets/imgs',
        'system_path' => 'system',
        'styles_path' => 'assets/css',
        'scripts_path' => 'assets/js',
      ),
    ),
    'others' => 
    array (
      'vars' => 
      array (
        'step' => 'admConfigs',
        'siteName' => 'Academia Hangar',
        'primaryColor' => '#5e18ac',
        'secondaryColor' => '#d2ff23',
        'fontColor' => '#5e18ac',
        'metaDescription' => 'Academia Hangar – Novo espaço – Novas modalidades Sempre um jeito novo para você ficar em forma',
        'admin' => 'Administrador',
        'password' => '1qaz2wsx',
        'email' => 'luiz@setezerosete.com.br',
        'send' => 'Enviar',
      ),
    ),
  ),
  'vars' => 
  array (
  ),
));
}
}

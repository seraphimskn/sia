<?php
/* Smarty version 3.1.30, created on 2018-03-02 15:15:18
  from "C:\xampp\htdocs\bandnews\site\controllers\modules\youtube.controller.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a995c76e4d946_91339880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c22e81d6451c9621ab4847a956479edea11dbc7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\controllers\\modules\\youtube.controller.php',
      1 => 1519999732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a995c76e4d946_91339880 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php 

';?>// retrieves the path to the radio livestream

$the_livestream = $model->select($config_vars->tablePrefix.'configs', array('config_name'=>'streaming'));

// assign the streaming url to a tpl_var
if(count($the_livestream) !== 0 ){
    
    $smarty->assign('streaming', array('the_streaming'=>$the_livestream->config_value));
    
}else{
    
    $smarty->assign('streaming', '');
    
}<?php }
}

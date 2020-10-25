<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($products)){
    $products[0]->data_cadastro = date('d/m/Y H:i:s', strtotime($products[0]->data_cadastro));
    $smarty->assign('produto', $products[0]);
}

$smarty->assign('id_parceiro', $_SESSION['userID']);

$tinyMCE = $module->getModule('tinyMCE', 2);
if(isset($tinyMCE) && !is_null($tinyMCE)){
    $smarty->assign('consoles', array('#descricao'));
    include_once $tinyMCE->controller->controller;
    $smarty->assign('tinyMCE', $tinyMCE->module_path);
}
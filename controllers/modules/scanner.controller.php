<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$data = array();

if(isset($scannerModule->model->model)){
    include_once $scannerModule->model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

$load->setScript($config_vars->scripts_path, 'instascan.min', 'scanner');
$scannerJS = $load->getScript('scanner');
$smarty->assign('scannerJS', $scannerJS);
$smarty->assign('model', $scannerModule->model->model);
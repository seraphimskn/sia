<?php 

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$data = array();

if(isset($menuModule->model->model)){
    include_once $menuModule->model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}


if($level_perms->permissoes != 'all'){
    $permissoes = json_decode($level_perms->permissoes);
}
$smarty->assign('permissoes', (object)$permissoes);
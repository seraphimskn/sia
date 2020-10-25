<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

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

//get the qrCode generator module
$qrModule = $module->getModule('qrCode', 1);

//including the module controller
include_once $qrModule->controller->controller;

//assign the path of the module
$smarty->assign('qrCode', $qrModule->module_path);

$smarty->assign('userID', $_SESSION['userID']);
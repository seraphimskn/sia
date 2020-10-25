<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

if(strtolower($_SESSION['userLevel']) == 'administrador' || strtolower($_SESSION['userLevel']) == 'super-administrador'){
    $payments = $model->select($config_vars->tablePrefix.'vw_payments', null, array('contrato' => $_GET['u']), 'data_vencimento', 'ASC');
}elseif(strtolower($_SESSION['userLevel']) == 'beneficiario' || strtolower($_SESSION['userLevel']) == 'parceiro'){
    $payments = $model->select($config_vars->tablePrefix.'vw_payments', null, array('id_usuario' => $_SESSION['userID']), 'data_vencimento', 'ASC');
}
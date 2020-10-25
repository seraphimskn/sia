<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die('Acesso Negado!');
}

$cId = $model->select($config_vars->tablePrefix.'contratos', array('id'), array('id_usuario' => 4))[0];//$_SESSION['userID']));
$bills = $model->select($config_vars->tablePrefix.'boletos', NULL, array('id_contrato' => $cId->id), 'data_vencimento', 'DESC');

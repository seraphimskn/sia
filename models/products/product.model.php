<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$product = $model->select($config_vars->tablePrefix.'produtos', null, array('id'=>$_GET['u']))[0];

$product->parceiro = $model->select($config_vars->tablePrefix.'usuarios', array('nome'), array('id'=>$product->id_parceiro))[0];

$pontos = $model->select($config_vars->tablePrefix.'fidelidade', array('pontos'), array('id_usuario' => $_SESSION['userID']))[0];

<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

if(!isset($config_vars)){
    die("Acesso negado.");
}

$contrato = $model->select($config_vars->tablePrefix.'contratos', null, array('id' => $_GET['u']))[0];

$usuario = $model->select($config_vars->tablePrefix.'usuarios', null, array('id' => $contrato->id_usuario))[0];

$dependentes = $model->searchLike($config_vars->tablePrefix.'usuarios', array('*'), 'user_hash', '#'.md5('dependente').'#'.$usuario->id);

$plano = $model->select($config_vars->tablePrefix.'planos', null, array('id' => $usuario->convenio))[0];
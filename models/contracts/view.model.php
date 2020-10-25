<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

if(strtolower($_SESSION['userLevel']) != 'administrador' && strtolower($_SESSION['userLevel']) != 'super-administrador'){
    $contract = $model->select($config_vars->tablePrefix.'contratos', NULL, array('id_usuario' => $_SESSION['userID']))[0];
    $usuario = $model->select($config_vars->tablePrefix.'usuarios', NULL, array('id' => $_SESSION['userID']))[0];
    $plan = $model->select($config_vars->tablePrefix.'planos', NULL, array('id'=>$usuario->convenio))[0];
    if($usuario->categoria == 'titular'){
        $dependentes = $model->searchLike($config_vars->tablePrefix.'usuarios', array('*'), 'user_hash', '#'.md5('dependente').'#'.$_SESSION['userID']);
    }else{
        $hash = $model->select($config_vars->tablePrefix.'usuarios', array('user_hash'), array('id' => $_SESSION['userID']))[0];
        $hash = explode(md5('dependente').'#', $hash)[1];
        $hash = explode('#', $hash)[0];
        $dependentes = $model->searchLike($config_vars->tablePrefix.'usuarios', array('*'), 'user_hash', '#'.md5('dependente').'#'.$hash);
    }
}else{
    $contract = $model->select($config_vars->tablePrefix.'contratos');
    foreach($contract as $key => $value){
        $beneficiario = $model->select($config_vars->tablePrefix.'usuarios', array('nome'), array('id'=> $value->id_usuario))[0];
        $vendedor = $model->select($config_vars->tablePrefix.'usuarios', array('nome'), array('id'=>$value->id_vendedor))[0];
        $contract[$key]->beneficiario = $beneficiario->nome;
        $contract[$key]->vendedor = $vendedor->nome; 
    }
}
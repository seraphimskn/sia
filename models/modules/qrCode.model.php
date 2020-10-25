<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");        
}

$getHash = $model->select($config_vars->tablePrefix.'usuarios', array('user_hash'), array('id' => $_SESSION['userID']))[0];

$getUserData = $model->select($config_vars->tablePrefix.'usuarios', array('nome', 'data_nascimento', 'cpf_cnpj', 'telefone'), array('id' => $_SESSION['userID']))[0];

$getUserContractExpire = $model->select($config_vars->tablePrefix.'contratos', array('data_vencimento'), array('id_usuario' => $_SESSION['userID']))[0];

$data['hash'] = $getHash;
$data['userData'] = $getUserData;
$data['contractEnd'] = $getUserContractExpire; 

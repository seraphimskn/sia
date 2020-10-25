<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$contracts = $model->select($config_vars->tablePrefix.'contratos');

foreach($contracts as $contract){
    $usuario = $model->select($config_vars->tablePrefix.'usuarios', array('nome'), array('id' => $contract->id_usuario))[0];
    $vendedor = $model->select($config_vars->tablePrefix.'usuarios', array('nome'), array('id' => $contract->id_vendedor))[0];
    $contratos[] = (object)array('id_contrato' => $contract->id, 'beneficiario' => $usuario->nome, 'vendedor' => $vendedor->nome, 'status' => $contract->ativo);
}

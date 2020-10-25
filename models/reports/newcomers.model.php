<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$levels = $model->select($config_vars->tablePrefix.'niveis', array('id', 'nome'));

foreach($levels as $level){
    if(strtolower($level->nome) == 'beneficiario') $levelUserId = $level->id;
    if(strtolower($level->nome) == 'vendedor') $levelSellerId = $level->id;
    if(strtolower($level->nome) == 'parceiro') $levelPartnerId = $level->id;
}

//the reports queries
$newcomers = $model->select($config_vars->tablePrefix.'usuarios', NULL, array('id_nivel' => $levelUserId), 'data_cadastro', 'DESC'); #newcomer user reports

//adjustments for the newcomers query
foreach($newcomers as $newcomer => $date){

    $dateDiff = (int)((strtotime(date('Y-m-d')) - strtotime($date->data_cadastro)) / 86400);   
    if($dateDiff > 30){
      unset($newcomers[$newcomer]);
    }
}

if(count($newcomers) > 0){
    $data['newcomers'] = $newcomers;
}else{
    $data['newcomers'] = 'Nenhum beneficiário novo registrado este mês.';
}
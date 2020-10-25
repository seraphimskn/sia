<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//the reports queries
$byseller = $model->select($config_vars->tablePrefix.'relatorio_vendedor', NULL, array('ativo' => 1), 'id_vendedor'); #by seller's reports

//adjustments for the byseller report query
foreach($byseller as $contract => $item){
    if(date('m', strtotime($item->data_venda)) != date('m')){
        unset($byseller[$contract]);
    }
}

if(count($byseller) > 0){
    $data['byseller'] = $byseller; 
}else{
    $data['byseller'] = 'Não há fechamentos de vendas ainda.';
}
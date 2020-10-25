<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//the reports queries
$prospects = $model->select($config_vars->tablePrefix.'vw_payments', NULL, array('status' => 1), 'status'); #prospects reports

//adjustments for the prospects query
foreach($prospects as $prospect => $item){
    if(date('m', strtotime($item->data_pagamento)) != date('m') && date('Y', strtotime($item->data_pagamento)) != date('Y')){
        unset($prospects[$prospect]);            
    }    
}

if(count($prospects) > 0){
    $data['prospects'] = $prospects;
}else{
    $data['prospects'] = 'Não há medições até o momento.';
}
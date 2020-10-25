<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//the reports queries
$payments = $model->select($config_vars->tablePrefix.'payments', NULL, NULL, 'status'); #active bills limited reports

//adjustments for the payments query
foreach($payments as $payment=>$item){

    if($item->status != 1){
        if(date('Y', strtotime($item->data_vencimento)) > date('Y')){
            unset($payments[$payment]);
        }elseif(date('m', strtotime($item->data_vencimento)) > date('m')){
            unset($payments[$payment]);
        }
    }else{
        if(date('Y', strtotime($item->data_vencimento)) > date('Y')){
            unset($payments[$payment]);
        }elseif(date('m', strtotime($item->data_vencimento)) > date('m')){
            unset($payments[$payment]);
        }
    }

}

//passing the data controllers
if(count($payments) > 0){
    $data['payments'] = $payments;
}else{
    $data['payments'] = 'Nenhum contrato cadastrado!';
}
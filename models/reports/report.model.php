<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//the reports queries
$selling = $model->select($config_vars->tablePrefix.'relatorio_vendedor', NULL, array('id_vendedor' => $_SESSION['userID']), 'contrato', NULL); #seller's selling reports

if(count($selling) > 0){
    $data['selling'] = $selling; 
}else{
    $data['selling'] = 'Você ainda não efetuou nenhuma venda.';
}
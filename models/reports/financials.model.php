<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//the reports queries
$financials = $model->select($config_vars->tablePrefix.'vendas_pdv', NULL, array('id_parceiro' => $_SESSION['userID']), NULL, NULL); #POS financial reports

if(count($financials) > 0){
    $data['financials'] = $financials; 
}else{
    $data['financials'] = 'Não houve vendas neste Ponto de Venda Associado.';
}
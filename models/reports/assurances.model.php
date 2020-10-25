<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//the reports queries
$assurances = $model->select($config_vars->tablePrefix.'assurances', NULL, array('ativo' => 1), 'contrato', 'ASC'); #assuranced contract type reports

//passing the data controllers
if(count($assurances) > 0){
    $data['assurances'] = $assurances; 
}else{
    $data['assurances'] = 'Não há beneficiários assegurados.';
}
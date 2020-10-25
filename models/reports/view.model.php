<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);
 
//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//select levels
//select levels
$levels = $model->select($config_vars->tablePrefix.'niveis', array('id', 'nome'));

foreach($levels as $level){
    if(strtolower($level->nome) == 'beneficiario') $levelUserId = $level->id;
    if(strtolower($level->nome) == 'vendedor') $levelSellerId = $level->id;
    if(strtolower($level->nome) == 'parceiro') $levelPartnerId = $level->id;
}


//the reports queries
$payments = $model->searchLike($config_vars->tablePrefix.'payments', array('*'), 'vencimento', '-'.date('m').'-'); #active bills limited reports
$births = $model->select($config_vars->tablePrefix.'usuarios', NULL, array('ativo' => 1), 'data_nascimento', 'ASC LIMIT 10'); #active users birthday reports
$newcomers = $model->select($config_vars->tablePrefix.'usuarios', NULL, array('id_nivel' => $levelUserId), 'data_cadastro', 'DESC LIMIT 10'); #newcomer user reports
$prospects = $model->select($config_vars->tablePrefix.'payments', array('valor'), array('status' => 1), 'status', NULL); #prospects reports
$assurances = $model->select($config_vars->tablePrefix.'assurances', NULL, array('ativo' => 1), 'id_usuario', null); #view by life assurance 
$byseller = $model->select($config_vars->tablePrefix.'relatorio_vendedor', NULL, array('ativo' => 1), 'id_vendedor', 'LIMIT 10'); #by seller's reports
//financial report by user level
if(strtolower($_SESSION['userLevel']) == 'parceiro'){
    $financials = $model->select($config_vars->tablePrefix.'vendas_pdv', NULL, array('id_parceiro' => $_SESSION['userID']), NULL, 'DESC LIMIT 20'); #POS financial reports
}elseif(strtolower($_SESSION['userLevel']) == 'beneficiario'){
    $financials = $model->select($config_vars->tablePrefix.'vendas_pdv', NULL, array('id_usuario' => $_SESSION['userID']), NULL, 'DESC LIMIT 20'); #POS financial reports
}elseif((strtolower($_SESSION['userLevel']) != 'parceiro' && strtolower($_SESSION['userLevel']) != 'beneficiario') && isset($user_stats->permissoes['relatorios']) && strstr($user_stats->permissoes['relatorios'], 'compras')){
    $financials = $model->select($config_vars->tablePrefix.'vendas_pdv', NULL, NULL, 'id_parceiro', 'DESC LIMIT 20'); #POS financial reports
}
$selling = $model->select($config_vars->tablePrefix.'relatorio_vendedor', NULL, array('id_vendedor' => $_SESSION['userID']), 'contrato', 'LIMIT 10'); #seller's selling reports

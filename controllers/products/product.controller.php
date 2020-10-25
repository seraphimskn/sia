<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$data = array();

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($product)){
    $smarty->assign('produto', $product);
}

if(isset($pontos)){
    $qtdPontos = intval($product->pontos - $pontos->pontos);
    if($qtdPontos < 0) $qtdPontos = 0;
    if($pontos->pontos == 0) $qtdPontos = NULL;
    $smarty->assign('qtdPontos', $qtdPontos); 
}
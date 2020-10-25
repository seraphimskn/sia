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

if(isset($products)){
    $smarty->assign('produtos', $products);
}

if(isset($_SESSION['userLevel'])){
    $smarty->assign('userLevel', $_SESSION['userLevel']); 
}
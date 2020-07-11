<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initialize $data
$data = array();

//model archive inclusion
if($the_model->error == 0){
    include_once '../adm/'.$the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($data['configurations']) && $data['configurations'] != ''){
    $smarty->assign('configurations', $data['configurations']);
}else{
    $smarty->assign('configurations', 'Nenhuma configura&ccedil;&atilde;o foi feita ainda.');
}
<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}
    
//model archive inclusion
if($the_model->error == 0){
    include_once '../adm/'.$common_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}
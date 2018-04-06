<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}
    
 //model archive inclusion
if(isset($the_model) && $the_model !== null){
    include_once $the_model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}
<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once '../adm/'.$the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados n�o pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($data['medias']) && $data['medias'] != ''){
    $smarty->assign('medias', $data['medias']);
}else{
    $smarty->assign('medias', 'Nenhuma m&iacute;dia foi configurada ainda.');
}
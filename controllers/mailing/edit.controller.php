<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($user)){
    $user[0]->data_cadastro = date('d/m/Y H:i:s', strtotime($user[0]->data_cadastro));
    $smarty->assign('usuario', $user[0]);
}

if(isset($levels)){
    $smarty->assign('levels', $levels);
}

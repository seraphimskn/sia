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

//lookup to the metrics
if(isset($data['metrics']) && $data['metrics'] > 0){
    $smarty->assign('metrics', $data['metrics']);
}

//assign the posts snippets
if(isset($data['posts']) && $data['posts'] > 0){
    $smarty->assign('posts', $data['posts']);
}
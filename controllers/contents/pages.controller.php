<?php 

//secure check
if(!isset($config_vars)){
    die('Acesso negado.');
}

if($one_page_model->error !== true){
    include_once $one_page_model->model;
}else{
    echo 'Houve um erro! O modelador de dados n&atilde;o existe ou n&atilde;o p&ocirc;de ser carregado, contate o administrador do sistema!';
}


$smarty->assign('pages', (object)$data['pages']);
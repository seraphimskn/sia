<?php 

//secure the system
if(!isset($config_vars)){
    die('Acesso Negado.');
}

//includes the common data model
if($common_model->error == 0){
    include_once $common_model->model;
}else{
    echo 'Houve um erro! O modelador de dados n&atilde;o existe ou n&atilde;o p&ocirc;de ser carregado, contate o administrador do sistema!';
}

//retrieves the default scripts and styles
$smarty->assign('styles', $styles->styles); #styles
$smarty->assign('scripts', $scripts->scripts); #scripts

//assigns the data to the tpl reader
$smarty->assign('configs', $data['configs']); #configs
$smarty->assign('pages', $data['pages']); #pages
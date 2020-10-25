<?php 

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die("Acesso negado.");
    }else{
        var_dump($_POST);
    }
}else{

    //model archive inclusion
    if(isset($the_model->model) && $the_model->model !== null){
        include_once $the_model->model;
    }else{
        echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
    }

    $tinyMCE = $module->getModule('tinyMCE', 2);
    if(isset($tinyMCE) && !is_null($tinyMCE)){
        $smarty->assign('consoles', array('#conteudo', '#observacoes'));
        include_once $tinyMCE->controller->controller;
        $smarty->assign('tinyMCE', $tinyMCE->module_path);
    }
}
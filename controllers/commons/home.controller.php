<?php

//secure the system
if(!isset($config_vars)){
    die('Acesso negado.');
}

//includes the common data model
if($body_model->error == 0){
    include_once $body_model->model;
}else{
    echo 'Houve um erro! O modelador de dados n&atilde;o existe ou n&atilde;o p&ocirc;de ser carregado, contate o administrador do sistema!';
}

//retrieves the modules
if(isset($data['home']['extensions'])){
    $extensions = $data['home']['extensions'];
    
    foreach($extensions as $extension){
        $the_modules = $module->getModule($extension->module, $extension->id);
    }
    
    if(isset($the_modules->error) && $the_modules->error == true){
        echo $the_modules->msg;
    }else{
        $smarty->assign('module', $the_modules->module_path);
        
        include_once $the_modules->controller->controller;
        
    }
}

//sets the template vars
$smarty->assign('home', (object)$data['home']);
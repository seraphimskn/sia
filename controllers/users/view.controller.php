<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

/**
 * REQ MED-59-3.3.1 -- LISTAGENS - VISÃO DO ADMINISTRADOR
 * 
 * Related:
 * 
 * root_folder: users/
 * 
 * file                        type
 * view.controller.php         controller
 * view.model.php              model
 * view.view.php               view
 * class.Controller.php        system core
 * class.Model.php             system core
 * class.Load.php              system core
 * class.Router.php            system core
 */

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

//assign the user's info retrieved from DB to tpl view
if(isset($users)){
    $smarty->assign('usuarios', $users);
}

if(isset($_SESSION['userLevel'])){
    $smarty->assign('userLevel', $_SESSION['userLevel']);
}
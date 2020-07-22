<?php 

#including the core system
include_once 'system/core/class.Controller.php';
include_once 'system/core/class.Load.php';
include_once 'system/core/class.Model.php';
include_once 'system/core/class.Router.php';
include_once 'system/core/class.Modules.php';

#including the Smarty template compiler to the system
include_once 'system/smarty/libs/Autoloader.php';

#include the startup to the system
include_once 'startup.php';

#starts the application rendering
#the headers
//inserts the controller

if($common_controller->error == 0){
    include_once $common_controller->controller;
}else{
    echo 'Houve um erro! O controlador n&atilde;o existe ou n&atilde;o p&ocirc;de ser carregado, contate o administrador do sistema!';
}

$smarty->display($header);

$smarty->display($footer);




<?php 

#including the core system
include_once 'system/core/class.Controller.php';
include_once 'system/core/class.Load.php';
include_once 'system/core/class.Model.php';
include_once 'system/core/class.Router.php';

#including the Smarty template compiler to the system
include_once 'system/smarty/libs/Autoloader.php';

#including the PHPMailer class
include_once 'system/libs/PHPMailer-master/PHPMailerAutoload.php';

#including the startup file of the system
include_once 'startup.php';

#starts the application rendering
#the headers
if ($common_controller->error == 0){
    include_once $common_controller->controller;
}else{
    echo 'Houve um erro! O controlador não existe ou não pôde ser carregado, contate o administrador do sistema!';
}
$smarty->display($header);

#the main content of the application
if($body_controller->error == 0){
    include_once $body_controller->controller;
}else{
    echo 'Houve um erro! O controlador não existe ou não pôde ser carregado, contate o administrador do sistema!';
}
$smarty->display($body);

#the footers
$smarty->display($footer);

$postagem = array(
    'page_title'    => 'Media Kit',
    'page_type'     => 'mediakit',
    'page_value'    => '',
    'page_options'  => '',
    'page_clicks'   => '',
    'published'     => 1,
    'created_on'    => date('Y-m-d H:i:s'),
    'created_by'    => 0,
    'updated_on'    => date('Y-m-d H:i:s'),
    'updated_by'    => 0,
    'last_user_IP'  => $_SERVER['REMOTE_ADDR'].'::'.$_SERVER['REMOTE_PORT']
); 

/*
$media = array(
            'attached_to'   =>  '{"post": { "3", "4"} }',
            'updated_on'    => date('Y-m-d H:i:s'),
            'updated_by'    => 0,
            'last_user_IP'  => $_SERVER['REMOTE_ADDR'].'::'.$_SERVER['REMOTE_PORT']
        );
*/
/* $addPost = $model->add($config_vars->tablePrefix.'pages', $postagem); */
/* $addPost = $model->update($config_vars->tablePrefix.'pages', $postagem, 7); */
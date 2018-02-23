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

/* $media = array(
    array(
    'media_name'    => 'listen-button',
    'media_title'   => 'Ouvir Rádio On-Line',
    'attached_to'   =>  0,
    'media_url'     => 'uploads/radio-listen-home.png',
    'uploaded_on'   => date('Y-m-d H:i:s'),
    'uploaded_by'   => 0,
    'updated_on'    => date('Y-m-d H:i:s'),
    'updated_by'    => 0,
    'last_user_IP'  => '000.000.000'
        ),
    array(
        'media_name'    => 'listen-off-button',
        'media_title'   => 'Rádio Fora do Ar',
        'attached_to'   =>  0,
        'media_url'     => 'uploads/radio-listen-offair.png',
        'uploaded_on'   => date('Y-m-d H:i:s'),
        'uploaded_by'   => 0,
        'updated_on'    => date('Y-m-d H:i:s'),
        'updated_by'    => 0,
        'last_user_IP'  => '000.000.000'
    )
);
 */

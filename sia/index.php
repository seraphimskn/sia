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
    'page_value'    => '<h2>A BandNews FM</h2><p>A BandNews FM é a primeira rede brasileira de emissoras de rádio em FM com jornalismo 24 horas no ar. A cada 20 minutos, oferecemos ao ouvinte um jornal completo e atualizado, com a opinião dos nossos apresentadores e colunistas. Nestes 20 minutos, apresentamos as principais notícias do Brasil e do mundo, mas com grande espaço para o noticiário de cada cidade.</p><p>Desde 20 de maio de 2005 no ar, somos hoje referência em divulgação ágil de notícias nos principais mercados do país, transmitindo para São Paulo, Brasília, Rio de Janeiro, Belo Horizonte, Porto Alegre, Manaus, Salvador, Curitiba, Fortaleza, João Pessoa, Vitória e Orlando nos Estados Unidos, aliando força jornalística, inovação e alto astral, sempre com a credibilidade do Grupo Bandeirantes de Comunicação.</p>', 
    'page_options'  => '{"destaque": "<img src=\"uploads/bandnewsfm.jpg\" alt=\"\" title=\"\">", "others":{"video", "twitter", "facebook"}}',
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
/*$addPost = $model->add($config_vars->tablePrefix.'posts', $postagem);*/
/* $addPost = $model->update($config_vars->tablePrefix.'media', $media, 10);*/
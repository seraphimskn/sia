<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//model archive inclusion
if($common_model->error == 0){
    include_once $common_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados n�o pode ser carregado. Entre em contato com o administrador do sistema.';
}

//load the headers variable
if(true === $styles->error){
    $smarty->assign('styles', 'Can\'t load the stylesheets! Contact the system administrator.');
}else{
    $smarty->assign('styles', $styles->styles); #styles
}
if(true === $scripts->error){
    $smarty->assign('scripts', 'Can\'t load the scripts! Contact the system administrator.');
}else{
    $smarty->assign('scripts', $scripts->scripts); #scripts
}

//set the base href
$smarty->assign('baseHREF', '/adm_conecta/');

//checks if there is a session started
(isset($_SESSION) && isset($_SESSION['logged'])) ? $smarty->assign('sessionLogged', true) : $smarty->assign('sessionLogged', false);

//retrieves the type of administration will show
if(isset($_SESSION) && isset($_SESSION['user_level'])) $smarty->assign('userLevel', $_SESSION['user_level']);

//assign the user data to the TPL vars
if(isset($_SESSION['logged'])){
    foreach($user_stats as $user){
        $smarty->assign('userData', $user);
    }
}

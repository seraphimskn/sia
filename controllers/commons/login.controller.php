<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

/**
 * REQ MED-39-3.1 -- LOGIN
 * 
 * Related:
 * 
 * file                         type
 * login.controller.php         controller
 * login.model.php              model
 * login.view.php               view
 * class.Controller.php         system core
 * class.Model.php              system core
 * class.Load.php               system core
 * class.Router.php             system core
 */

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initialize $data
$data = array();

//model archive inclusion
if($the_model->error == 0){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

//REQ MED-40-3.1.1
//User authentication
if(isset($data['user'])){
    
    $_SESSION['userName'] = $data['user']->nome;
    $_SESSION['userID'] = $data['user']->id;
    $_SESSION['userIP'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['userLevel'] = $data['userLevel']->nome;
    $_SESSION['logged'] = true;
    $log_acessos = fopen('system/logs/log_acessos_'.date('d-m-Y').'.log', 'a+');
    $log_text = 'Login: ['.date('d/m/Y H:i:s').'] - User: '.$data['user']->nome.' - IP: '.$_SERVER['REMOTE_ADDR'].PHP_EOL;
    if(fwrite($log_acessos, $log_text)){
        fclose($log_acessos);
        header('Location:  ./');
    }
    
}elseif(isset($data['error'])){
    $data['error'] = 'Login ou Senha incorretos. Por favor, tente novamente.';
}

//return to the template view
$smarty->assign('data', $data);
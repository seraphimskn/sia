<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initialize $data
$data = array();

//model archive inclusion
if($body_model->error == 0){
    include_once $body_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados n&atilde;o pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($data['user'])){
    $_SESSION['userName'] = $data['user']->name;
    $_SESSION['userID'] = $data['user']->id;
    $_SESSION['userIP'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['user_level'] = $data['user']->immunity;
    $_SESSION['logged'] = true;
    header('Location:  ./');
    exit();
}elseif(isset($data['error'])){
    $data['error'] = 'Login ou Senha incorretos. Por favor, tente novamente.';
}

$smarty->assign('data', $data);
<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initialize $data
$data = array();

//model archive inclusion
if($the_model->error == 0){
    include_once '../adm/'.$the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($data['user'])){
    $_SESSION['userName'] = $data['user']->user_name;
    $_SESSION['userID'] = $data['user']->ID;
    $_SESSION['userIP'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['user_level'] = $data['user']->user_level;
    $_SESSION['logged'] = true;
    header('Location:  ./');
}elseif(isset($data['error'])){
    $data['error'] = 'Login ou Senha incorretos. Por favor, tente novamente.';
}

$smarty->assign('data', $data);
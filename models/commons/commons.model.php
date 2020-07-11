<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$data = array();

$the_configs = $model->select($config_vars->tablePrefix.'configs');

foreach($the_configs as $config){
    $data['configs'][$config->config_name] = $config->config_value;
}

if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){
    $user_stats = $model->select($config_vars->tablePrefix.'login', array('ID'=>$_SESSION['userID']));
}

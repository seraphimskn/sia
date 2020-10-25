<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$data = array();

if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){
    $user_stats = $model->select($config_vars->tablePrefix.'usuarios', array(''), array('id'=>$_SESSION['userID']))[0];
    $user_level = $model->select($config_vars->tablePrefix.'niveis', NULL, array('id' => $user_stats->id_nivel))[0];
}

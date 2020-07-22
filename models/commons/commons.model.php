<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$data = array();

if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){
    $user_stats = $model->select($config_vars->tablePrefix.'login', array('ID'=>$_SESSION['userID']));
}

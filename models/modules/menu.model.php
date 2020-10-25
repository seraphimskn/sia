<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//the level queries
$level_id = $model->select($config_vars->tablePrefix.'usuarios', array('id_nivel AS nivel'), array('id' => $_SESSION['userID']))[0]; #get the level id of the user
$level_perms = $model->select($config_vars->tablePrefix.'niveis', array('permissoes'), array('id' => $level_id->nivel))[0]; #get the level perms 

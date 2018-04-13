<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initalizes the $data
$data = array();

$the_configs = $model->select($config_vars->tablePrefix.'configs', null, 'created_on', 'DESC');

if(count($the_configs) >= 1){
    foreach($the_configs as $config){
        $data['configurations'][] = $config;
    }
}else{
    $data['configurations'] = '';
}
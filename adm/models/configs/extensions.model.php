<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initalizes the $data
$data = array();

$the_extensions = (object)$model->select($config_vars->tablePrefix.'extensions', null, 'created_on', 'DESC');

if(count($the_extensions) >= 1){
    foreach($the_extensions as $extension){
        $data['extensions'][] = $extension;
    }
}else{
    $data['extensions'] = '';
}
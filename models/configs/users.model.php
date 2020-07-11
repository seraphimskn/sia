<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initalizes the $data
$data = array();

$the_users = $model->select($config_vars->tablePrefix.'login', null, 'created_on', 'DESC');

if(count($the_users) >= 1){
    foreach($the_users as $user){
        $data['users'][] = $user;
    }
}else{
    $data['user'] = '';
}
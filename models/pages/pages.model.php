<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initalizes the $data
$data = array();

$the_pages = $model->select($config_vars->tablePrefix.'pages', null, 'created_on', 'DESC');

if(count($the_pages) >= 1){
    foreach($the_pages as $page){
        $data['pages'][] = $page;
    }
}else{
    $data['pages'] = '';
}
<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initalizes the $data
$data = array();

$the_posts = $model->select($config_vars->tablePrefix.'posts', null, 'created_on', 'DESC');

if(count($the_posts) >= 1){
    foreach($the_posts as $post){
        $data['posts'][] = $post;
    }
}else{
    $data['posts'] = '';
}
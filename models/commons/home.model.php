<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initalizes the $data
$data = array();

$statistics = $model->select($config_vars->tablePrefix.'metrics', null, 'updated_on', 'DESC');

if(count($statistics) > 0){
    
}else{
    
    $data['metrics']['info'] = 'No metrics registered yet!';
    
}

$the_posts = $model->select($config_vars->tablePrefix.'posts', array('post_type' => 'post'), 'created_on', 'DESC LIMIT 9');

if(count($the_posts) >= 1){
    foreach($the_posts as $post){
        $data['posts'][] = $post;
    }
}else{
    $data['posts'] = '';
}
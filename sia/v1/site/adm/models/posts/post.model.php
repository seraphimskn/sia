<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initialize $data
$data = array();

//select the post types
$post_categories = (object)$model->select($config_vars->tablePrefix.'options', array('option_for'=>'post_type')); 

if(count($post_categories) >= 1){
    if(is_array($post_categories)){
        foreach($post_categories as $categories){
            $data['post_types'] = $categories;
        }
    }
}

//select the extensions and plugins
$extensions = (object)$model->select($config_vars->tablePrefix.'options', array('published' => '1'));

if(count($extensions) >= 1){
    if(is_array($extensions)){
        foreach($extensions as $extension){
            $data['extensions'] = $extension;
        }
    }
}

//if the actions is an updating
if($the_action == 'update'){
    
    //first look for previous data on the table
    $previous = (object)$model->select($config_vars->tablePrefix.'posts', array('ID' => $actions[1]));
    
    foreach($previous as $p){
        $data['post'] = $p; 
    }
    
}elseif($the_action == 'add'){
    
}
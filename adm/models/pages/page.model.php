<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initialize $data
$data = array();

//select the page types
$page_types = $model->select($config_vars->tablePrefix.'options', array('option_type'=>'page_type'));
if(count($page_types) >= 1){
    foreach($page_types as $types){
        $data['page_types'][] = $types;
    }
}

//select the extensions
$extensions = $model->select($config_vars->tablePrefix.'extensions', array('published'=>1));
if(count($extensions) >= 1){
    foreach($extensions as $extension){
        $data['extensions'][] = $extension;
    }
}

foreach($actions as $action){
    if(is_array($action)){
        foreach($action as $a){
            if($a == 'update'){
                $act = 'update';
            }elseif($a == 'add'){
                $act = 'add';
            }elseif($a == 'delete'){
                $act = 'delete';
            }
        }
    }else{
        if($action == 'update'){
            $act = 'update';
        }elseif($action == 'add'){
            $act = 'add';
        }elseif($action == 'delete'){
            $act = 'delete';
        }
    }
}

if($act == 'add'){
   
    if(isset($_POST['publish'])){
        extract($_POST);
        
        if(isset($publish)){
            $published = 1;
        }elseif(isset($unpublish)){
            $published = 0;
        }
        
        if(isset($options)){
            $page_options = json_encode($options);
        }else{
            $page_options = '';
        }
        
        $params = array (
            'page_title'   => $page_title,
            'page_slug'    => $page_slug,
            'page_value'   => $page_value,
            'page_type'    => $page_type,
            'published'    => $published,
            'page_options' => $page_options,
            'created_on'   => date('Y/m/d H:i:s'),
            'created_by'   => $_SESSION['userID'],
            'updated_on'   => date('Y/m/d H:i:s'),
            'updated_by'   => $_SESSION['userID'],
            'last_user_IP' => $_SERVER['REMOTE_ADDR']
        );
        
        if($model->add($config_vars->tablePrefix.'pages', $params) == 1){
            header('Location: add/success');
        }else{
            header('Location: add/error');
        }
    }
    
}elseif($act == 'update'){
    
    $post_id = end($actions);
    
    $the_post = (object)$model->select($config_vars->tablePrefix.'pages', array('ID'=>$post_id));
   
    foreach($the_post as $post){
         $data['page'] = $post; 
    }
    
    if(isset($_POST['publish'])){
       
        extract($_POST);
        
        if(isset($publish)){
            $published = 1;
        }elseif(isset($unpublish)){
            $published = 0;
        }
        
        if(isset($options)){
            $page_options = json_encode($options);
        }else{
            $page_options = '';
        }
        
        $params = array (
            'page_title'   => $page_title,
            'page_slug'    => $page_slug,
            'page_value'   => $page_value,
            'page_type'    => $page_type,
            'published'    => $published,
            'page_options' => $page_options,
            'created_on'   => date('Y/m/d H:i:s'),
            'created_by'   => $_SESSION['userID'],
            'updated_on'   => date('Y/m/d H:i:s'),
            'updated_by'   => $_SESSION['userID'],
            'last_user_IP' => $_SERVER['REMOTE_ADDR']
        );
        
        if($model->update($config_vars->tablePrefix.'pages', $params, $post_id) == 1){
            header('Location: '.$post_id.'/success');
        }else{
            header('Location: '.$post_id.'/error');
        }
        
    }elseif(isset($_POST['unpublish'])){
        echo 'update to draf';
    }
    
}

<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once '../adm/'.$the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

//registering the AJAX javascript controller
$load->setScript($config_vars->scripts_path, 'ajax', 'ajax');
$smarty->assign('ajax', $load->getScript('ajax'));

//registering the tinyMCE editor for the post
$load->setScript($config_vars->scripts_path.'/tinymce', 'tinymce.min', 'tinyMCE');
$smarty->assign('tinyMCE', $load->getScript('tinyMCE'));

foreach($actions as $action){
    if(is_array($action)){
        if($action == 'update'){
            $the_action = 'update';
            break;
        }
    }else{
        if($actions == 'add'){
            $the_actions = 'add';
            break;
        }
    }
}

//setting the template vars
//the post vars if is updating a post
if(isset($data['post'])){
    $smarty->assign('post', $data['post']);
    $options = (object)json_decode($data['post']->post_options);
    $images = json_decode($data['post']->post_images);
    if(isset($images) && isset($images->featured)){
        $the_image = (object)$model->select($config_vars->tablePrefix.'media', array('ID'=>$images->featured));
        foreach($the_image as $image){
            $smarty->assign('image', $image->media_url);
        }
    }else{
        $smarty->assign('image', 'adm/assets/imgs/no-image.png');
    }
    if($data['post']->published == 1){
        $smarty->assign('status', 'Publicado');
    }else{
        $smarty->assign('status', 'Rascunho');
    }
    $smarty->assign('post_options', $options);
    $smarty->assign('date_published', date('d/m/Y H:i:s', strtotime($data['post']->created_on)));
    
}

//the post vars if adding a post
if(!isset($data['post'])){
    $smarty->assign('image', 'adm/assets/imgs/no-image.png');
    $smarty->assign('status', 'N&atilde;o publicado ainda');
    $smarty->assign('date_published', '');
}

$smarty->assign('server', $_SERVER);
$smarty->assign('url', explode('/', $_SERVER['REQUEST_URI']));

if(isset($data['post_types'])){
    $smarty->assign('post_types', $data['post_types']);
}else{
    $smarty->assign('post_types', '');
}

if(isset($data['extensions'])){
    $smarty->assign('extensions', $data['extensions']);
}else{
    $smarty->assign('extensions', '');
}
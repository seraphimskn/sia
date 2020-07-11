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

//registering the AJAX js controller
$load->setScript($config_vars->scripts_path, 'ajax', 'ajax');
$smarty->assign('ajax', $load->getScript('ajax'));

//registering the tinyMCE editor for the post
$load->setScript($config_vars->scripts_path.'/tinymce', 'tinymce.min', 'tinyMCE');
$smarty->assign('tinyMCE', $load->getScript('tinyMCE'));

//setting the template vars
//the post vars if is updating a post
if(isset($data['page'])){
    $smarty->assign('page', $data['page']);
    $options = json_decode($data['page']->page_options);
    if(isset($options->featured_image)){
        if($options->featured_image != 'assets/imgs/no-image.png'){
            $the_image = (object)$model->select($config_vars->tablePrefix.'media', array('ID'=>$options->featured_image));
            foreach($the_image as $image){
                $smarty->assign('image', $image->media_url);
            }
        }else{
            $smarty->assign('image', 'assets/imgs/no-image.png');
        }
    }else{
        $smarty->assign('image', 'assets/imgs/no-image.png');
    }
       
    if($data['page']->published == 1){
        $smarty->assign('status', 'Publicado');
    }else{
        $smarty->assign('status', 'Rascunho');
    }
        
    $smarty->assign('options', $options);
    $smarty->assign('date_published', date('d/m/Y \a\t H:i:s', strtotime($data['page']->created_on)));
    $smarty->assign('server', $_SERVER);
    
}

if(!isset($data['page'])){
    $smarty->assign('image', 'assets/imgs/no-image.png');
    $smarty->assign('status', 'N&atilde;o publicado ainda');
    $smarty->assign('date_published', '');
}

if(in_array('success', $actions)){
    $smarty->assign('msg', '<div class="alert-success alert" role="alert">P&aacute;gina adicionada!</div>');
}elseif(in_array('error', $actions)){
    $smarty->assign('msg', '<div class="alert-warning alert" role="alert">Houve um erro e a p&aacute;gina n&atilde;o p&ocirc;de ser adicionada! Contate o administrador do site!</div>');
}

$smarty->assign('userID', $_SESSION['userID']);

if(isset($data['page_types'])){
    $smarty->assign('page_types', $data['page_types']);
}else{
    $smarty->assign('page_types', '');
}

if(isset($data['extensions'])){
    $smarty->assign('extensions', $data['extensions']);
}else{
    $smarty->assign('extensions', '');
}
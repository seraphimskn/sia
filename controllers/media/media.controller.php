<?php

include_once '../system/core/class.Upload.php';

$upload = new Upload();

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

//initialize the $data
$data = array();

//setting the template vars
//the post vars if is updating a post
if(isset($data['media'])){
    $smarty->assign('media', $data['media']);
    $attachments = json_decode($data['media']->attached_to);
    
    foreach($attachmens as $attachment){
        $data['attachment'][] = $attachment;
    }
    
    $smarty->assign('attachments', $data['attachment']);
    $smarty->assign('date_published', date('d/m/Y \a\t H:i:s', strtotime($data['page']->created_on)));
    $smarty->assign('server', $_SERVER);
    
}

//the add message setting
if(in_array('success', $actions)){
    $smarty->assign('msg', '<div class="alert-success alert" role="alert">Imagem adicionada!</div>');
}elseif(in_array('fail', $actions)){
    $smarty->assign('msg', '<div class="alert-warning alert" role="alert">Houve um erro e a imagem n&atilde;o p&ocirc;de ser adicionada! Contate o administrador do site!</div>');
}


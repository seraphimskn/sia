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

//registering the tinyMCE editor for the post
$load->setScript($config_vars->scripts_path.'/tinymce', 'tinymce.min', 'tinyMCE');
$smarty->assign('tinyMCE', $load->getScript('tinyMCE'));

//registering the ajax JS controller
$load->setScript($config_vars->scripts_path, 'ajax', 'ajax');
$smarty->assign('ajax', $load->getScript('ajax'));

//assign the extension to the $data holder
//if is updating
if(isset($data['extension'])){
    $smarty->assign('extension', $data['extension']);
    
    if($data['extension']->published == 1){
        $smarty->assign('status', 'Publicado');
    }else{
        $smarty->assign('status', 'Rascunho');
    }
    
    $smarty->assign('date_published', date('d/m/Y \a\t H:i:s', strtotime($data['extension']->created_on)));
    $smarty->assign('server', $_SERVER);
}

if(!isset($data['extension'])){
    $smarty->assign('status', 'N&atilde;o publicado ainda');
    $smarty->assign('date_published', '');
}

if(in_array('success', $actions)){
    $smarty->assign('msg', '<div class="alert-success alert" role="alert">Extens&atilde;o adicionada!</div>');
}elseif(in_array('error', $actions)){
    $smarty->assign('msg', '<div class="alert-warning alert" role="alert">Houve um erro e a extens&atilde;o n&atilde;o p&ocirc;de ser adicionada! Contate o administrador do site!</div>');
}

$smarty->assign('userID', $_SESSION['userID']);

if(isset($data['extension_types'])){
    $smarty->assign('extension_types', $data['extension_types']);
}else{
    $smarty->assign('extension_types', '');
}
<?php
var_dump($_REQUEST);

//secure check
if(!isset($config_vars) || $_REQUEST['secure'] !== true){
    die("Acesso negado.");
}
    
//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once '../adm/'.$the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

//set the directives for the ajax insertions
if(isset($_REQUEST['new_post_type'])){
    echo json_decode($_REQUEST);
}

//registering the tinyMCE editor for the post
$load->setScript($config_vars->scripts_path.'/tinymce', 'tinymce.min', 'tinyMCE');
$smarty->assign('tinyMCE', $load->getScript('tinyMCE'));

$smarty->assign('status', 'Publicado');
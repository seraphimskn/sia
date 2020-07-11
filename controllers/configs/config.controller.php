<?php

if(true !== $config_vars->ajax){

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

$smarty->assign('status', 'Publicado');

}else{
    
    
    
}
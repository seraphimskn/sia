<?php 

//secure check
if(!isset($config_vars)){
    die('Acesso negado.');
}

if(isset($the_modules->model->model)){
    include_once $the_modules->model->model;
}else{
    echo 'N&atilde;o foi poss&iacute;vel carregar o arquivo de dados. Contate o administrador do sistema.';
}

if(isset($data['slideshows'])){
    
    $imgs = $data['slideshows']->extension_value;
    $imgs = str_ireplace('../../../', '', $imgs);
    $imgs = preg_replace('/\<p\>/', '', $imgs);
    $imgs = preg_replace('/\<\/p\>/', '', $imgs);
    $smarty->assign('slideshow', $imgs);
    
}
<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//loads the hmtl5 canvas controler
$load->setScript($config_vars->scripts_path, 'kinetic-v5.1.0.min', 'kineticJS');
$smarty->assign('kinetic', $load->getScript('kineticJS'));

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once '../adm/'.$the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

//lookup to the metrics
if(isset($data['metrics']) && $data['metrics'] > 0){
    $smarty->assign('metrics', $data['metrics']);
}

//assign the posts snippets
if(isset($data['posts']) && $data['posts'] > 0){
    $smarty->assign('posts', $data['posts']);
}
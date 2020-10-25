<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

/**
 * REQ MED-57-3.8.1 -- EDIÇÃO DE PERFIS - EDIÇÃO DE DADOS DE USUÁRIOS
 * 
 * Related:
 * 
 * root_folder: users/
 * 
 * file                         type
 * edit.controller.php          controller
 * edit.model.php               model
 * edit.view.php                view
 * class.Controller.php         system core
 * class.Model.php              system core
 * class.Load.php               system core
 * class.Router.php             system core
 * class.Ajax.php               system core
 */

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($user)){
    $user[0]->data_cadastro = date('d/m/Y H:i:s', strtotime($user[0]->data_cadastro));
    $user[0]->data_nascimento = date('Y-m-d', strtotime($user[0]->data_nascimento));
    $endereco = explode(' / ', $user[0]->endereco);
    $user[0]->endereco = $endereco[0];
    $user[0]->bairro = $endereco[1];
    $user[0]->cep = $endereco[2];
    $smarty->assign('usuario', $user[0]);
    if(count($user_contract) > 0){
        $smarty->assign('usuario_contrato', $user_contract[0]);
    }
}

if(strtolower($_SESSION['userLevel']) == 'vendedor'){
    $smarty->assign('is_seller', true);
}

if(isset($plans)){
    $smarty->assign('plans', $plans);
}

if(isset($levels)){
    $smarty->assign('levels', $levels);
}   
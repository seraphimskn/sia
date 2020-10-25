<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

/**
 * REQ MED-76-3.6.2 -- CADASTROS - NÍVEIS DE USUÁRIOS
 * 
 * Related:
 * 
 * root_folder: levels/
 * 
 * file                        type
 * add.controller.php          controller
 * add.model.php               model
 * add.tpl                     view
 * class.Controller.php        system core
 * class.Model.php             system core
 * class.Load.php              system core
 * class.Router.php            system core
 * class.Ajax.php              system core
 */

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}



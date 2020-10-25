<?php

/**
 * REQ MED-39-3.1 -- LOGIN
 * 
 * Related:
 * 
 * file                                   type
 * recuperar_senha.controller.php         controller
 * recuperar_senha.model.php              model
 * recuperar_senha.view.php               view
 * class.Controller.php                   system core
 * class.Model.php                        system core
 * class.Load.php                         system core
 * class.Router.php                       system core
 */

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//retrieves the user's data from DB
if(isset($_POST['send'])){
    
    $the_user = $model->select($config_vars->tablePrefix."usuarios", NULL, array('email'=>$_POST['email']), "id", "LIMIT 1");
    
    if(count($the_user) == 1){
        foreach($the_user as $user){
            $data['user'] = $user;
        }              
    }else{
        $data['error'] = true;
    }
    
};
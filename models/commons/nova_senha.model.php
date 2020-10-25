<?php

/**
 * REQ MED-39-3.1 -- LOGIN
 * 
 * Related:
 * 
 * file                              type
 * nova_senha.controller.php         controller
 * nova_senha.model.php              model
 * nova_senha.view.php               view
 * class.Controller.php              system core
 * class.Model.php                   system core
 * class.Load.php                    system core
 * class.Router.php                  system core
 */

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//setup the username and login variables 
$username = explode(': ', $contents[0])[1];
$login = explode(': ', $contents[1])[1];

$the_user = $model->select($config_vars->tablePrefix."usuarios", array('cpf_cnpj'=>$login, 'nome'=>$username), "id", "LIMIT 1");

if(isset($_POST['send'])){
    if(isset($_POST['senha']) && $_POST['senha'] == $_POST['confirma_senha']){
        if(md5(sha1($_POST['senha'])) == $the_user[0]->senha){
            $data['error'] = 'samepasswords';
            unset($_POST);
        }else{
            if($model->update($config_vars->tablePrefix."usuarios", array('senha'=>md5(sha1($_POST['senha']))), $the_user[0]->id)){
                $data['success'] = true;
            }else{
                $data['error'] = 'tableerror';
                unset($_POST);
            }
        }    
    }else{
        $data['error'] = 'wrongpasswords';
        unset($_POST);
    }
}
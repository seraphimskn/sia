<?php 

/**
 * REQ MED-39-3.1 -- LOGIN
 * 
 * Related:
 * 
 * file                         type
 * login.controller.php         controller
 * login.model.php              model
 * login.view.php               view
 * class.Controller.php         system core
 * class.Model.php              system core
 * class.Load.php               system core
 * class.Router.php             system core
 */

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//REQ MED-40-3.1.1
//User authentication
if(isset($_POST['send'])){
    
    $_POST['login'] = str_replace('.', '', str_replace('-', '', str_replace('/', '', $_POST['login'])));

    $the_user = $model->select($config_vars->tablePrefix."usuarios", array(''), array('cpf_cnpj'=>$_POST['login'], 'senha'=>md5(sha1($_POST['senha']))), "id", "LIMIT 1");
    
    if(count($the_user) == 1){
        foreach($the_user as $user){
            $data['user'] = $user;
            $user_level = $model->select($config_vars->tablePrefix."niveis", array(''), array('id'=>$user->id_nivel));
            $data['userLevel'] = $user_level[0];
        }              
    }else{
        $data['error'] = true;
    }
    
};

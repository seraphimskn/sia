<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

if(isset($_POST['send'])){
    
    $the_user = $model->select($config_vars->tablePrefix."login", array('user_name'=>$_POST['user_name'], 'password'=>md5(sha1($_POST['password']))), "ID", "LIMIT 1");
    
    if(count($the_user) == 1){
        foreach($the_user as $user){
            $data['user'] = $user;
        }
        
        $model->update($config_vars->tablePrefix."login", array('last_login'=>date("Y-m-d H:i:s"), 'last_logged_IP' => $_SERVER['REMOTE_ADDR']), $data['user']->ID);
        
    }else{
        $data['error'] = true;
    }
    
};
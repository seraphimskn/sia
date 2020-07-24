<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

if(isset($_POST['send'])){
    
    $the_user = $model->select($config_vars->tablePrefix."admins", array('name'=>$_POST['user_name'], 'password'=>md5(sha1($_POST['password']))), "id", "LIMIT 1");
    
    if(count($the_user) == 1){
        foreach($the_user as $user){
            $data['user'] = $user;
        }        
    }else{
        $data['error'] = true;
    }
    
};
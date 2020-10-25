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

//initialize $data
$data = array();

$dir = 'system/temp/';

if(is_dir($dir)){
    $files = scandir($dir);
    foreach($files as $file){
        if($file != '..' && $file != '.'){
            $search = '/'.$_GET['i'].'/';
            if(preg_match($search, $file)){
                $the_file = $file;
            }
        }
    }
}

if(isset($the_file)){
    $contents = explode(PHP_EOL, file_get_contents($dir.$the_file));
}

$date_now = date('Y-m-d', time());
$request_recover = explode(' ', explode(': ', $contents[2])[1]);
$date_request =  explode('/', $request_recover[0])[2] . '-' . explode('/', $request_recover[0])[1] . '-' . explode('/', $request_recover[0])[0];

$daysDiff = floor((strtotime($date_now) - strtotime($date_request))/60/60/24);

if($daysDiff >= 3){
    $data['error'] = 'outofdate';
    rename($dir.$the_file, 'system/logs/'.explode('.',$the_file)[0].'_'.explode(': ', $contents[0])[1].'.log');
}else{
    $data['redefine'] = true;
};

//model archive inclusion
if($the_model->error == 0){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($data['success']) && $data['success'] == true){
    rename($dir.$the_file, 'system/logs/'.explode('.',$the_file)[0].'_'.explode(': ', $contents[0])[1].'.log');
}

$smarty->assign('data', $data);

unset($data['error']);
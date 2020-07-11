<?php 

foreach($_POST as $key){
    if(is_array($key)){
        foreach($_POST as $k){
            if(is_array($k)){
                foreach($k as $l){
                    if(is_array($l)){
                        foreach($l as $j){
                            $mask = '/[\?\;\'\"\<\>\{\}\$]+/';
                            if(preg_match($mask, $j)){
                                die('Acesso negado.');
                            }
                        }
                    }else{
                        $mask = '/[\?\;\'\"\s\<\>\{\}\$]+/';
                        if(preg_match($mask, $l)){
                            die('Acesso negado.');
                        }
                    }
                }
            }else{
                $mask = '/[\?\;\'\"\s\<\>\{\}\$]+/';
                if(preg_match($mask, $k)){
                    die('Acesso negado.');
                }     
            }
        }
    }else{
        $mask = '/[\?\;\'\"\s\<\>\{\}\$]+/';
        if(preg_match($mask, $key)){
            die('Acesso negado.');
        }
    }
}

extract($_POST);

foreach($params as $param => $values){
    $data[$values['name']] = $values['value'];
}

if($data['secure'] !== 'true'){
    die('Acesso negado.');
}

include_once '../../../system/core/class.Controller.php';
include_once '../../../system/core/class.Model.php';
include_once '../../../system/smarty/libs/Autoloader.php';

Smarty_Autoloader::register();
$smarty = new Smarty();
$controller = new Controller();
$model = new Model();

$smarty->setConfigDir('../../../system/defines');

$smarty->configLoad('../../../system/defines/config.conf', 'database');

$config_vars = (object)$smarty->getConfigVars();

$config_vars->ajax = true;

$config_vars->dsn = 'mysql:host=' . $config_vars->host . ';dbname=' . $config_vars->db;
$model->setConnParams($config_vars->dsn, $config_vars->dbUser, $config_vars->dbPwd);

include_once '../'.$path.'/'.$script.'.controller.php';
include_once '../../models/'.$path.'/'.$script.'.model.php';
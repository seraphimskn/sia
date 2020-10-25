<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die("Acesso negado.");
    }else{

        //includes the ajax core
        include_once '../../system/core/class.Ajax.php';
        
        $ajax = new AJAX();
        
        //var_dump($ajax);
        //includes the ajax model
        $ajax->setInclude('SYSTEM_CORE', 'Model');
        $ajax->setInclude('SYSTEM_LIB', 'config.ajax.database');

        //recover the ajax includes
        $includes = $ajax->getIncludes();

        include_once '../../'.$includes[0];

        foreach($includes as $include){  
            if(file_exists('../../'.$include)){
                include_once '../../'.$include.'';            
            }else{
                echo $include.';'.PHP_EOL;
            }
        }

        $ajax_model = new Model();
        
        $ajax_model->setConnParams($ajax_configs->dsn, $ajax_configs->dbUser, $ajax_configs->dbPwd);

        if(isset($_POST)){
            
            extract($_POST);  

            unset($_POST['send']);
            $_POST['data_cadastro'] = date('Y-m-d H:i:s');

            $_POST['valor'] = number_format($valor, 2, '.', '');
                
            $add = $ajax_model->add($ajax_configs->tablePrefix.'pontuacoes', $_POST);
             
            if($add){
                $response = $add;
            }else{
                $response = 0;
            }
            
        }else{
            $response = 0;
            
        }

        echo json_encode($response);
    }
}else{

   

}
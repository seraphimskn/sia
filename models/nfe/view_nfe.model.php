<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die("Acesso negado.");
    }else{

        $return = $_POST;

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

        unset($_POST['send']);

        $delete = $ajax_model->delete($ajax_configs->tablePrefix.'usuarios', $_POST);

        if($delete){            
            $dir = '../../uploads/users/'.$_POST['id'];
            if(is_dir($dir)){
                $pasta = dir($dir);
                while($arquivo = $pasta->read()){
                    if(($arquivo != '.') && ($arquivo != '..')){
                        unlink($dir.'/'.$arquivo);
                    }
                }
                $pasta->close();
            };
            if(is_dir($dir)){   
                if(rmdir($dir)){
                    $response = $delete;
                };
            }
        }else{
            $response = 0;
        };

        echo json_encode($response);

    }
}else{

    $nfe = $model->select($config_vars->tablePrefix.'dados_nfe');

}



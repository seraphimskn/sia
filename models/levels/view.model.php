<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

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

        $delete = $ajax_model->delete($ajax_configs->tablePrefix.'niveis', $_POST);

        if($delete){            
            $response = $delete;
        }else{
            $response = 0;
        };

        echo json_encode($response);

    }
}else{

    //retrieving user's infos from DB
    $levels = $model->select($config_vars->tablePrefix.'niveis');

}



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

        //instantiate the model object to the ajax requests
        $ajax_model = new Model();
        
        $ajax_model->setConnParams($ajax_configs->dsn, $ajax_configs->dbUser, $ajax_configs->dbPwd);

        if(isset($_POST)){
            
            extract($_POST);

            unset($_POST['send']);
           
            $_POST['valor'] = str_replace(',', '.', $_POST['valor']);
            $_POST['valor'] = number_format($_POST['valor'], 2, '.', '');
            $_POST['mensalidade'] = $_POST['valor'];
            if($_POST['ativo'] == '1'){
                $_POST['ativo'] = 1;
            }else{
                $_POST['ativo'] = 0;
            }

            $update = $ajax_model->update($ajax_configs->tablePrefix.'planos', $_POST, $id);

          
            if($update){
                $response = 1;
            }else{
                $response = 0;
            }
            
        }else{
            $response = 0;
            
        }

        echo json_encode($response);
    }
}else{

    //retrieves the user to be edited by the admin
    $plans = $model->select($config_vars->tablePrefix.'planos', NULL, array('id' => $_GET['u']));

}
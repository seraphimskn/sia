<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

/**
 * REQ MED-59-3.3.1 -- LISTAGENS - VISÃO DO ADMINISTRADOR
 * 
 * Related:
 * 
 * root_folder: users/
 * 
 * file                        type
 * view.controller.php         controller
 * view.model.php              model
 * view.view.php               view
 * class.Controller.php        system core
 * class.Model.php             system core
 * class.Load.php              system core
 * class.Router.php            system core
 */

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die("Acesso negado.");
    }elseif($_POST['secure'] && $_POST['type'] == 'busca' && $_POST['send']){

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

        $select = $ajax_model->searchLike($ajax_configs->tablePrefix.'usuarios', array('id', 'nome', 'id_nivel'), 'nome', $_POST['term']);

        echo json_encode($select);

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

    if(strtolower($_SESSION['userLevel']) == 'administrador' || strtolower($_SESSION['userLevel']) == 'super-administrador'){
        //retrieving user's infos from DB
        $users = $model->select($config_vars->tablePrefix.'usuarios');
    }elseif(strtolower($_SESSION['userLevel']) == 'vendedor'){
        $contratos = $model->select($config_vars->tablePrefix.'contratos', array('id_usuario'), array('id_vendedor' => $_SESSION['userID']));
        foreach($contratos as $contrato => $item){
            $users[] = $model->select($config_vars->tablePrefix.'usuarios', null, array('id'=>$item->id_usuario));
        }
    }
}




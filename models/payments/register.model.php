<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die('Acesso negado!');
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

        extract($_POST);
        unset($_POST);

        $params = array(
                        'data_pagamento' => date('Y-m-d'),
                        'tipo_pagamento' => $tipo_pagamento
                    );
        

        $update = $ajax_model->update($ajax_configs->tablePrefix.'pagamentos', $params, $id);

        if($update){
            $return = 1;
        }else{
            $return = 0;
        }

        echo $return;

    }
}else{

    $dados = $model->select($config_vars->tablePrefix.'pagamentos', null, array('id' => $_GET['u']))[0];

}

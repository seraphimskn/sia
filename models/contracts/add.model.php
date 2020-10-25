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

        if($_POST['contract_type'] == 'new'){

            $params = array(
                            'id_usuario' => 01, 
                            'id_vendedor' => 01,
                            'data_venda' => date('Y-m-d'),
                            'data_cobranca' => 00,
                            'data_vencimento' => date('Y-m-d'),
                            'ativo' => 0,
                            'link' => '-',
                            'observacao' => null);

            $add = $ajax_model->add($ajax_configs->tablePrefix.'contratos', $params);

            if($add == 1){
                echo json_encode(array('msg' => 'Foi gerado um novo contrato para ser preenchido.'));
            }else{
                echo json_encode(array('msg' => 'Erro: '. $add));
            }

        }elseif($_POST['contract_type'] == 'old'){

            extract($_POST);

            $params = array(
                'id' => $id,
                'id_usuario' => 01,
                'id_vendedor' => 01,
                'data_venda' => $data_venda,
                'data_vencimento' => $data_vencimento,
                'data_cobranca' => '-',
                'ativo' => 0,
                'link' => '-',
                'observacao' => null
            );
            
            $add = $ajax_model->add($ajax_configs->tablePrefix.'contratos', $params);

            if($add == 1){
                echo json_encode(array('msg' => 'Dados principais do contrato antigo criado. Vá para a tela de usuários e crie um beneficiário para este contrato!'));
            }else{
                echo json_encode(array('msg' => 'Erro: '. $add));
            }

        };

    }
        
}else{

   

}
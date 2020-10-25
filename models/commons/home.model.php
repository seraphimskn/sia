<?php 

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    if($_POST['secure'] && $_POST['cpf']){

        include_once $_SERVER['DOCUMENT_ROOT'].'/medv01/system/core/class.Ajax.php';

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

        $cpf = str_replace('-', '', str_replace('.', '', $_POST['cpf']));

        $user = $ajax_model->select($ajax_configs->tablePrefix.'usuarios', array('id', 'imagem', 'nome', 'ativo'), array('cpf_cnpj' => $cpf, 'id_nivel' => 3));

        if(count($user) > 0){
            echo json_encode($user);
        }else{
            echo json_encode(array('error' => 'Usuário não encontrado, revise as informações e tente novamente.'));
        }
    }elseif($_POST['send'] && $_POST['id_parceiro']){
        
        include_once $_SERVER['DOCUMENT_ROOT'].'/medv01/system/core/class.Ajax.php';
    
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

        unset($_POST['secure']);

        extract($_POST);

        if($_POST['confirmar']){
            $original_value = number_format($valor, 2, '.', '');
            $discounted_value = $original_value - (($original_value * $desconto) / 100);

            echo json_encode(array( 'valor_compra' => number_format($valor, 2, ',', '.'), 
                                    'desconto' => number_format($discounted_value, 2, ',', '.')));
        }elseif($_POST['gravar']){

            $valor_desconto = str_replace(',', '.', str_replace('.', '', $valor_desconto));

            $params = array(
                'id_usuario' => $id_usuario,
                'id_parceiro' => $id_parceiro,
                'nota' => $nota,
                'valor' => number_format($valor_desconto, 2, '.', ''),
                'data_compra' => date('Y-m-d H:i:s')
            );

            $add = $ajax_model->add($ajax_configs->tablePrefix.'compras', $params);

            if($add){

                $pontos_parceiro = $ajax_model->select($ajax_configs->tablePrefix.'pontuacoes', array('valor', 'pontos'), array('id_parceiro' => $id_parceiro));
                $pontos_usuario = $ajax_model->select($ajax_configs->tablePrefix.'fidelidade', array('pontos'), array('id_usuario' => $id_usuario));
 
                if(count($pontos_usuario) == 0){
                    $pontos_usuario = 0;
                }else{
                    $pontos_usuario = $pontos_usuario[0]->pontos;
                }

                if(count($pontos_parceiro) == 0){
                    $pontos_parceiro = 0;
                    $ponto = 0;
                }else{
                    $pontos_parceiro = $pontos_parceiro[0];
                    $ponto = (float)$pontos_parceiro->pontos / (float)$pontos_parceiro->valor;
                }
                
                $pontos_acrescentados = $ponto * $valor_desconto;

                $pontos_atuais = $pontos_usuario + $pontos_acrescentados;

                if($pontos_usuario == 0){

                    $params = array('id_usuario' => $id_usuario, 'pontos' => $pontos_atuais, 'ultima_atualizacao' => date('Y-m-d H:i:s'));

                    $fidelidade = $ajax_model->add($ajax_configs->tablePrefix.'fidelidade', $params);
                
                }else{

                    $params = array('pontos' => $pontos_atuais, 'ultima_atualizacao' => date('Y-m-d H:i:s'));

                    $id_fidelidade = $ajax_model->select($ajax_configs->tablePrefix.'fidelidade', array('id'), array('id_usuario' => $id_usuario))[0];

                    $fidelidade = $ajax_model->update($ajax_configs->tablePrefix.'fidelidade', $params, $id_fidelidade->id);
                }

                if($fidelidade){   
                    echo json_encode(array('pontos' => (int)$pontos_acrescentados, 'success' => $fidelidade));
                }else{
                    echo json_encode(array('erro' => $fidelidade));
                }
            }else{
                echo json_encode(array('erro' => $add));
            }
            
        }
        
    }else{   
        die("Acesso negado.");
    }
}

if(strtolower($_SESSION['userLevel']) == 'super-administrador' || strtolower($_SESSION['userLevel']) == 'administrador'){
    
    /**
     * REQ MED-33-3.2.1 -- DASHBOARD - VISÃO DO ADMINISTRADOR
     * 
     * Related:
     * 
     * file                        type
     * home.controller.php         controller
     * home.model.php              model
     * home.view.php               view
     * class.Controller.php        system core
     * class.Model.php             system core
     * class.Load.php              system core
     * class.Router.php            system core
     */

    //retrieving users info from DB
    $users = $model->select($config_vars->tablePrefix.'usuarios', array(''), array('ativo' => 1), 'data_cadastro', 'desc LIMIT 30');

    //retrieving buying info from DB
    $compras = $model->select($config_vars->tablePrefix.'compras', array('SUM(`valor`) as total'));

    //retrieving total money spent by users from DB
    $total_usuarios = $model->select($config_vars->tablePrefix.'compras', array('valor', 'id_usuario'), null, 'id_usuario');

    //formating the money spent object
    foreach($total_usuarios as $usuarios){
        $nome_usuario = $model->select($config_vars->tablePrefix.'usuarios', array('nome'), array('id' => $usuarios->id_usuario));
        $usuario[$usuarios->id_usuario]['nome'][] = $nome_usuario[0]->nome;
        $usuario[$usuarios->id_usuario]['valor'][] = $usuarios->valor;        
    }
    $usuario = (object)$usuario;
    
    //get the user level to view on the home dashboard
    $level_logged = $model->select($config_vars->tablePrefix.'usuarios');
    
}elseif(strtolower($_SESSION['userLevel']) == 'beneficiario'){  

    $fidelidade = $model->select($config_vars->tablePrefix.'fidelidade', null, array('id_usuario' => $_SESSION['userID']));

    $data_pagamento = $model->select($config_vars->tablePrefix.'vw_payments', null, array('id_usuario' => $_SESSION['userID']), 'id_usuario');

    $compras = $model->select($config_vars->tablePrefix.'vw_compras', null, array('id_usuario' => $_SESSION['userID']), 'id_usuario');


}
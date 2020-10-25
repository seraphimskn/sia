<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

/**
 * REQ MED-76-3.6.1.2 -- CADASTROS - NÍVEIS DE USUÁRIOS
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

        $ajax_model = new Model();
        
        $ajax_model->setConnParams($ajax_configs->dsn, $ajax_configs->dbUser, $ajax_configs->dbPwd);

        if(isset($_POST['ativo'])){
            
            extract($_POST); 
            
            $permissoes = array();

            if(isset($all)){
                $permissoes = 'all';
            }else{
                $permissoes['meu_perfil'] = array('editar', 'visualizar');
                if(isset($usuarios)){
                    $permissoes['usuarios'] = $usuarios;
                    unset($_POST['usuarios']);
                };
                if(isset($niveis)){
                    $permissoes['niveis'] = $niveis;
                    unset($_POST['niveis']);
                };
                if(isset($relatorios)){
                    $permissoes['relatorios'] = $relatorios;
                    unset($_POST['relatorios']);
                };
                if(isset($boletos)){
                    $permissoes['boletos'] = array('visualizar', 'solicitar');
                    unset($_POST['boletos']);
                };
                if(isset($contrato)){
                    $permissoes['contrato'] = array('visualizar');
                    unset($_POST['contrato']);
                };
                if(isset($mailing)){
                    $permissoes['mailing'] = $mailing;
                    unset($_POST['mailing']);
                };
                if(isset($produtos)){
                    $permissoes['produtos'] = $produtos;
                    unset($_POST['produtos']);
                };
                if(isset($nfe)){
                    $permissoes['nfe'] = array('visualizar');
                    unset($_POST['produtos']);
                };
                if(isset($fidelidade)){
                    $permissoes['fidelidade'] = $fidelidade;
                    unset($_POST['fidelidade']);
                };
                if(isset($segunda_via)){
                    $permissoes['segunda_via'] = array('visualizar');
                    unset($_POST['segunda_via']);
                };

            };

            if($ativo != 1){
                $ativo = 0;
            }else{
                $ativo = 1;
            }

            $form = array('nome'=> $nome, 'permissoes' => json_encode($permissoes), 'descricao' => '', 'alteracao' => '', 'ip' => $_SERVER['REMOTE_ADDR'], 'ativo' => $ativo);

            unset($_POST['send']);
            
            $add = $ajax_model->add($config_vars->tablePrefix.'niveis', $form);

            if($add){
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

    $levels = $model->select($config_vars->tablePrefix.'niveis', array('*'), array('ativo' => 1));

}
<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

/**
 * REQ MED-57-3.8.1 -- EDIÇÃO DE PERFIS - EDIÇÃO DE DADOS DE USUÁRIOS
 * 
 * Related:
 * 
 * root_folder: users/
 * 
 * file                         type
 * edit.controller.php          controller
 * edit.model.php               model
 * edit.view.php                view
 * class.Controller.php         system core
 * class.Model.php              system core
 * class.Load.php               system core
 * class.Router.php             system core
 * class.Ajax.php               system core
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

            $_POST['data_nascimento'] = date('Y-m-d', strtotime($_POST['data_nascimento']));
           
            if(isset($_FILES['imagem'])){
                $dir = '../../uploads/users/'.$id;
                if(isset($_FILES['imagem']) && $_FILES['imagem']['type'] != 'image/jpeg'){
                    $response = array('msg' => 'Arquivo Inválido! Selecione um tipo de arquivo válido', 'response' => 0);
                }else{
                    $name = str_replace(' ', '_', $_FILES['imagem']['name']);
                    $imagem = $name;
                    if(!is_dir($dir)){
                        if(mkdir($dir, 0777, true)){
                            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.'/'.$name)){
                                $imagem = $dir.'/'.$name;
                                
                            };                            
                        }
                    }elseif(!file_exists($dir.'/'.$name)){
                        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.'/'.$name)){
                            $imagem = $dir.'/'.$name;
                            
                        };
                    }else{
                        $name = explode('.', $name);
                        $name[0] = sha1($name[0]).'-'.md5(rand(0, strlen($name[0])));
                        $name = implode('.', $name);
                        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.'/'.$name)){
                            $imagem = $dir.'/'.$name;
                            
                        };
                    }                    
                }
                
                $_POST['imagem'] = str_replace('../../', '', $imagem);
                foreach($_POST as $key=>$value){                   
                    if(empty($value) || is_null($value) || $value == ''){
                        unset($_POST[$key]);
                    }
                    if(!isset($_POST['ativo'])){
                        $_POST['ativo'] = 0;
                    }
                }

                unset($_POST['send']);
                $_POST['id_nivel'] = $_POST['nivel'];
                unset($_POST['nivel']);
                $_POST['data_nascimento'] = date('Y-m-d', strtotime($_POST['data_nascimento']));
                $_POST['cpf_cnpj'] = str_replace('.', '', str_replace('-', '', str_replace('/', '', $_POST['cpf_cnpj'])));
                $_POST['endereco'] = $_POST['endereco'] . ' / ' . $_POST['bairro'] . ' / ' . $_POST['cep'];
                unset($_POST['bairro']);
                unset($_POST['cep']);

                $update = $ajax_model->update($ajax_configs->tablePrefix.'usuarios', $_POST, $id);
                
                if($update){
                    $response = $update;
                }

            }else{

                foreach($_POST as $key=>$value){                   
                    if(empty($value) || is_null($value) || $value == ''){
                        unset($_POST[$key]);
                    }
                    if(!isset($_POST['ativo'])){
                        $_POST['ativo'] = 0;
                    }
                }

                unset($_POST['send']);
                $_POST['id_nivel'] = $_POST['nivel'];
                unset($_POST['nivel']);
                $_POST['data_nascimento'] = date('Y-m-d', strtotime($_POST['data_nascimento']));
                $_POST['cpf_cnpj'] = str_replace('.', '', str_replace('-', '', str_replace('/', '', $_POST['cpf_cnpj'])));
                $_POST['endereco'] = $_POST['endereco'] . ' / ' . $_POST['bairro'] . ' / ' . $_POST['cep'];
                unset($_POST['bairro']);
                unset($_POST['cep']);
                
                $update = $ajax_model->update($ajax_configs->tablePrefix.'usuarios', $_POST, $id);
                
                if($update){
                    $response = $update;
                }else{
                    $response = 0;
                }
            };           

        }else{
            $response = 0;
            
        }

        echo json_encode($response);
    }
}else{

    //retrieves the user to be edited by the admin
    $user = $model->select($config_vars->tablePrefix.'usuarios', array('*'), array('id' => $_GET['u']));
    $levels = $model->select($config_vars->tablePrefix.'niveis', array('*'), array('ativo' => 1));
    $plans = $model->select($config_vars->tablePrefix.'planos', array('*'), array('ativo'=>1));

    $user_contract = $model->select($config_vars->tablePrefix.'contratos', null, array('id_usuario' => $_GET['u']));

    if(isset($user)){
        $nivel = $model->select($config_vars->tablePrefix.'niveis', array('nome'), array('id' => $user[0]->id_nivel));
        $user[0]->nivel = $nivel[0]->nome;    
    }
}
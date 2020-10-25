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
           
            if(isset($_FILES['imagem'])){
                $dir = '../../uploads/produtos/'.$id;
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
                
                $update = $ajax_model->update($ajax_configs->tablePrefix.'produtos', $_POST, $id);
                
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
                
                $update = $ajax_model->update($ajax_configs->tablePrefix.'produtos', $_POST, $id);

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

    $products = $model->select($config_vars->tablePrefix.'produtos', array('*'), array('id' => $_GET['u']));

}
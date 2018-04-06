<?php

class Install{
    
    private $data = array();
    private $error;
    
    function __construct(){
        
    }
    
    function setData($params){
        $this->data = $params;
    }
    
    function createConfigFile(){
       
        $file = fopen($_SERVER['DOCUMENT_ROOT'].'/controle/config.init', 'w+');
        
        foreach ($this->data as $key=>$value){
            
            if(fwrite($file, ''.$key.': '.$value.';')){
                $this->message = true;
            }else{
                $this->message = false;
            }
            
        }
        
        fclose($file);
    }
    
    
    function addConfigs(){
        
        $file = fopen($_SERVER['DOCUMENT_ROOT'].'/controle/config.init', 'a+');
        
        foreach ($this->data as $key=>$value){
            
            if(fwrite($file, ''.$key.': '.$value.';')){
                $this->message = true;
            }else{
                $this->message = false;
            }
            
        }
        
        fclose($file);
        
    }
    
    function getConfigs(){
        
        $configs = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/controle/config.init');
        $configs = explode(';', $configs);
        
        foreach($configs as $config){
            if($config != ""){
                $items[] = explode(': ', $config);
            }
        }
        
        foreach($items as $item){
            $data[$item[0]] = $item[1];
        }
        
        return $data;
    }
    
    function applyTablePrefix($table_prefix){
        
        $file = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/controle/install/db.sql'); 
        $file = str_replace('#___', $table_prefix, $file);
        $file = explode(';', $file);
        return $file;
  
    }
    
    function setPDO($dsn, $user, $pwd){
        
        $dbConn = new PDO($dsn, $user, $pwd);
        
        return $dbConn;
        
    }
    
    function uploadLogo($file){
        
        $imageDir = '../uploads';
        
        $validExt = array('jpg', 'jpeg', 'png', 'bmp');
        $filetype = explode("/", $file['type']);
        
        foreach ($validExt as $fileCheck => $type):
            if(!in_array($type, $validExt))
                die('This is not a valid file, please try again!');
        endforeach;
            
        $file['name'] = preg_replace('/[\s\^\´\`\<\>\~\?\!\@\ç\ã\õ\á\é\í\ó\ú\à\è\ì\ò\ù\â\ê\î\ô\û\ä\ë\ï\ö\ü\%\$\#\*\&\¨]/', '-', $file['name']);
        
        if(!is_dir($imageDir)){
            if(mkdir($imageDir, '0777')){
                if(file_exists($imageDir.'/'.$file['name'])){
                    $file['name'] = $file['name'].'-('.sha1($file['name']).').'.$filetype[1];
                    if(move_uploaded_file($file['tmp_name'], $imageDir.'/'.$file['name'])){
                        $ext = $imageDir.'/'.$file['name'];
                        $return = true;
                    }else{
                        $return = false;
                        $ext = 'Não foi possível subir a imagem. Erro: '.$file['error'];
                    }
                }else{
                    if(move_uploaded_file($file['tmp_name'], $imageDir.'/'.$file['name'])){
                        $ext = $imageDir.'/'.$file['name'].'.'.$filetype[1];
                        $return = true;
                    }else{
                        $return = false;
                        $ext = 'Não foi possível subir a imagem. Erro: '.$file['error'];
                    }
                }
            }else{
                $return = false;
                $ext = 'Não foi possível criar a pasta de arquivos.';
            }
        }else{
            if(file_exists($imageDir.'/'.$file['name'])){
                $file['name'] = $file['name'].'-('.sha1($file['name']).').'.$filetype[1];
                if(move_uploaded_file($file['tmp_name'], $imageDir.'/'.$file['name'])){
                    $ext = $imageDir.'/'.$file['name'];
                    $return = true;
                }else{
                    $return = false;
                    $ext = 'Não foi possível subir a imagem. Erro: '.$file['error'];
                }
            }else{
                if(move_uploaded_file($file['tmp_name'], $imageDir.'/'.$file['name'])){
                    $ext = $imageDir.'/'.$file['name'];
                    $return = true;
                }else{
                    $return = false;
                    $ext = 'Não foi possível subir a imagem. Erro: '.$file['error'];
                }
            }
        }
        return array('filepath'=>$ext, 'return'=>$return);
    }
    
}


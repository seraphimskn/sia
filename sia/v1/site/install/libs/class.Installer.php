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
       
        $file = fopen('../system/defines/config.conf', 'w+');
        
        if($_POST['step'] == 'dbConfigs'){
            if(fwrite($file, '[database]'.PHP_EOL)){
                $this->message = true;
            }else{
                $this->message = false;
            }
        }
        
        foreach ($this->data as $key=>$value){
            
            if(fwrite($file, ''.$key.'='.$value.PHP_EOL)){
                $this->message = true;
            }else{
                $this->message = false;
            }
            
        }
        
        fclose($file);
    }
    
    
    function addConfigs(){
        
        $file = fopen('../system/defines/config.conf', 'a+');
        
        if($_POST['step'] == 'admConfigs'){
            if(fwrite($file, '[constants]'.PHP_EOL)){
                if(fwrite($file, 'images_path = assets/imgs'.PHP_EOL)){
                    if(fwrite($file, 'system_path = system'.PHP_EOL)){
                        if(fwrite($file, 'styles_path = assets/css'.PHP_EOL)){
                            if(fwrite($file, 'scripts_path = assets/js'.PHP_EOL)){
                                if(fwrite($file, '[others]'.PHP_EOL)){
                                    $this->message = true;
                                }
                            }
                        }
                    }
                }
            }else{
                $this->message = false;
            }
        }
        
        foreach ($this->data as $key=>$value){
            
            if(fwrite($file, ''.$key.'='.$value.PHP_EOL)){
                $this->message = true;
            }else{
                $this->message = false;
            }
            
        }
        
        fclose($file);
        
    }
    
    function getConfigs(){
        
        $configs = file_get_contents('../system/defines/config.conf');
        $configs = explode(PHP_EOL, $configs);
        
        foreach($configs as $config){
            if(strstr($config, '=')){
                $items[] = explode('=', $config);
            }else{
                unset($config);
            }
        }
        
        foreach($items as $item){
                $param[$item[0]] = $item[1];
        }
        
        return $param;
    }
    
    function applyTablePrefix($table_prefix){
        
        $file = file_get_contents('db.sql'); 
        $file = str_replace('#___', $table_prefix, $file);
        $file = explode(';', $file);
        return $file;
  
    }
    
    function setPDO($dsn, $user, $pwd){
        
        try{
            $dbConn = new PDO($dsn, $user, $pwd);
        }catch(Exception $e){
            echo '<pre>';
            var_dump($e);
            echo '</pre>';
        }
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
        
        try{
            
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
   
        }catch(Exception $e){
            
            echo '<pre>';
            var_dump($e);
            echo '</pre>';
            
        }
    
    }

}
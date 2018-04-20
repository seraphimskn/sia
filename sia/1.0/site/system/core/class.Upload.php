<?php

class Upload{

    function __construct(){
        
    }    
    
    function uploadFile($file, $dir)
    {
        $imageDir = $dir;
     
        extract($file);
        
        $validExt = array(
            'jpg',
            'jpeg',
            'png',
            'bmp'
        );
        
        $filetype = explode("/", $type);
        
        if(!in_array($filetype[1], $validExt)){
            die('Arquivo inválido.');
        }
        
        $name = preg_replace('/[\s\^\´\`\<\>\~\?\!\@\ç\ã\õ\á\é\í\ó\ú\à\è\ì\ò\ù\â\ê\î\ô\û\ä\ë\ï\ö\ü\%\$\#\*\&\¨]/', '-', $name);
        
        try {
            
            if (!is_dir($imageDir)) {
                if (mkdir($imageDir, '0777')) {
                    if (file_exists($imageDir . '/' . $name)) {
                        $name = $name . '-(' . sha1($name) . ').' . $filetype[1];
                        if (move_uploaded_file($tmp_name, $imageDir . '/' . $name)) {
                            $ext = $imageDir . '/' . $name;
                            $return = true;
                        } else {
                            $return = false;
                            $ext = 'Não foi possível subir a imagem. Erro: ' . $error;
                        }
                    } else {
                        if (move_uploaded_file($tmp_name, $imageDir . '/' . $name)) {
                            $ext = $imageDir . '/' . $name . '.' . $filetype[1];
                            $return = true;
                        } else {
                            $return = false;
                            $ext = 'Não foi possível subir a imagem. Erro: ' . $error;
                        }
                    }
                } else {
                    $return = false;
                    $ext = 'Não foi possível criar a pasta de arquivos.';
                }
            } else {
                if (file_exists($imageDir . '/' . $name)) {
                    $name = $name . '-(' . sha1($name) . ').' . $filetype[1];
                    if (move_uploaded_file($tmp_name, $imageDir . '/' . $name)) {
                        $ext = $imageDir . '/' . $name;
                        $return = true;
                    } else {
                        $return = false;
                        $ext = 'Não foi possível subir a imagem. Erro: ' . $error;
                    }
                } else {
                    if (move_uploaded_file($tmp_name, $imageDir . '/' . $name)) {
                        $ext = $imageDir . '/' . $name;
                        $return = true;
                    } else {
                        $return = false;
                        $ext = 'Não foi possível subir a imagem. Erro: ' . $error;
                    }
                }
            }
            return array(
                'filepath' => $ext,
                'return' => $return
            );
        } catch (Exception $e) {
            
            echo '<pre>';
            var_dump($e);
            echo '</pre>';
        }
    }
    
}
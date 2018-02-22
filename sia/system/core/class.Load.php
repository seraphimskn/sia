<?php

/*
 * General Load Class
 */

class Load{
    
    private $scripts     = array();
    private $styles      = array();
    private $libs        = array();
    
    function setScript($path, $script){
        
        if(is_dir($path) && file_exists($path.'/'.$script.'.js')){
            $this->scripts[] = '<script src="'.$path.'/'.$script.'.js" language="javascript"></script>';
        }else{
            return false;
        }
        
    }
    
    function setStyle($path, $style){
        
        if(is_dir($path) && file_exists('./'.$path.'/'.$style.'.css')){
            $this->styles[] = '<link href="./'.$path.'/'.$style.'.css" rel="stylesheet" type="text/css" />';
        }else{
            return false;
        }
        
    }
    
    function setLibs($path, $lib){
        
        if(is_dir($path) && file_exists($path.'/'.$lib.'.php')){
            $this->libs[] = $path.'/'.$lib.'.php';
        }else{
            return false;
        }
        
    }
    
    function getScripts() {
        
      $scripts = ""; 
        
        if(isset($this->scripts) && count($this->scripts >= 1)){
            foreach($this->scripts as $script=>$link){
               $scripts .= $link;
               $error    = false;
            }
        }else{
            $scripts = false;
            $error = true;
        }
        
        return array("scripts" => $scripts, "error" => $error);
    
    }
    
    function getStyles() {
        
        $styles = "";
        
        if(isset($this->styles) && count($this->styles >= 1)){
            foreach($this->styles as $style=>$href){
                $styles  .= $href;
                $error    = false;
            }
        }else{
            $styles = false;
            $error = true;
        }
        
        return array("styles" => $styles, "error" => $error);
        
    }
    
    function getLibs() {
        
        $libs = "";
        
        if(isset($this->libs) && count($this->libs >= 1)){
            foreach($this->libs as $lib=>$path){
                $libs    .= $path;
                $error    = false;
            }
        }else{
            $styles = false;
            $error = true;
        }
        
        return array("libs" => $libs, "error" => $error);
        
    }
    
}
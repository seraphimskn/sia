<?php

/*
 * General Controller Class
 */

class Controller{
    
    private $controller;
    private $error;
    
    function __construct(){
        
    }
    
    private function setController($controller){
        
        if(file_exists("controllers/" . $controller . ".controller.php")){
            
            $this->controller = "controllers/" . $controller . ".controller.php";
            
        }else{
            
            $this->controller = null;
            $this->error = true;           
        }
        
    }
    
    function getController($controller){
        
        self::setController($controller);
        
        return array('error' => $this->error, 'controller' => $this->controller);
        
    }   

}
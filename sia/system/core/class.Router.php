<?php

class Router{
    
    private $url;
    private $actions;
    
    public function __construct($url){
        
        $this->url = $url;
        
    }
    
    private function secURL(){
        
        $this->url = preg_replace('/[\s]+/', '_', $this->url );
        
        return $this->url;
        
    }
    
    private function setActions(){
        
        $central = self::secURL();
        
        if(isset($central)){
            
            foreach ($central as $key){
                
                if(preg_match('/(\/+)/', $key)){
                    
                    $this->actions = explode('/', $key);
                    
                }else{
                    
                    $this->actions = $key;
                    
                }
                
            }
            
        }
        
    }
    
    public function getActions(){
        
        self::setActions();
        
        if(is_array($this->actions)){
            
            foreach ($this->actions as $action=>$value){
                
                $this->actions[$action] = $value;
            }
            
            return $this->actions;
            
        }else{
            
            return $this->actions;
            
        }
        
    }
    
}

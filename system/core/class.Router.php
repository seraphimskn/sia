<?php

/**
 * General Router Class
 */

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
            foreach($central as $key => $value){
                if(!preg_match('/[\/]+/', $value)){
                    $params[] = $value;
                }else{
                    $value = explode('/', $value);
                    $params[] = $value;
                }
            }
            if(isset($params)){
                $this->actions = $params;
            }
        }else{
            $this->actions = null;
        }
        
        
    }
    
    public function getActions(){
        
        self::setActions();
        
        return $this->actions;
    }
    
}

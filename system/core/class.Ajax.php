<?php

/**
 * 
 * General AJAX Class
 * 
 */

 class AJAX{

    //constants
    const SYSTEM_CORE = 'system/core';
    const SYSTEM_LIB = 'system/libs';
    const MODEL = '';
    const CONTROLLER = ''; 
    const VIEWER = '';
    
    //attributes
    private $includes = array();
    
    public function __construct(){
        return;
    }

    public function setInclude($type, $include = null, $folder = null){

        if($type == 'SYSTEM_CORE'){
            $this->includes[] = self::SYSTEM_CORE . '/class.' .$include. '.php';
        }elseif($type == 'SYSTEM_LIB'){
            if(!is_null($folder)){ 
                $this->includes[] = self::SYSTEM_LIB . '/' .$folder. '/' .$include.'.php';
            }else{
                $this->includes[] = self::SYSTEM_LIB . '/' .$include.'.php';
            }
        }else{
            if(isset($folder)){
                $this->includes[] = $folder . '/' . $include . '.php';
            }else{
                $this->includes[] = $include . '.php';
            }
        }

    }

    public function getIncludes(){

        $the_include = array();

        if(isset($this->includes)){
            foreach($this->includes as $include){
                $the_include[] = $include;
            }
        }

        return $the_include;
    }

 }
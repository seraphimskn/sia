<?php 

class Modules{
    
    function __construct(){
        
    }
    
    function getModule($module, $id){
        
        $the_module_tpl = 'modules/'.$module.'.tpl';
        
        if(file_exists('views/'.$the_module_tpl)){
            
            $the_module_controller = $this->getModulesController($module);
            $the_module_model = $this->getModulesModel($module);
            
            return (object)array('module_path' => $the_module_tpl, 'module_id' => $id, 'controller' => $the_module_controller, 'model' => $the_module_model, 'error' => false);
        }else{
            $error = new ErrorException();
            return (object)array('error' => true, 'msg'=> $error.PHP_EOL);
        }
        
    }
    
    private function getModulesController($module){
        
        if(file_exists("controllers/modules/" . $module . ".controller.php")){
            
            $controller = "controllers/modules/" . $module . ".controller.php";
            $error = false;
            
        }else{
            
            $controller = null;
            $error = new ErrorException();
        }
        
        return (object)array('controller' => $controller, 'error' => $error);
        
    }
    
    private function getModulesModel($module){
        
        if(file_exists("models/modules/" . $module . ".model.php")){
            
            $model = "models/modules/" . $module . ".model.php";
            $error = false;
    
        }else{
            
            $model = null;
            $error = new ErrorException();
        }
        
        return (object)array('model' => $model, 'error' => $error);
        
    }
    
}
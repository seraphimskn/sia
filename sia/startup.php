<?php

$router     = new Router($_GET);     //setup the Router() object
$load       = new Load();            //setup the Load() object
$controller = new Controller();      //setup the Controller() object
$model      = new Model();           //setup the Model() object
Smarty_Autoloader::register();       //starts the Smarty compiler
$smarty     = new Smarty();          //setup the Smarty() object
$mail       = new PHPMailer;         //setup the mailer object

//if isn't on the developing ambience, set to false 
$smarty->debugging = false;

//set the cache off for developing
$smarty->caching = false;

//sets the Config directory
$smarty->setConfigDir('system/defines');

//load the Database Connection Config Sections
$smarty->configLoad('system/defines/config.conf', 'database'); #database

//load the Constants definitions
$smarty->configLoad('system/defines/config.conf', 'constants'); #constants

//set the config vars to a callable var
$config_vars = (object)$smarty->getConfigVars();

//set the initial scripts
$load->setScript($config_vars->scripts_path, 'jquery-3.3.1.min');
$load->setScript($config_vars->scripts_path, 'jquery-ui.min');
$load->setScript($config_vars->scripts_path, 'owl.carousel');
$load->setScript($config_vars->scripts_path.'/bootstrap', 'bootstrap.bundle.min');
$load->setScript($config_vars->scripts_path.'/bootstrap', 'bootstrap.min');
$load->setScript($config_vars->scripts_path, 'main');

//assign the loaded scripts to the object
$scripts = (object)$load->getScripts();

//set the initial styles
$load->setStyle($config_vars->styles_path.'/bootstrap', 'bootstrap');
$load->setStyle($config_vars->styles_path.'/jquery-ui', 'jquery-ui');
$load->setStyle($config_vars->styles_path.'/jquery-ui', 'jquery-ui.structure');
$load->setStyle($config_vars->styles_path, 'font-awesome');
$load->setStyle($config_vars->styles_path, 'owl.carousel');
$load->setStyle($config_vars->styles_path, 'owl.theme');
$load->setStyle($config_vars->styles_path, 'main');

//assign the loaded styles to the object
$styles = (object)$load->getStyles();

//load the model connection
$config_vars->dsn = 'mysql:host=' . $config_vars->host . ';dbname=' . $config_vars->db;
$model->setConnParams($config_vars->dsn, $config_vars->dbUser, $config_vars->dbPwd);

//set the template dir
$smarty->setTemplateDir(array('default' => 'views/templates'));

//load the template viewing and controllers
//header viewing and controller
$header = $smarty->getTemplateDir('default').'commons/header.tpl';
$common_controller = (object)$controller->getController('commons/common');

$footer = $smarty->getTemplateDir('default').'commons/footer.tpl';

//the main content changer
//setting the router to lookup the folders
if($router->getActions() === null){
    
    //set the default front-page
    $body = $smarty->getTemplateDir('default').'commons/home_page.tpl';
    $body_controller = (object)$controller->getController('commons/home_page');
    
}else{
    
    //checks if there is more than one statement passing on the URI
    if(!is_array($router->getActions())){
        
        //if have only one statement, redirect to the current view 
        if(is_file($smarty->getTemplateDir('default').'commons/'.$router->getActions().'.tpl')){
            
            $body = $smarty->getTemplateDir('default').'commons/'.$router->getActions().'.tpl';
            $body_controller = (object)$controller->getController('commons/'.$router->getActions());
            
        }elseif(is_file($smarty->getTemplateDir('default').'content/'.$router->getActions().'.tpl')){
            
            $body = $smarty->getTemplateDir('default').'content/'.$router->getActions().'.tpl';
            $body_controller = (object)$controller->getController('content/'.$router->getActions());
            
        }elseif(is_file($smarty->getTemplateDir('default').'staff/'.$router->getActions().'.tpl')){
            
            $body = $smarty->getTemplateDir('default').'staff/'.$router->getActions().'.tpl';
            $body_controller = (object)$controller->getController('staff/'.$router->getActions());
            
        }else{
            
            //the 404 error handler
            $body = $smarty->getTemplateDir('default').'commons/404.tpl';
            $body_controller = (object)$controller->getController('commons/404.tpl');
            
        }
            
    }else{
        
        
       //checks if have more than one statement on the URI and treat it 
       foreach($router->getActions() as $action){
           
           if(is_file($smarty->getTemplateDir('default').'commons/'.$action.'.tpl')){
            
               $body = $smarty->getTemplateDir('default').'commons/'.$action.'.tpl';
               $body_controller = (object)$controller->getController('commons/'.$action);
            
                break;   
               
           }elseif(is_file($smarty->getTemplateDir('default').'content/'.$action.'.tpl')){
                   
               $body = $smarty->getTemplateDir('default').'content/'.$action.'.tpl';
               $body_controller = (object)$controller->getController('content/'.$action);
               
                break;
               
           }elseif(is_file($smarty->getTemplateDir('default').'staff/'.$action.'.tpl')){
               
               $body = $smarty->getTemplateDir('default').'staff/'.$action.'.tpl';
               $body_controller = (object)$controller->getController('staff/'.$action);
               
               break;
           
           }else{
            
               //the 404 error handler
               $body = $smarty->getTemplateDir('default').'commons/404.tpl';
               $body_controller = (object)$controller->getController('commons/404.tpl');
               
           }
           
       }
        
    }
    
}

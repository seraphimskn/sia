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
    
    if( null !== $router->getActions()){
    
        $actions = $router->getActions();
        
        if(count($actions) <= 1){
            foreach($actions as $action){
                switch ($action){
                    case 'bandnews_fm':
                        $body = $smarty->getTemplateDir('default').'commons/about-us.tpl';
                        $body_controller = (object)$controller->getController('commons/about-us');
                        break;
                    case 'apresentadores':
                        $body = $smarty->getTemplateDir('default').'staff/staff.tpl';
                        $body_controller = (object)$controller->getController('staff/staff');
                        break;
                    case 'programacao':
                        $body = $smarty->getTemplateDir('default').'commons/programs.tpl';
                        $body_controller = (object)$controller->getController('commons/programs');
                        break;
                    case 'noticias':
                        $body = $smarty->getTemplateDir('default').'content/articles.tpl';
                        $body_controller = (object)$controller->getController('content/articles');
                        break;
                    case 'media_kit':
                        $body = $smarty->getTemplateDir('default').'commons/media_kit.tpl';
                        $body_controller = (object)$controller->getController('commons/media_kit');
                        break;
                    case 'fale_conosco':
                        $body = $smarty->getTemplateDir('default').'commons/contact.tpl';
                        $body_controller = (object)$controller->getController('commons/contact');
                        break;
                    case 'home_page':
                        $body = $smarty->getTemplateDir('default').'commons/home_page.tpl';
                        $body_controller = (object)$controller->getController('commons/home_page');
                        break;
                }
            }
        }elseif(count($actions) > 1){
            foreach($actions as $action){
                switch($action){
                    
                    case 'article':
                    case 'media':
                    case 'podcast':
                        $tpl_dir_path = $smarty->getTemplateDir('default').'content/';
                        $controller_dir = 'content/';
                        break;
                    case 'staff':
                        $tpl_dir_path = $smarty->getTemplateDir('default').'staff/';
                        $controller_dir = 'staff/';
                        break;
                   
                }
            }
            if($actions[0] == 'staff'){
                $body = $tpl_dir_path.'single-staff.tpl';
                $body_controller = (object)$controller->getController($controller_dir.'single-staff');
            }elseif($actions[0] == 'article'){
                $body = $tpl_dir_path.'article.tpl';
                $body_controller = (object)$controller->getController($controller_dir.'article');
            }elseif($actions[0] == 'media'){
                $body = $tpl_dir_path.'media.tpl';
                $body_controller = (object)$controller->getController($controller_dir.'media');
            }elseif($actions[0] == 'podcast'){
                $body = $tpl_dir_path.'podcast.tpl';
                $body_controller = (object)$controller->getController($controller_dir.'podcast');
            }
        }
        
    }else{
        
        $body = $smarty->getTemplateDir('default').'commons/404.tpl';
        $body_controller = (object)$controller->getController('commons/404');
        
    }
    
    
    
   
}
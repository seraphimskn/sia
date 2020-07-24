<?php

$router     = new Router($_GET);     //setup the Router() object
$load       = new Load();            //setup the Load() object
$controller = new Controller();      //setup the Controller() object
$model      = new Model();           //setup the Model() object
$module     = new Modules();         //setup the Modules() object
Smarty_Autoloader::register();       //starts the Smarty compiler
$smarty     = new Smarty();          //setup the Smarty() object

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
$smarty->setTemplateDir(array('default' => 'views'));

//load the template viewing and controllers
//header and footer controller and model
$common_controller = (object)$controller->getController('commons/commons');
$common_model = (object)$model->getModel('commons/commons');

//the header
$header = $smarty->getTemplateDir('default').'commons/header.tpl';

//the footer
$footer = $smarty->getTemplateDir('default').'commons/footer.tpl';

$actions = $router->getActions();

//the body

$action = $router->getActions();

if(!isset($_SESSION['logged'])){
    $body_controller = (object)$controller->getController('commons/login');
    $body_model = (object)$model->getModel('commons/login');
    $body = $smarty->getTemplateDir('default').'commons/login.tpl';
}else
if(is_null($actions) || $actions == 'home'){    
    if(is_null($_SESSION['logged']) || $_SESSION['logged'] == false){
        $body_controller = (object)$controller->getController('commons/login');
        $body_model = (object)$model->getModel('commons/login');
        $body = $smarty->getTemplateDir('default').'commons/login.tpl';
    }else{
        $body_controller = (object)$controller->getController('commons/home');
        $body_model = (object)$model->getModel('commons/home');
        $body = $smarty->getTemplateDir('default').'commons/home.tpl';
    }
}else{
    if(count($action) == 1){
        $body_controller = (object)$controller->getController($action.'/view');
        $body_model = (object)$model->getModel($action.'/view');
        $body = $smarty->getTemplateDir('default').$action.'/view.tpl';
    }
}

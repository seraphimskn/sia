<?php 

#defining the namespaces PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$router     = new Router($_GET);     //setup the Router() object
$load       = new Load();            //setup the Load() object
$controller = new Controller();      //setup the Controller() object
$model      = new Model();           //setup the Model() object
$mailing    = new PHPMailer(true);   //setup the PHPMailer() object
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

//sets the config vars to a callable var
$config_vars = (object)$smarty->getConfigVars();

//loads the initial css styles
$load->setStyle($config_vars->styles_path.'/bootstrap', 'bootstrap');
$load->setStyle($config_vars->styles_path.'/jquery-ui', 'jquery-ui');
$load->setStyle($config_vars->styles_path.'/jquery-ui', 'jquery-ui.structure');
$load->setStyle($config_vars->styles_path, 'font-awesome');
$load->setStyle($config_vars->styles_path, 'main');

$styles = (object)$load->getStyles();

//sets the initial js scripts
$load->setScript($config_vars->scripts_path, 'gtags', 'google.tags');
$load->setScript($config_vars->scripts_path, 'jquery-3.3.1.min');
$load->setScript($config_vars->scripts_path, 'jquery-ui.min');
$load->setScript($config_vars->scripts_path.'/bootstrap', 'bootstrap');
$load->setScript($config_vars->scripts_path.'/bootstrap', 'bootstrap.bundle');
$load->setScript($config_vars->scripts_path, 'main');
$load->setScript($config_vars->scripts_path, 'ajax');

$scripts = (object)$load->getScripts();

//sets the model superclass connection to the DB
$config_vars->dsn = 'mysql:host=' . $config_vars->host . ';dbname=' . $config_vars->db;
$model->setConnParams($config_vars->dsn, $config_vars->dbUser, $config_vars->dbPwd);

//sets the admin default view path
$smarty->setTemplateDir(array('default' => 'views'));
//$smarty->setCompileDir('views_c');

//starts the default header and footer tpl
$header = $smarty->getTemplateDir('default').'commons/header.tpl';
$footer = $smarty->getTemplateDir('default').'commons/footer.tpl';
$common_controller = (object)$controller->getController('commons/commons');
$common_model = (object)$model->getModel('commons/commons');

//checks for a session
if(!session_start()){
    session_start();
}

//quit session
if(isset($_GET['quit']) && $_GET['quit'] == true){
    session_destroy();
    header('Location: ./');
}

//checks the session and the pages to display
if(!isset($_SESSION['logged']) && $router->getActions() == null){
    $the_body = $smarty->getTemplateDir('default').'commons/login.tpl';
    $the_controller = (object)$controller->getController('commons/login');
    $the_model = (object)$model->getModel('commons/login');
}elseif(isset($_SESSION['logged']) && $router->getActions() == null){
    $the_body = $smarty->getTemplateDir('default').'commons/home.tpl';
    $the_controller = (object)$controller->getController('commons/home');
    $the_model = (object)$model->getModel('commons/home');
}elseif(isset($_SESSION['logged']) && null != $router->getActions()){  
    $actions = $router->getActions();    
    if(count($actions) <= 1){        
        foreach($actions as $action){
            switch($action){
                case 'home':
                    $the_body = $smarty->getTemplateDir('default').'commons/home.tpl';
                    $the_controller = (object)$controller->getController('commons/home');
                    $the_model = (object)$model->getModel('commons/home');
                    break;                
            }
        }
    }elseif(is_array($actions) && count($actions) > 1){        
        $the_page = (isset($actions[0])) ? $actions[0] : '';
        $the_action = (isset($actions[1])) ? $actions[1] : '';
        
        $the_action = str_replace('-', '', $the_action);

        $the_body = $smarty->getTemplateDir('default').$the_page.'/'.$the_action.'.tpl';
        $the_controller = (object)$controller->getController($the_page.'/'.$the_action);
        $the_model = (object)$model->getModel($the_page.'/'.$the_action);
    }
}

<?php 

$router     = new Router($_GET);     //setup the Router() object
$load       = new Load();            //setup the Load() object
$controller = new Controller();      //setup the Controller() object
$model      = new Model();           //setup the Model() object
Smarty_Autoloader::register();       //starts the Smarty compiler
$smarty     = new Smarty();          //setup the Smarty() object

//if isn't on the developing ambience, set to false
$smarty->debugging = false;

//set the cache off for developing
$smarty->caching = false;

//sets the Config directory
$smarty->setConfigDir('../system/defines');

//load the Database Connection Config Sections
$smarty->configLoad('../system/defines/config.conf', 'database'); #database

//load the Constants definitions
$smarty->configLoad('../system/defines/config.conf', 'constants'); #constants

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
$load->setScript($config_vars->scripts_path, 'jquery-3.3.1.min');
$load->setScript($config_vars->scripts_path, 'jquery-ui.min');
$load->setScript($config_vars->scripts_path.'/bootstrap', 'bootstrap');
$load->setScript($config_vars->scripts_path.'/bootstrap', 'bootstrap.bundle');
$load->setScript($config_vars->scripts_path, 'main');

$scripts = (object)$load->getScripts();

//sets the model superclass connection to the DB
$config_vars->dsn = 'mysql:host=' . $config_vars->host . ';dbname=' . $config_vars->db;
$model->setConnParams($config_vars->dsn, $config_vars->dbUser, $config_vars->dbPwd);

//sets the admin default view path
$smarty->setTemplateDir(array('default' => 'views'));
$smarty->setCompileDir('views_c');

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

if(!isset($_SESSION['logged'])){
    $the_body = $smarty->getTemplateDir('default').'commons/login.tpl';
    $the_controller = (object)$controller->getController('commons/login');
    $the_model = (object)$model->getModel('commons/login');
}elseif(isset($_SESSION['logged']) && $router->getActions() === null){
    $the_body = $smarty->getTemplateDir('default').'commons/home.tpl';
    $the_controller = (object)$controller->getController('commons/home');
    $the_model = (object)$model->getModel('commons/home');
}else{
    
    if(!is_array($router->getActions())){
        
        $action = $router->getActions();
        
        if($action == 'relatorios' || $action == 'painel_de_controle'){
            $the_folder = 'commons';
        }elseif($action == 'configuracoes' || $actions == 'users'){
            $the_folder = 'configs';
        }elseif($action == 'medias'){
            $the_folder = 'media';
        }elseif($action == 'paginas'){
            $the_folder = 'pages';
        }elseif($action == 'publicacoes'){
            $the_folder = 'posts';
        }
        
    }elseif(is_array($router->getActions())){
        
    }
    
}


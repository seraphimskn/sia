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
}elseif(isset($_SESSION['logged']) && null !== $router->getActions()){
   
    $actions = $router->getActions();
    
    if(count($actions) <= 1){
        
        foreach($actions as $action){
            switch($action){
                case 'home':
                    $the_body = $smarty->getTemplateDir('default').'commons/home.tpl';
                    $the_controller = (object)$controller->getController('commons/home');
                    $the_model = (object)$model->getModel('commons/home');
                    break;
                case 'reports' :
                    $the_body = $smarty->getTemplateDir('default').'commons/reports.tpl';
                    $the_controller = (object)$controller->getController('commons/reports');
                    $the_model = (object)$model->getModel('commons/reports');
                    break;
                case 'posts':
                    $the_body = $smarty->getTemplateDir('default').'posts/posts.tpl';
                    $the_controller = (object)$controller->getController('posts/posts');
                    $the_model = (object)$model->getModel('posts/posts');
                    break;
                case 'pages':
                    $the_body = $smarty->getTemplateDir('default').'pages/pages.tpl';
                    $the_controller = (object)$controller->getController('pages/pages');
                    $the_model = (object)$model->getModel('pages/pages');
                    break;
                case 'extensions':
                    $the_body = $smarty->getTemplateDir('default').'configs/extensions.tpl';
                    $the_controller = (object)$controller->getController('configs/extensions');
                    $the_model = (object)$model->getModel('configs/extensions');
                    break;
                case 'medias':
                    $the_body = $smarty->getTemplateDir('default').'media/medias.tpl';
                    $the_controller = (object)$controller->getController('media/medias');
                    $the_model = (object)$model->getModel('media/medias');
                    break;
                case 'users':
                    $the_body = $smarty->getTemplateDir('default').'configs/users.tpl';
                    $the_controller = (object)$controller->getController('configs/users');
                    $the_model = (object)$model->getModel('configs/users');
                    break;
                case 'system':
                    $the_body = $smarty->getTemplateDir('default').'configs/configs.tpl';
                    $the_controller = (object)$controller->getController('configs/configs');
                    $the_model = (object)$model->getModel('configs/configs');
                    break;
            }
        }
    }elseif(is_array($actions) && count($actions) > 1){
        
        $the_page = $actions[0];
        $the_action = $actions[1];
        if(count($the_page) <= 1){
            switch ($the_page){
                case 'config':
                case 'extension':
                case 'user':
                    $the_folder = 'configs/';
                    break;
                case 'reports':
                    $the_folder = 'commons/';
                    break;
                case 'media':
                    $the_folder = 'media/';
                    break;
                case 'page':
                    $the_folder = 'pages/';
                    break;
                case 'post':
                    $the_folder = 'posts/';
                    break;
            }
        }else{
            switch($the_page[0]){
                case 'config':
                case 'extension':
                case 'user':
                    $the_folder = 'configs/';
                    $the_page = $the_page[0];
                    break;
                case 'reports':
                    $the_folder = 'commons/';
                    $the_page = $the_page[0];
                    break;
                case 'media':
                    $the_folder = 'media/';
                    $the_page = $the_page[0];
                    break;
                case 'page':
                    $the_folder = 'pages/';
                    $the_page = $the_page[0];
                    break;
                case 'post':
                    $the_folder = 'posts/';
                    $the_page = $the_page[0];
                    break;
            }
        }
        
        $the_body = $smarty->getTemplateDir('default').$the_folder.$the_page.'.tpl';
        $the_controller = (object)$controller->getController($the_folder.$the_page);
        $the_model = (object)$model->getModel($the_folder.$the_page);
        
    }
}


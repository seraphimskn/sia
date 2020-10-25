<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$data = array();

if(isset($googleModule->model->model)){
    include_once $googleModule->model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

//loads the Google API V4 Library
$load->setLibs($config_vars->libs_path.'/googleAPI/vendor', 'autoload', 'googleAPI');
include_once $load->getLib('googleAPI');

//define the config key file for Google API
define('KEY_FILE', $config_vars->libs_path . '/googleAPI' . '/sigmedserrana-491ab8b5e09b.json');

//set the client initializing the reports
$client = new Google_Client();
$client->setApplicationName('SIGMEDSerrana Reporting');
$client->setAuthConfig(KEY_FILE);
$client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
$client->useApplicationDefaultCredentials();
$client->fetchAccessTokenWithAssertion();

//parsing the token to a variable
$accessToken = (object)$client->getAccessToken();

$smarty->assign('googleToken', $accessToken->access_token);

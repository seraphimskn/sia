<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

include_once 'system/libs/OAuth2/Autoloader.php';

OAuth2\Autoloader::register();

include_once 'system/core/class.Model.php';
include_once 'system/core/class.Webservice.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    http_response_code(400);
    $error = 'Bad, bad server. No donuts for you...';
}else{
    
    /* $dsn  = 'mysql:host=localhost; dbname=sigmedserrana';
    $user = 'root';
    $pass = 'vix@2014'; */ 

    $dsn  = 'mysql:host=localhost; dbname=medserrana_sistema';
    $user = 'app_user';
    $pass = 'med#app@1qaz'; 

    $storage = new OAuth2\Storage\Pdo(array('dsn'=>$dsn, 'username'=>$user,'password' => $pass));
    $server = new OAuth2\Server($storage, array('access_lifetime' => 10800, 
                                                'always_issue_new_refresh_token' => true,
                                                'refresh_token_lifetime' => 10800));
    
    $client_auth = new \OAuth2\GrantType\ClientCredentials($storage);
    $auth_code   = new \OAuth2\GrantType\AuthorizationCode($storage);
    $refresh_token = new \OAuth2\GrantType\RefreshToken($storage);
    
    $server->addGrantType($client_auth);
    $server->addGrantType($auth_code);
    $server->addGrantType($refresh_token);

    $service = new WebService($dsn, $user, $pass);

    if(isset($_REQUEST['usuario'])){

        $user = $service->checkUser($_REQUEST['usuario'], md5(sha1($_REQUEST['senha'])));

        if(count($user) != 0){
            $userInfo = $service->getUserInfo($user[0]->id);
            $authSearch = $service->select('oauth_clients', array('client_id'), array('client_id'=>$userInfo->id), 'client_id');
            unset($_REQUEST['usuario']);
            unset($_REQUEST['senha']);      
            
            $_POST['client_id'] = $userInfo->id;
            $_POST['client_secret'] = $userInfo->senha;
            $_POST['grant_type'] = 'client_credentials';           
            
            if(count($authSearch) > 0){

                $request = OAuth2\Request::createFromGlobals();
                $response = new OAuth2\Response();

                if($server->handleTokenRequest($request, $response)){
                    $response->send();
                };

            }else{               

                $authInsert = $service->insertAuthClient(array($userInfo->id, $userInfo->senha, '_self', $userInfo->id));
                if($authInsert){

                    $request = OAuth2\Request::createFromGlobals();
                    $response = new OAuth2\Response();

                    if($server->handleTokenRequest($request, $response)){
                        $response->send();
                    };
                }
            }
        }else{
            exit('ERRO! Login não existe!');
        }

    }elseif(isset($_REQUEST['access_token'])){

        $request = OAuth2\Request::createFromGlobals();
        $response = new OAuth2\Response();

        if(!$server->verifyResourceRequest($request, $response)){
            $response->send();
            die;
        }

        $token = (object)$server->getAccessTokenData($request, $response);

        if(isset($_REQUEST['method'])){
            switch($_REQUEST['method']){
                
                case 'auth':
                    $user = $service->getUserStats($token->access_token);
                    $response = array('token' => $token->access_token, 'acao' => 'login', 'user_stats' => $user);
                break;

                case 'viewUser':
                    $view = $service->getUserInfos($token);
                    $response = array('token' => $token->access_token, 'acao' => 'selecionar', 'resultado' => $view);
                break;

                case 'viewUserBuys':
                    $view = $service->getUserBuys($token);
                    $response = array('token' => $token->access_token, 'acao' => 'selecionar', 'resultado' => $view);
                break;

                case 'viewSellers':
                    $view = $service->getSellers();
                    $response = array('token' => $token->access_token, 'acao' => 'selecionar', 'resultado' => $view);
                break;

                case 'viewSellersCategory':
                    $view = $service->getSellersByCategory($_REQUEST['cat']);
                    $response = array('token' => $token->access_token, 'acao' => 'selecionar', 'resultado' => $view);
                break;

                case 'viewProducts':
                    $view = $service->getProducts();
                    $response = array('token' => $token->access_token, 'acao' => 'selecionar', 'resultado' => $view);
                break;

                case 'viewAvaliacoes':
                    $view = $service->getAvaliations($token);
                    $response = array('token' => $token->access_token, 'acao' => 'selecionar', 'resultado' => $view);
                break;

                case 'insert':
                    $response = array('token' => $token->access_token, 'acao' => 'inserir');
                break;

                case 'update':
                    $response = array('token' => $token->access_token, 'acao' => 'atualizar');
                break;

            }
        }else{

            //$view = $service->getUserInfos($token);
            $view = $service->getUserInfos($token);

            $response = array('token' => $token->access_token, 'acao' => 'selecionar', 'resultado' => $view);
        }

    }else{

        exit('Login expirado!');
    
    }
    
}
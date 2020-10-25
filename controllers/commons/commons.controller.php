<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//model archive inclusion
if($common_model->error == 0){
    include_once $common_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados n�o pode ser carregado. Entre em contato com o administrador do sistema.';
}

//load the headers variable
if(true == $styles->error){
    $smarty->assign('styles', 'Can\'t load the stylesheets! Contact the system administrator.');
}else{
    $smarty->assign('styles', $styles->styles); #styles
}
if(true == $scripts->error){
    $smarty->assign('scripts', 'Can\'t load the scripts! Contact the system administrator.');
}else{
    $smarty->assign('scripts', $scripts->scripts); #scripts
}

//set the base href
//$smarty->assign('baseHREF', 'http://localhost/medv01/');
$smarty->assign('baseHREF', 'https://medserrana.com.br/sigms/');

//sets the database primary configs
//$smarty->assign('configs', $data['configs']);

//checks if there is a session started
(isset($_SESSION) && isset($_SESSION['logged'])) ? $smarty->assign('sessionLogged', true) : $smarty->assign('sessionLogged', false);

//retrieves the type of administration will show
//if(isset($_SESSION) && isset($_SESSION['user_level'])) $smarty->assign('userLevel', $_SESSION['user_level']);

//get the breadcrumbs
if($router->getActions() == null){
    $data['breadcrumbs'] = 'Painel de Controle';
}else{
    
    $actions = $router->getActions();
   
    if(count($actions) <= 1){
        foreach($actions as $action){
            switch($action){
                case 'home':
                    $data['breadcrumbs'] = 'Painel de Controle';
                    break;
            }
        }
    }elseif(count($actions) > 1){
        
        $the_page = $actions[0];
        $the_action = $actions[1];        

        switch($the_action){
            case 'view':
                $action = 'Visualizar';
                break;
            case 'edit':
                $action = 'Editar';
                break;
            case 'add':
                $action = 'Adicionar';
                break;
            case 'payments':
                $action = 'Adimplência';
                break;
            case 'births':
                $action = 'Aniversariantes do Mês';
                break;
            case 'newcomers':
                $action = 'Novos Beneficiários Cadastrados';
                break;
            case 'prospects':
                $action = 'Medição Mensal';
                break;
            case 'assurances':
                $action = 'Beneficiários Assegurados';
                break;
            case 'byseller':
                $action = 'Contratos por Vendedor';
                break;
            case 'financials':
                $action = 'Relatório Financeiro';
                break;
            case 'sells':
                $action = 'Contratos';
                break;
            case 'report':
                $action = 'Detalhamentos';
                break;
            case 'contract_payments':
                $action = 'Pagamentos do Contrato';
                break;
            case 'product':
                $action = 'Produto';
                break;
            case 'print':
                $action = 'Imprimir';
                break;
            case 'register':
                $action = 'Registrar Pagamento';
                break;
        }

        switch($the_page){
            case 'users':
                $page = 'Usuários';
                break;
            case 'reports':
                $page = 'Relatórios';
                break;
            case 'bills':
                $page = 'Boletos';
                break;
            case 'levels':
                $page = 'Níveis';
                break;
            case 'contracts':
                $page = 'Contratos';
                break;
            case 'mailing':
                $page = 'Mailing';
                break;
            case 'products':
                $page = 'Produtos';
                break;
            case 'plans':
                $page = 'Planos';
                break;
            case 'payments':
                $page = 'Pagamentos';
                break;
            case 'points':
                $page = 'Pontos de Fidelidade';
                break;
            case 'newcard':
                $page = '2ª Via de Carteirinha';
                break;

        }

        $data['breadcrumbs'] = $page . ' - ' . $action;
        
    }
   
}

//assign the breadcrumbs to the TPL vars
if(isset($data['breadcrumbs'])){
    $smarty->assign('breadcrumbs', $data['breadcrumbs']);
}
    
//mounting the variable with the permissions of the user level
if(isset($user_level)){
    if($user_level->permissoes != 'all'){
        $user_stats->permissoes = json_decode($user_level->permissoes);
    }else{
        $user_stats->permissoes = 'all';
    }
}

//assign the user data to the TPL vars
if(isset($_SESSION['logged'])){
    $smarty->assign('dataUser', $user_stats);

    //includes the menu constructor
    $menuModule = $module->getModule('menu', 2);
    include_once $menuModule->controller->controller;
    $smarty->assign('menu', $menuModule->module_path);

    $smarty->assign('userLevel', strtolower($_SESSION['userLevel']));
}

//assign the page action to show on the TPL
if(isset($the_page)){
    $smarty->assign('page', $the_page);
}

$smarty->assign('session', $_SESSION);

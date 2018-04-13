<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//model archive inclusion
if($common_model->error == 0){
    include_once '../adm/'.$common_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

//load the headers variable
if(true === $styles->error){
    $smarty->assign('styles', 'Can\'t load the stylesheets! Contact the system administrator.');
}else{
    $smarty->assign('styles', $styles->styles); #styles
}
if(true === $scripts->error){
    $smarty->assign('scripts', 'Can\'t load the scripts! Contact the system administrator.');
}else{
    $smarty->assign('scripts', $scripts->scripts); #scripts
}

//set the base href
$smarty->assign('baseHREF', '/bandnews/site/adm/');

//sets the database primary configs
$smarty->assign('configs', $data['configs']);

//checks if there is a session started
(isset($_SESSION) && isset($_SESSION['logged'])) ? $smarty->assign('sessionLogged', true) : $smarty->assign('sessionLogged', false);

//retrieves the type of administration will show
if(isset($_SESSION) && isset($_SESSION['user_level'])) $smarty->assign('userLevel', $_SESSION['user_level']);

//get the breadcrumbs
if($router->getActions() === null){
    $data['breadcrumb'] = '<a href="home">Painel de Controle</a> > Estat&iacute;sticas';
}else{
    
    $actions = $router->getActions();
   
    if(count($actions) <= 1){
        foreach($actions as $action){
            switch ($action){
                case 'home':
                    $data['breadcrumb'] = 'Painel de Controle > Estat&iacute;sticas';
                    break;
                case 'posts':
                    $data['breadcrumb'] = 'Postagens > Vis&atilde;o Geral';
                    break;
                case 'extensions':
                    $data['breadcrumb'] = 'Extens&otilde;es > Vis&atilde;o Geral';
                    break;
                case 'medias':
                    $data['breadcrumb'] = 'M&iacute;dias > Vis&atilde;o Geral';
                    break;
                case 'users':
                    $data['breadcrumb'] = 'Usu&aacute;rios > Vis&atilde;o Geral';
                    break;
                case 'system':
                    $data['breadcrumb'] = 'Sistema > Configura&ccedil;&otilde;es Gerais';
                    break;
                case 'pages':
                    $data['breadcrumb'] = 'P&aacute;ginas > Configura&ccedil;&otilde;es Gerais';
                    break;
                case 'reports':
                    $data['breadcrumb'] = 'Relat&oacute;rios > Gerar Relat&oacute;rio';
                    break;
            }
        }
    }elseif(count($actions) > 1){
        
        $the_page = $actions[0];
        $the_action = $actions[1];
        
        if(count($the_page) <= 1){
            switch ($the_page){
                case 'post':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'Postagens > Nova Postagem';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'Postagens > Editar Postagem';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'Postagens > Deletar Postagem';
                    }
                    break;
                case 'extension':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'Extens&otilde;es > Nova Extens&atilde;o';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'Extens&otilde;es > Editar Extens&atilde;o';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'Extens&otilde;es > Deletar Extens&atilde;o';
                    }
                    break;
                case 'media':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'M&iacute;dias > Nova M&iacute;dia';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'M&iacute;dias > Editar M&iacute;dia';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'M&iacute;dias > Deletar M&iacute;dia';
                    }
                    break;
                case 'user':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'Usu&aacute;rios > Novo Usu&aacute;rio';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'Usu&aacute;rios > Editar Usu&aacute;rio';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'Usu&aacute;rios > Deletar Usu&aacute;rio';
                    }
                    break;
                case 'config':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'Configura&ccedil;&otilde;es > Novo Par&acirc;metro';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'Configura&ccedil;&otilde;es > Editar Par&acirc;metro';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'Configura&ccedil;&otilde;es > Deletar Par&acirc;metro';
                    }
                    break;
                case 'page':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'P&aacute;ginas > Nova P&aacute;gina';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'P&aacute;ginas > Editar P&aacute;gina';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'P&aacute;ginas > Deletar P&aacute;gina';
                    }
                    break;
                case 'report':
                    $data['breadcrumb'] = 'Relat&oacute;rios > Gerar Relat&oacute;rio';
                    break;
            }
        }else{
            
            $the_action = $the_page[1];
            $the_page = $the_page[0];
            
            switch ($the_page){
                case 'post':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'Postagens > Nova Postagem';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'Postagens > Editar Postagem';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'Postagens > Deletar Postagem';
                    }
                    break;
                case 'extension':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'Extens&otilde;es > Nova Extens&atilde;o';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'Extens&otilde;es > Editar Extens&atilde;o';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'Extens&otilde;es > Deletar Extens&atilde;o';
                    }
                    break;
                case 'media':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'M&iacute;dias > Nova M&iacute;dia';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'M&iacute;dias > Editar M&iacute;dia';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'M&iacute;dias > Deletar M&iacute;dia';
                    }
                    break;
                case 'user':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'Usu&aacute;rios > Novo Usu&aacute;rio';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'Usu&aacute;rios > Editar Usu&aacute;rio';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'Usu&aacute;rios > Deletar Usu&aacute;rio';
                    }
                    break;
                case 'config':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'Configura&ccedil;&otilde;es > Novo Par&acirc;metro';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'Configura&ccedil;&otilde;es > Editar Par&acirc;metro';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'Configura&ccedil;&otilde;es > Deletar Par&acirc;metro';
                    }
                    break;
                case 'page':
                    if($the_action == 'add'){
                        $data['breadcrumb'] = 'P&aacute;ginas > Nova P&aacute;gina';
                    }elseif($the_action == 'update'){
                        $data['breadcrumb'] = 'P&aacute;ginas > Editar P&aacute;gina';
                    }elseif($the_action == 'del'){
                        $data['breadcrumb'] = 'P&aacute;ginas > Deletar P&aacute;gina';
                    }
                    break;
                case 'report':
                    $data['breadcrumb'] = 'Relat&oacute;rios > Gerar Relat&oacute;rio';
                    break;
            }
        }
    }
   
}

//assign the breadcrumbs to the TPL vars
$smarty->assign('breadcrumb', $data['breadcrumb']);

//assign the user data to the TPL vars
if(isset($_SESSION['logged'])){
    foreach($user_stats as $user){
        $smarty->assign('userData', $user);
    }
}

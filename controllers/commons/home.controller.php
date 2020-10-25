<?php

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

if($_SESSION['userLevel'] == 'Super-administrador' || $_SESSION['userLevel'] == 'Administrador'){

    /**
     * REQ MED-33-3.2.1 -- DASHBOARD - VISÃO DO ADMINISTRADOR
     * 
     * Related:
     * 
     * file                        type
     * home.controller.php         controller
     * home.model.php              model
     * home.view.php               view
     * class.Controller.php        system core
     * class.Model.php             system core
     * class.Load.php              system core
     * class.Router.php            system core
     */

    //loads the Google API module
    $googleModule = $module->getModule('googleAPI', 1);
    include_once $googleModule->controller->controller;
    //assigns the googleAPI to the tpl view
    $smarty->assign('googleAPI', $googleModule->module_path);

    //assign the users DB retrieved info to the tpl view
    if(isset($users)){
        $smarty->assign('users', $users);
    }

    //formating the veiwing of the buying info retrieved from DB
    //and assign it to the tpl view
    if(isset($compras)){
        $compras = number_format($compras[0]->total, 2, ',', '.');
        $smarty->assign('compras', $compras);
    }else{
        $smarty->assign('compras', '0,00');
    }

    //formating the viewing of the total spent info retrieved from DB
    //and assign it to the tpl view
    if(isset($usuario)){
        $j = 0;
        foreach($usuario as $item){
            $valorTotal = 0;
            $gastosUsuarios[$j]['nome'] = $item['nome'][0];
            for($i = 0; $i < count($item['valor']); $i++){
                $valorTotal = $valorTotal + $item['valor'][$i];
            }
            $gastosUsuarios[$j]['valorTotal'] = number_format($valorTotal, 2, ',', '.');
            $j++;
        }
        $smarty->assign('gastosUsuarios', $gastosUsuarios);
    }else{
        $smarty->assign('gastosUsuarios', '-----');
    }

}elseif($_SESSION['userLevel'] == 'Parceiro'){

    $scannerModule = $module->getModule('scanner', 3);
    include_once $scannerModule->controller->controller;
    $smarty->assign('scannerModule', $scannerModule->module_path);

}elseif($_SESSION['userLevel'] == 'Beneficiario'){

    if(count($compras) > 0){
        foreach($compras as $compra => $item){
            if($item->valor_pontuacao != 0){
                $compras[$compra]->pontos = round(($item->pontuacao / $item->valor_pontuacao) * $item->valor_compra);
            }else{
                $compras[$compra]->pontos = 0;
            }
        }
    }else{
        $compras = 'Você ainda não realizou nenhuma compra com seu cartão de benefícios!';
    }

    $smarty->assign('compras', $compras);
    foreach($data_pagamento as $data => $item){
        if(date('m', strtotime($item->data_vencimento)) == date('m') && $item->status != 1){
            $smarty->assign('data_pagamento', $item->data_vencimento);
            break;
        }elseif(date('m', strtotime($item->data_vencimento)) > date('m') && date('d', strtotime($item->data_vencimento)) <= date('d') && date('Y', strtotime($item->data_vencimento)) == date('Y')){
            $smarty->assign('data_pagamento', $item->data_vencimento);
            break;
        }elseif(date('m', strtotime($item->data_vencimento)) < $dataDiff){
            $smarty->assign('data_pagamento', $item->data_vencimento);
            break;
        };
        echo $item->data_vencimento . '<br>';
    }

    if(count($fidelidade) == 0){
        $fidelidade[0]->pontos = 0;
    }

    $smarty->assign('fidelidade', $fidelidade);

}

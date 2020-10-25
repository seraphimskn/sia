<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

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

//adjustments for the payments query
/*foreach($payments as $payment=>$item){

    if($item->status != 1){
        if(date('Y', strtotime($item->data_vencimento)) > date('Y')){
            unset($payments[$payment]);
        }elseif(date('m', strtotime($item->data_vencimento)) > date('m')){
            unset($payments[$payment]);
        }
    }else{
        if(date('Y', strtotime($item->data_vencimento)) > date('Y')){
            unset($payments[$payment]);
        }elseif(date('m', strtotime($item->data_vencimento)) > date('m')){
            unset($payments[$payment]);
        }
    }

}*/

//adjustments for the birthdays query
foreach($births as $birth => $month){
    if(!is_null($month->data_nascimento)){
        if(date('m', strtotime($month->data_nascimento)) != date('m')){
            unset($births[$birth]);
        }
    }else{
        unset($births[$birth]);
    }    
}

//adjustments for the newcomers query
foreach($newcomers as $newcomer => $date){

    $dateDiff = (int)((strtotime(date('Y-m-d')) - strtotime($date->data_cadastro)) / 86400);   
    if($dateDiff > 30){
      unset($newcomers[$newcomer]);
    }
}

//adjustments for the prospects query
foreach($prospects as $prospect => $item){
    if(date('m', strtotime($item->vencimento)) != date('m')){
        unset($payments[$payment]);            
    }    
}

//adjustments for the byseller report query
foreach($byseller as $contract => $item){
    if(date('m', strtotime($item->data_venda)) != date('m')){
        unset($byseller[$contract]);
    }
}

foreach($assurances as $assurance => $item){
    if($assegurado[$id_usuario]->id_usuario != $item->id_usuario){
        $assegurado[$id_usuario] = $item;
    }else{
        unset($assurances[$assurance]);
    }
}

//passing the data controllers
if(count($payments) > 0){
    $data['payments'] = $payments;
}else{
    $data['payments'] = 'Nenhum contrato cadastrado!';
}

if(count($births) > 0){
    $data['births'] = $births;
}else{
    $data['births'] = 'Não há aniversariantes este mês!';
}

if(count($newcomers) > 0){
    $data['newcomers'] = $newcomers;
}else{
    $data['newcomers'] = 'Nenhum beneficiário novo registrado este mês.';
}

if(count($prospects) > 0){
    $data['prospects'] = $prospects;
}else{
    $data['prospects'] = 'Não há medições até o momento.';
}

foreach($data['prospects'] as $payment => $item){
    $data['prospects']['total'] = $data['prospects']['total'] + $item->valor;    
    unset($data['prospects'][$payment]);
}

if(count($assegurado) > 0){
    $data['assurances'] = $assegurado; 
}else{
    $data['assurances'] = 'Não há beneficiários assegurados.';
}

if(count($byseller) > 0){
    $data['byseller'] = $byseller; 
}else{
    $data['byseller'] = 'Não há fechamentos de vendas ainda.';
}

if(count($financials) > 0){
    $data['financials'] = $financials; 
}else{
    $data['financials'] = 'Não houve vendas neste Ponto de Venda Associado.';
}

if(count($selling) > 0){
    $data['selling'] = $selling; 
}else{
    $data['selling'] = 'Você ainda não efetuou nenhuma venda.';
}

if(isset($data)){
    $smarty->assign('data', (object)$data);
};
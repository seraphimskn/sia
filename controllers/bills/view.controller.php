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

if(isset($bills)){
    foreach($bills as $bill => $item){
        if($item->status != 0){
            $bills[$bill]->status = '<span class="badge badge-success">PAGO</span>';
        }elseif($item->status == 0 && date('Y-d-m', strtotime($item->data_vencimento)) > date('Y-m-d')){
            $bills[$bill]->status = '<span class="badge badge-secondary">ABERTO</span>';
        }elseif($item->status == 0 && date('Y-d-m', strtotime($item->data_vencimento)) < date('Y-m-d')){
            $bills[$bill]->status = '<span class="badge badge-secondary">EM ATRASO</span>';
        }
    }
    $smarty->assign('boletos', (object)$bills);
}

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

if(isset($contract)){
    $smarty->assign('contrato', $contract);
}

if(isset($usuario)){
    if(strlen($usuario->cpf_cnpj) == 11){
        $codigo = '';
        for($i = 0; $i < strlen($usuario->cpf_cnpj); $i++){
            if($i < 2){
                $codigo .= $usuario->cpf_cnpj[$i];
            }elseif($i == 2){
                $codigo .= $usuario->cpf_cnpj[$i] . '.';
            }elseif($i > 2 && $i < 5){
                $codigo .= $usuario->cpf_cnpj[$i];
            }elseif($i == 5){
                $codigo .= $usuario->cpf_cnpj[$i] . '.';
            }elseif($i > 5 && $i < 8){
                $codigo .= $usuario->cpf_cnpj[$i];
            }elseif($i == 8){
                $codigo .= $usuario->cpf_cnpj[$i] . '-';
            }elseif($i > 8){
                $codigo .= $usuario->cpf_cnpj[$i];
            }
        }
    }elseif(strlen($usuario->cpf_cnpj) == 14){
        $codigo = '';
        for($i = 0; $i < strlen($usuario->cpf_cnpj); $i++){
            if($i < 1){
                $codigo .= $usuario->cpf_cnpj[$i];
            }elseif($i == 1){
                $codigo .= $usuario->cpf_cnpj[$i] . '.';
            }elseif($i > 1 && $i < 4){
                $codigo .= $usuario->cpf_cnpj[$i];
            }elseif($i == 4){
                $codigo .= $usuario->cpf_cnpj[$i] . '.';
            }elseif($i > 4 && $i < 7){
                $codigo .= $usuario->cpf_cnpj[$i];
            }elseif($i == 7){
                $codigo .= $usuario->cpf_cnpj[$i] . '/';
            }elseif($i > 7 && $i < 11){
                $codigo .= $usuario->cpf_cnpj[$i];
            }elseif($i == 11){
                $codigo .= $usuario->cpf_cnpj[$i] . '-';
            }elseif($i > 11){
                $codigo .= $usuario->cpf_cnpj[$i];
            }
        }
    }
    $usuario->cpf_cnpj = $codigo;
    $smarty->assign('usuario', $usuario);
}

if(isset($dependentes) && count($dependentes) > 0){
    $smarty->assign('dependentes', $dependentes);
}

if(isset($plan)){
    $smarty->assign('plano', $plan);
}
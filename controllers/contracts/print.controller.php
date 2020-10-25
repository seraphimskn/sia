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

//model archive inclusion
if(isset($the_model->model) && $the_model->model !== null){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($contrato)){
    $smarty->assign('contrato', $contrato);
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
    $usuario->endereco = str_replace(' / ', ' - ', $usuario->endereco) . ' - ' . $usuario->cidade . ' / ' . $usuario->estado;
    $smarty->assign('usuario', $usuario);
}

if(isset($dependentes)){
    foreach($dependentes as $dependente => $item){
        if(strlen($item->cpf_cnpj) == 11){
            $codigoD = '';
            for($i = 0; $i < strlen($item->cpf_cnpj); $i++){
                if($i < 2){
                    $codigoD .= $item->cpf_cnpj[$i];
                }elseif($i == 2){
                    $codigoD .= $item->cpf_cnpj[$i] . '.';
                }elseif($i > 2 && $i < 5){
                    $codigoD .= $item->cpf_cnpj[$i];
                }elseif($i == 5){
                    $codigoD .= $item->cpf_cnpj[$i] . '.';
                }elseif($i > 5 && $i < 8){
                    $codigoD .= $item->cpf_cnpj[$i];
                }elseif($i == 8){
                    $codigoD .= $item->cpf_cnpj[$i] . '-';
                }elseif($i > 8){
                    $codigoD .= $item->cpf_cnpj[$i];
                }
            }
        }
        $dependentes[$dependente]->cpf_cnpj = $codigoD;
        $dependentes[$dependente]->endereco = str_replace(' / ', ' - ', $item->endereco) . ' - ' .$item->cidade . ' / '. $item->estado;
    }    
    $smarty->assign('dependentes', $dependentes);
}

if(isset($plano)){
    $smarty->assign('plano', $plano);
}
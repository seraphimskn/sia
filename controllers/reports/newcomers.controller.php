<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die("Acesso negado.");
    }else{

        if(!is_dir('../../downloads/novos_beneficiarios')){
            mkdir('../../downloads/novos_beneficiarios');
            chmod('../../downloads/novos_beneficiarios', 0777);
        }

        $configs = [
            'path' => '../../downloads/novos_beneficiarios'
        ];

        unset($_POST['send']);

        $dados = $_POST['dados'];
        $fileHeader = [];

        $xlsHandler = new \Vtiful\Kernel\Excel($configs);

        foreach($dados['header'] as $header){
            if($header != 'Exportar Relatório'){
                $fileHeader[] = $header;
            }
        }
        $file = $xlsHandler->fileName('relatorio_novos_beneficiarios_'.date('d-m-Y').'.xlsx', 'sheet_one');
        $file->header($fileHeader);
        
         for($i=0; $i < count($dados['rows']); $i++){
            for($j=0; $j < count($dados['rows'][$i]); $j++){
                if($dados['rows'][$i][$j] != 'Detalhes'){
                    $file->insertText($i+1, $j, $dados['rows'][$i][$j]);
                }
            }
         }

        $output = $file->output();
        echo $output;
    }
}else{
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

    foreach($data['newcomers'] as $newcomer){
        if(strlen($newcomer->cpf_cnpj) == 11){
            $codigo = '';
            for($i = 0; $i < strlen($newcomer->cpf_cnpj); $i++){
                if($i < 2){
                    $codigo .= $newcomer->cpf_cnpj[$i];
                }elseif($i == 2){
                    $codigo .= $newcomer->cpf_cnpj[$i] . '.';
                }elseif($i > 2 && $i < 5){
                    $codigo .= $newcomer->cpf_cnpj[$i];
                }elseif($i == 5){
                    $codigo .= $newcomer->cpf_cnpj[$i] . '.';
                }elseif($i > 5 && $i < 8){
                    $codigo .= $newcomer->cpf_cnpj[$i];
                }elseif($i == 8){
                    $codigo .= $newcomer->cpf_cnpj[$i] . '-';
                }elseif($i > 8){
                    $codigo .= $newcomer->cpf_cnpj[$i];
                }
            }
        }elseif(strlen($newcomer->cpf_cnpj) == 14){
            $codigo = '';
            for($i = 0; $i < strlen($newcomer->cpf_cnpj); $i++){
                if($i < 1){
                    $codigo .= $newcomer->cpf_cnpj[$i];
                }elseif($i == 1){
                    $codigo .= $newcomer->cpf_cnpj[$i] . '.';
                }elseif($i > 1 && $i < 4){
                    $codigo .= $newcomer->cpf_cnpj[$i];
                }elseif($i == 4){
                    $codigo .= $newcomer->cpf_cnpj[$i] . '.';
                }elseif($i > 4 && $i < 7){
                    $codigo .= $newcomer->cpf_cnpj[$i];
                }elseif($i == 7){
                    $codigo .= $newcomer->cpf_cnpj[$i] . '/';
                }elseif($i > 7 && $i < 11){
                    $codigo .= $newcomer->cpf_cnpj[$i];
                }elseif($i == 11){
                    $codigo .= $newcomer->cpf_cnpj[$i] . '-';
                }elseif($i > 11){
                    $codigo .= $newcomer->cpf_cnpj[$i];
                }
            }
        }
        $newcomer->cpf_cnpj = $codigo;
    }

    if(isset($data)){
        $smarty->assign('data', (object)$data);
    };
}
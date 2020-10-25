<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die("Acesso negado.");
    }else{

        if(!is_dir('../../downloads/por_vendedor')){
            mkdir('../../downloads/por_vendedor');
            chmod('../../downloads/por_vendedor', 0777);
        }

        $configs = [
            'path' => '../../downloads/por_vendedor'
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
        $file = $xlsHandler->fileName('relatorio_por_vendedor_'.date('d-m-Y').'.xlsx', 'sheet_one');
        $file->header($fileHeader);
        
         for($i=0; $i < count($dados['rows']); $i++){
            for($j=0; $j < count($dados['rows'][$i]); $j++){
                if($dados['rows'][$i][$j] !=  'Detalhes'){
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

    if(isset($data)){
        $smarty->assign('data', (object)$data);
    };
}
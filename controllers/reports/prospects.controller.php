<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die("Acesso negado.");
    }else{

        if(!is_dir('../../downloads/medicao')){
            mkdir('../../downloads/medicao');
            chmod('../../downloads/medicao', 0777);
        }

        $configs = [
            'path' => '../../downloads/medicao'
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
        $file = $xlsHandler->fileName('relatorio_financeiro_'.date('d-m-Y').'.xlsx', 'sheet_one');
        $file->header($fileHeader);
        
         for($i=0; $i < count($dados['rows']); $i++){
            for($j=0; $j < count($dados['rows'][$i]); $j++){
                $file->insertText($i+1, $j, $dados['rows'][$i][$j]);
            }
         }

        $output = $file->output();
        echo $output;
    }
}else{

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
<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die("Acesso negado.");
    }else{

        if(!is_dir('../../downloads/segurados')){
            mkdir('../../downloads/segurados');
            chmod('../../downloads/segurados', 0777);
        }

        $configs = [
            'path' => '../../downloads/segurados'
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
        $file = $xlsHandler->fileName('relatorio_segurados_'.date('d-m-Y').'.xlsx', 'sheet_one');
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

    if($data['assurances']){
        foreach($data['assurances'] as $assurance => $item){
            if(date('m', strtotime($item->data_vencimento)) != date('m') && $item->status == 1){
                unset($data['assurances'][$assurance]);
            }elseif(date('m', strtotime($item->data_vencimento)) < date('m') && $item->status == 0 && date('Y', strtotime($item->data_vencimento)) <= date('Y')){
                $data['assurances'][$assurance]->status = '<span class="badge badge-danger">ATRASADO</span>';
            }elseif(date('m', strtotime($item->data_vencimento)) == date('m') && $item->status == 0 && date('Y', strtotime($item->data_vencimento)) == date('Y')){
                $data['assurances'][$assurance]->status = '<span class="badge badge-secondary">ABERTO</span>';
            }elseif(date('m', strtotime($item->data_vencimento)) == date('m') && $item->status == 1 && date('Y', strtotime($item->data_vencimento)) == date('Y')){
                $data['assurances'][$assurance]->status = '<span class="badge badge-success">PAGO</span>';
            }elseif(date('m', strtotime($item->data_vencimento)) > date('m') || date('Y', strtotime($item->data_vencimento)) > date('Y')){
                unset($data['assurances'][$assurance]);
            }
        }
    }

    if(isset($data)){
        $smarty->assign('data', (object)$data);
    };
}
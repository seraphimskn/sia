<?php 

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

$data = array();

if(isset($qrModule->model->model)){
    include_once $qrModule->model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

//loads the qrCode library
$load->setLibs($config_vars->libs_path.'/phpqrcode', 'qrlib', 'qrCode');
include_once $load->getLib('qrCode');

if(isset($data) && !is_null($data)){

    foreach($data as $user){
        if(isset($user->user_hash)){
            if(strstr($user->user_hash, md5('titular'))){
                $data['userData']->categoria = 'Titular';
            }elseif(strstr($user->user_hash, md5('dependente'))){
                $data['userData']->categoria = 'Dependente';
            };
        }
        if(isset($user->data_nascimento)){
            $data['userData']->data_nascimento = date('d/m/Y', strtotime($user->data_nascimento));
        }
        if(isset($user->cpf_cnpj)){
            $cpf = '';
            if(strlen($user->cpf_cnpj) == 11){
                for($i = 0; $i < strlen($user->cpf_cnpj); $i++){
                    if($i < 2){
                        $cpf .= $user->cpf_cnpj[$i];
                    }elseif($i == 2){
                        $cpf .= $user->cpf_cnpj[$i].'.';
                    }elseif($i > 2 && $i < 5){
                        $cpf .= $user->cpf_cnpj[$i];
                    }elseif($i == 5){
                        $cpf .= $user->cpf_cnpj[$i].'.';
                    }elseif($i > 5 && $i < 8){
                        $cpf .= $user->cpf_cnpj[$i];
                    }elseif($i == 8){
                        $cpf .= $user->cpf_cnpj[$i].'-';
                    }elseif($i > 8){
                        $cpf .= $user->cpf_cnpj[$i];
                    }
                }
            }elseif(strlen($user->cpf_cnpj) == 14){
                for($i = 0; $i < strlen($user->cpf_cnpj); $i++){
                    if($i < 1){
                        $cpf .= $user->cpf_cnpj[$i];
                    }elseif($i == 1){
                        $cpf .= $user->cpf_cnpj[$i].'.';
                    }elseif($i > 1 && $i < 4){
                        $cpf .= $user->cpf_cnpj[$i];
                    }elseif($i == 4){
                        $cpf .= $user->cpf_cnpj[$i].'.';
                    }elseif($i > 4 && $i < 7){
                        $cpf .= $user->cpf_cnpj[$i];
                    }elseif($i == 7){
                        $cpf .= $user->cpf_cnpj[$i].'/';
                    }elseif($i > 7 && $i < 11){
                        $cpf .= $user->cpf_cnpj[$i];
                    }elseif($i == 11){
                        $cpf .= $user->cpf_cnpj[$i] . '-';
                    }elseif($i > 11){
                        $cpf .= $user->cpf_cnpj[$i];
                    }
                }
            }
            $data['userData']->cpf_cnpj = $cpf;
        }
        if(isset($user->telefone)){
            $tel = '(';
            if(strlen($user->telefone) == 11){
                for($i = 0; $i < strlen($user->telefone); $i++){
                    if($i < 1){
                        $tel .= $user->telefone[$i];
                    }elseif($i == 1){
                        $tel .= $user->telefone[$i] .')';
                    }elseif($i > 1 && $i < 6){
                        $tel .= $user->telefone[$i];
                    }elseif($i == 6){
                        $tel .= $user->telefone[$i].'-';
                    }elseif($i > 6){
                        $tel .= $user->telefone[$i];
                    }
                }
            }elseif(strlen($user->telefone) == 10){
                for($i = 0; $i < strlen($user->telefone); $i++){
                    if($i < 1){
                        $tel .= $user->telefone[$i];
                    }elseif($i == 1){
                        $tel .= $user->telefone[$i] .')';
                    }elseif($i > 1 && $i < 5){
                        $tel .= $user->telefone[$i];
                    }elseif($i == 5){
                        $tel .= $user->telefone[$i].'-';
                    }elseif($i > 5){
                        $tel .= $user->telefone[$i];
                    }
                }
            }
            $data['userData']->telefone = $tel;
        }
        if(isset($user->data_vencimento)){
            $data['userData']->data_vencimento = date('d/m/Y', strtotime($user->data_vencimento));
        }
    }
}

//creating the qrCode to render on webviewing
//configurating the qrCode
$dataText = 'userhash: ' . $data['hash']->user_hash;
$tempDir = 'uploads/users/'.$_SESSION['userID'];
$fileName = 'user_'.$_SESSION['userID'].'_qrCode.png';
$pngAbsolutePath = $tempDir.'/'.$fileName;

if(!is_dir($tempDir)){
    mkdir($tempDir, 0777, true);
}
if(!file_exists($pngAbsolutePath)){
    QRcode::png($dataText, $pngAbsolutePath, QR_ECLEVEL_L, 4);
}
//creating the qrCode

$smarty->assign('qrcode', '<img src="'.$pngAbsolutePath.'" />');
$smarty->assign('user', $data['userData']);
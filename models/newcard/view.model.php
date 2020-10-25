<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
Use PHPMailer\PHPMailer\SMTP;

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die("Acesso negado.");
    }else{

        //includes the ajax core
        include_once '../../system/core/class.Ajax.php';
        
        $ajax = new AJAX();
        
        //var_dump($ajax);
        //includes the ajax model
        $ajax->setInclude('SYSTEM_CORE', 'Model');
        $ajax->setInclude('SYSTEM_LIB', 'config.ajax.database');
        $ajax->setInclude('SYSTEM_LIB', 'PHPMailer', 'PHPMailer');
        $ajax->setInclude('SYSTEM_LIB', 'Exception', 'PHPMailer');
        $ajax->setInclude('SYSTEM_LIB', 'SMTP', 'PHPMailer');

        //recover the ajax includes
        $includes = $ajax->getIncludes();

        include_once '../../'.$includes[0];       

        foreach($includes as $include){  
            if(file_exists('../../'.$include)){
                include_once '../../'.$include.'';            
            }else{
                echo $include.';'.PHP_EOL;
            }
        }

        $ajax_model = new Model();
        
        $ajax_model->setConnParams($ajax_configs->dsn, $ajax_configs->dbUser, $ajax_configs->dbPwd);

        $searchUser = $ajax_model->select($ajax_configs->tablePrefix.'usuarios', null, array('id' => $_POST['id']))[0];
        $searchContrato = $ajax_model->select($ajax_configs->tablePrefix.'contratos', array('data_vencimento'), array('id' => $_POST['id']))[0];

        $email = $searchUser->email;

        $new_cpf = '';
        for($i = 0; $i < strlen($searchUser->cpf_cnpj); $i++){
            if($i < 2){
                $new_cpf .= $searchUser->cpf_cnpj[$i];
            }elseif($i == 2){
                $new_cpf .= $searchUser->cpf_cnpj[$i].'.';
            }elseif($i > 2 && $i < 5){
                $new_cpf .= $searchUser->cpf_cnpj[$i];
            }elseif($i == 5){
                $new_cpf .= $searchUser->cpf_cnpj[$i].'.';
            }elseif($i > 5 && $i < 8){
                $new_cpf .= $searchUser->cpf_cnpj[$i];
            }elseif($i == 8){
                $new_cpf .= $searchUser->cpf_cnpj[$i].'-';
            }elseif($i > 8){
                $new_cpf .= $searchUser->cpf_cnpj[$i];
            }
        }

        $ajax_mailing = new PHPMailer;

        $body  = '<p>O usuário '.$searchUser->nome.' solicitou uma segunda via de sua carteirinha de associado.</p>';
        $body .= '<p>Dados a serem enviados para confecção do cartão:</p>';
        $body .= '<ul><li>Nome: '.$searchUser->nome.'</li>';
        $body .= '<li>Data de Nascimento: '.date('d/m/Y', strtotime($searchUser->data_nascimento)).'</li>';
        $body .= '<li>CPF: '.$new_cpf.'</li>';
        $body .= '<li>Data de Vencimento do Contrato: '.date('d/m/Y', strtotime($searchContrato->data_vencimento)).'</li>';
        $body .= '<li>QRCode: '.$searchUser->user_hash.'</li></ul>';
        $to    = 'luiz_jcdeus@hotmail.com';
        $from  = 'luiz@vixsystem.com.br';

        try{
            $ajax_mailing->setFrom('no-reply@medserrana.com.br', 'Confirmação de Cadstro MedSerrana');
            $ajax_mailing->addAddress($email);
            $ajax_mailing->isHTML(TRUE);
            $ajax_mailing->isSMTP(TRUE);
            $ajax_mailing->CharSet = 'utf-8';
            $ajax_mailing->Encoding = 'base64';
            $ajax_mailing->SMTPAuth = true;
            $ajax_mailing->SMTPDebug = 0;
            $ajax_mailing->SMTPSecure = false;
            $ajax_mailing->Host = 'mail.medserrana.com.br';
            //$mailing->SMTPSecure = 'ssl';
            $ajax_mailing->Port = 587;
            $ajax_mailing->Username = 'no-reply@medserrana.com.br';
            $ajax_mailing->Password = 'med@12345#1qaz%%&*';
            $ajax_mailing->Subject = 'Seu cadastro no sistema MedSerrana';
            $ajax_mailing->Body = $body;
            if(!$ajax_mailing->send()){
                $data['error'][] = $ajax_mailing->ErrorInfo;
                $data['sent'] = 0;
            }else{
                $data['sent'] = 1;
            }
        }catch (Exception $e){
            $data['error'][] = $e->errorMessage();
            $data['sent'] = 0;
        }catch (\Exception $e){
            $data['error'][] = $e->getMessage();
            $data['sent'] = 0;
        }
        echo json_encode($data);
    }
}else{

    
}



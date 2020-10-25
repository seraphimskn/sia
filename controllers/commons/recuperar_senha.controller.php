<?php

/**
 * REQ MED-39-3.1 -- LOGIN
 * 
 * Related:
 * 
 * file                                   type
 * recuperar_senha.controller.php         controller
 * recuperar_senha.model.php              model
 * recuperar_senha.view.php               view
 * class.Controller.php                   system core
 * class.Model.php                        system core
 * class.Load.php                         system core
 * class.Router.php                       system core
 */

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//initialize $data
$data = array();

//model archive inclusion
if($the_model->error == 0){
    include_once $the_model->model;
}else{
    echo 'Houve um erro e o arquivo de dados não pode ser carregado. Entre em contato com o administrador do sistema.';
}

if(isset($data) && is_array($data)){
    
    if(isset($data['user']) && $data['user'] != null){

        $hash = md5(sha1($data['user']->senha . date('d-m-Y H:i:s') . rand(0, 9999)));

        $link = 'http://localhost/medv01/nova_senha/';

        $recover_file = 'system/temp/recover_'.$hash.'_'.date('Y-m-d').'_'.date('H_i_s').'.txt';

        $text  = 'Usuário: '. $data['user']->nome . PHP_EOL;
        $text .= 'Login: '. $data['user']->cpf_cnpj . PHP_EOL;
        $text .= 'Data da Solicitação: '. date('d/m/Y H:i:s') . PHP_EOL;

        $handler = fopen($recover_file, 'a+');

        if(fwrite($handler, $text)){
            fclose($handler);

            $body  = '<p>Clique no link abaixo para redefinir sua senha.</p>';
            $body .= '<a href="'.$link.$hash.'">Redefinir Senha</a>';
            $to    = $data['user']->email;
            $from  = 'luiz@vixsystem.com.br';

            try{
                $mailing->setFrom($from, 'Sistema de Gestão Integrada');
                $mailing->addAddress($to);
                $mailing->isHTML(TRUE);
                $mailing->isSMTP(TRUE);
                $mailing->Host = 'mail.vixsystem.com.br';
                $mailing->Port = 465;
                $mailing->SMTPAuth = TRUE;
                $mailing->SMTPSecure = 'ssl';
                $mailing->Username = 'luiz@vixsystem.com.br';
                $mailing->Password = 'N0f34rt0dy1ng';
                $mailing->SMTPDebug = 0;
                $mailing->Subject = 'Redefinição de Senha';
                $mailing->Body = $body;
                if(!$mailing->send()){
                    $data['error'][] = $mailing->ErrorInfo;
                }else{
                    $data['sent'] = true;
                }
            }catch (Exception $e){
                $data['error'][] = $e->errorMessage();
            }catch (\Exception $e){
                $data['error'][] = $e->getMessage();
            }

        };
        
    }else{

        $data['error'] = false;

    }

}

if(isset($data)){
    $smarty->assign('data', $data);
}
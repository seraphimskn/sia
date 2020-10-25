<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//secure check
if(!isset($config_vars)){
    if(!isset($_POST['send'])){
        die("Acesso negado.");
    }else{
        
        //includes the ajax core
        include_once '../../system/core/class.Ajax.php';
        
        $ajax = new AJAX();
        
        //includes the ajax model
        $ajax->setInclude('SYSTEM_CORE', 'Model');
        $ajax->setInclude('SYSTEM_LIB', 'Exception', 'PHPMailer');
        $ajax->setInclude('SYSTEM_LIB', 'PHPMailer', 'PHPMailer');
        $ajax->setInclude('SYSTEM_LIB', 'SMTP', 'PHPMailer');
        $ajax->setInclude('SYSTEM_LIB', 'config.ajax.database');

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

        $ajax_mailing = new PHPMailer(true);

        $ajax_model = new Model();
        
        $ajax_model->setConnParams($ajax_configs->dsn, $ajax_configs->dbUser, $ajax_configs->dbPwd);

        if(isset($_POST) && !isset($_POST['id_convenio'])){
            
            extract($_POST);
            
            $check = $ajax_model->select($ajax_configs->tablePrefix.'usuarios', array('id'), array('cpf_cnpj' => $cpf_cnpj));
            if(count($check) >= 1){
                die('Este CPF/CNPJ já foi cadastrado!');
            }

            if(!isset($_POST['ativo']) || $_POST['ativo'] == '' || empty($_POST['ativo']) || is_null($_POST['ativo'])){
                $_POST['ativo'] = 0;
            }

            unset($_POST['send']);
            unset($_POST['nivel']);
            unset($_POST['bairro']);
            unset($_POST['cep']);
            unset($_POST['forma']);
            unset($_POST['valor']);

            if(empty($_POST['profissao']) || $_POST['profissao'] == '') $_POST['profissao'] = '-';
            if(empty($_POST['convenio']) || $_POST['convenio'] == '') $_POST['convenio'] = 0;
            if(empty($_POST['desconto']) || $_POST['desconto'] == '') $_POST['desconto'] = 0;
            if(empty($_POST['id-titular']) || $_POST['id-titular'] == '') unset($_POST['id-titular']);
            if($_POST['categoria'] == 'titular'){
                $_POST['user_hash'] = md5(base64_encode(sha1($_POST['nome']))).'#'.md5($_POST['senha']).'#'.md5('titular').'#';
                unset($_POST['id-titular']);
            }elseif($_POST['categoria'] == 'dependente'){
                $dependentes = $ajax_model->searchLike($ajax_configs->tablePrefix.'usuarios', array('id'), 'user_hash', '#'.md5('titular').'#'.$_POST['id-titular']);
                $_POST['user_hash'] = md5(base64_encode(sha1($_POST['nome']))).'#'.md5($_POST['senha']).'#'.md5('dependente').'#'.$_POST['id-titular'].'#'.str_pad((count($dependentes)+1), 2, '0', STR_PAD_LEFT);
                unset($_POST['id-titular']);
            }elseif($_POST['categoria'] == ''){
                $_POST['user_hash'] = md5(base64_encode(sha1($_POST['nome']))).'#'.md5($_POST['senha']);
                unset($_POST['id-titular']);
                unset($_POST['categoria']);
            }
            
            $_POST['id_nivel'] = $nivel;
            $_POST['data_cadastro'] = date('Y-m-d H:i:s');
            $_POST['data_nascimento'] = date('Y-m-d', strtotime($_POST['data_nascimento']));
            $_POST['senha'] = md5(sha1($senha));
            $_POST['cpf_cnpj'] = str_replace('.', '', str_replace('-', '', str_replace('/', '', $_POST['cpf_cnpj'])));
            $_POST['endereco'] = $endereco . ' / ' . $bairro . ' / ' . $cep;
        
            $data_cobranca = $_POST['data_cobranca'];
            
            if($_POST['vendedor'] == '' || is_null($_POST['vendedor'] || empty($_POST['vendedor']))){
                $vendedor = $_POST['vendedorLogado'];
                unset($_POST['vendedorLogado']);
            }else{
                $vendedor = $_POST['vendedor'];
                unset($_POST['vendedorLogado']);
            }

            if($_POST['contrato'] != ''){
                $id_contrato = $_POST['contrato'];
                unset($_POST['contrato']);
            }else{
                unset($_POST['contrato']);
            }
            
            unset($_POST['vendedor']);
            unset($_POST['data_cobranca']);

            if($nivel != 3 && $nivel != 4){
                $_POST['convenio'] = '-';
                $_POST['categoria'] = '-';
                $_POST['ativo'] = 1;           
            }

            if(isset($_FILES['imagem'])){
                
                $add = $ajax_model->add($ajax_configs->tablePrefix.'usuarios', $_POST);

                if($add){
                    $id = $ajax_model->getLastId();
                    if(($_POST['categoria'] == 'titular' && $_POST['id_nivel'] == 3) || $_POST['id_nivel'] == 4){
                        $contrato_param = array(
                            'id_usuario' => $id,
                            'id_vendedor' => $vendedor,
                            'data_venda' => date('Y-m-d'),
                            'data_cobranca' => $data_cobranca,
                            'data_vencimento' => date('Y-m-d', strtotime('+1 year')),
                            'ativo' => 1,
                            'link' => ''
                        );

                        if(isset($id_contrato)){
                            $update_contrato = $ajax_model->update($ajax_configs->tablePrefix.'contratos', $contrato_param, $id_contrato);
                            if(!$update_contrato){
                                die('Houve um erro! Contato o administrador do sistema!');
                            }
                            if(isset($forma) && $forma == 'folha'){
                                for($i = 0; $i < 12; $i++){

                                    $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                    
                                    $pagamentos_param = array(
                                        'id_contrato' => $id_contrato,
                                        'valor' => $valor,
                                        'data_vencimento' => $data_vencimento
                                    );

                                    $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                    
                                    if(!$add_pagamento){
                                        die('Houve um erro! Contate o administrador do sistema!');
                                    }
                                }
                            }elseif(isset($forma) && $forma == 'cartao'){
                                for($i = 0; $i < 12; $i++){

                                    $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                    
                                    $pagamentos_param = array(
                                        'id_contrato' => $id_contrato,
                                        'valor' => $valor,
                                        'data_vencimento' => $data_vencimento
                                    );

                                    $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                    
                                    if(!$add_pagamento){
                                        die('Houve um erro! Contate o administrador do sistema!');
                                    }
                                }
                            }elseif(isset($forma) && $forma == 'boleto'){
                                for($i = 0; $i < 12; $i++){

                                    $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                    
                                    $pagamentos_param = array(
                                        'id_contrato' => $id_contrato,
                                        'valor' => $valor,
                                        'data_vencimento' => $data_vencimento
                                    );

                                    $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                    
                                    if(!$add_pagamento){
                                        die('Houve um erro! Contate o administrador do sistema!');
                                    }
                                }
                            }
                        }else{
                            $add_contrato = $ajax_model->add($ajax_configs->tablePrefix.'contratos', $contrato_param);
                            if(!$add_contrato){
                                die('Houve um erro! Contate o administrador do sistema!');
                            }else{
                                if(isset($forma) && $forma == 'folha'){
                                    $id_contrato = $ajax_model->getLastId();
                                    for($i = 0; $i < 12; $i++){

                                        $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                        
                                        $pagamentos_param = array(
                                            'id_contrato' => $id_contrato,
                                            'valor' => $valor,
                                            'data_vencimento' => $data_vencimento
                                        );

                                        $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                        
                                        if(!$add_pagamento){
                                            die('Houve um erro! Contate o administrador do sistema!');
                                        }
                                    }
                                }elseif(isset($forma) && $forma == 'cartao'){
                                    $id_contrato = $ajax_model->getLastId();
                                    for($i = 0; $i < 12; $i++){

                                        $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                        
                                        $pagamentos_param = array(
                                            'id_contrato' => $id_contrato,
                                            'valor' => $valor,
                                            'data_vencimento' => $data_vencimento
                                        );

                                        $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                        
                                        if(!$add_pagamento){
                                            die('Houve um erro! Contate o administrador do sistema!');
                                        }
                                    }
                                }elseif(isset($forma) && $forma == 'boleto'){
                                    $id_contrato = $ajax_model->getLastId();
                                    for($i = 0; $i < 12; $i++){

                                        $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                        
                                        $pagamentos_param = array(
                                            'id_contrato' => $id_contrato,
                                            'valor' => $valor,
                                            'data_vencimento' => $data_vencimento
                                        );

                                        $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                        
                                        if(!$add_pagamento){
                                            die('Houve um erro! Contate o administrador do sistema!');
                                        }
                                    }
                                }
                            }
                        }                        

                        $hash = $ajax_model->select($ajax_configs->tablePrefix.'usuarios', array('user_hash'), array('id' => $id))[0];
                        $user_hash = $hash->user_hash . $id . '#00';

                        $update_hash = $ajax_model->update($ajax_configs->tablePrefix.'usuarios', array('user_hash' => $user_hash), $id);
                    }
                }               

                if(isset($id) && !empty($id) && !is_null($id)){
                
                    $dir = '../../uploads/users/'.$id;
                    if(isset($_FILES['imagem']) && $_FILES['imagem']['type'] != 'image/jpeg'){
                        $response = array('msg' => 'Arquivo Inválido! Selecione um tipo de arquivo válido', 'response' => 0);
                    }else{
                        $name = str_replace(' ', '_', $_FILES['imagem']['name']);
                        $imagem = $name;
                        if(!is_dir($dir)){
                            if(mkdir($dir, 0777, true)){
                                if(move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.'/'.$name)){
                                    $imagem = $dir.'/'.$name;                                
                                };                            
                            }
                        }elseif(!file_exists($dir.'/'.$name)){
                            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.'/'.$name)){
                                $imagem = $dir.'/'.$name;                                
                            };
                        }else{
                            $name = explode('.', $name);
                            $name[0] = sha1($name[0]).'-'.md5(rand(0, strlen($name[0])));
                            $name = implode('.', $name);
                            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.'/'.$name)){
                                $imagem = $dir.'/'.$name;                                
                            };
                        }        
                    }
                    
                    $update = $ajax_model->update($ajax_configs->tablePrefix.'usuarios', array('imagem'=>str_replace('../../', '', $imagem)),$id);

                    $response = $add;                   
                }

            }else{                

                $_POST['id_nivel'] = $nivel;
                
                $add = $ajax_model->add($ajax_configs->tablePrefix.'usuarios', $_POST);
                
                if($add){
                    $id = $ajax_model->getLastId();
                    if(($_POST['categoria'] == 'titular' && $_POST['id_nivel'] == 3) || $_POST['id_nivel'] == 4){
                        $contrato_param = array(
                            'id_usuario' => $id,
                            'id_vendedor' => $vendedor,
                            'data_venda' => date('Y-m-d'),
                            'data_cobranca' => $data_cobranca,
                            'data_vencimento' => date('Y-m-d', strtotime('+1 year')),
                            'ativo' => 1,
                            'link' => ''
                        );
                        if(isset($id_contrato)){
                            $update_contrato = $ajax_model->update($ajax_configs->tablePrefix.'contratos', $contrato_param, $id_contrato);
                            if(!$update_contrato){
                                die('Houve um erro! Contato o administrador do sistema!');
                            }
                            if(isset($forma) && $forma == 'folha'){
                                for($i = 0; $i < 12; $i++){

                                    $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                    
                                    $pagamentos_param = array(
                                        'id_contrato' => $id_contrato,
                                        'valor' => $valor,
                                        'data_vencimento' => $data_vencimento
                                    );

                                    $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                    
                                    if(!$add_pagamento){
                                        die('Houve um erro! Contate o administrador do sistema!');
                                    }
                                }
                            }elseif(isset($forma) && $forma == 'cartao'){
                                for($i = 0; $i < 12; $i++){

                                    $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                    
                                    $pagamentos_param = array(
                                        'id_contrato' => $id_contrato,
                                        'valor' => $valor,
                                        'data_vencimento' => $data_vencimento
                                    );

                                    $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                    
                                    if(!$add_pagamento){
                                        die('Houve um erro! Contate o administrador do sistema!');
                                    }
                                }
                            }elseif(isset($forma) && $forma == 'boleto'){
                                for($i = 0; $i < 12; $i++){

                                    $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                    
                                    $pagamentos_param = array(
                                        'id_contrato' => $id_contrato,
                                        'valor' => $valor,
                                        'data_vencimento' => $data_vencimento
                                    );

                                    $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                    
                                    if(!$add_pagamento){
                                        die('Houve um erro! Contate o administrador do sistema!');
                                    }
                                }
                            }
                        }else{
                            $add_contrato = $ajax_model->add($ajax_configs->tablePrefix.'contratos', $contrato_param);
                            
                            if(!$add_contrato){
                                die('Houve um erro! Contate o administrador do sistema!');
                            }else{
                                if(isset($forma) && $forma == 'folha'){
                                    $id_contrato = $ajax_model->getLastId();
                                    for($i = 0; $i < 12; $i++){

                                        $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                        
                                        $pagamentos_param = array(
                                            'id_contrato' => $id_contrato,
                                            'valor' => $valor,
                                            'data_vencimento' => $data_vencimento
                                        );

                                        $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                        
                                        if(!$add_pagamento){
                                            die('Houve um erro! Contate o administrador do sistema!');
                                        }
                                    }
                                }elseif(isset($forma) && $forma == 'cartao'){
                                    $id_contrato = $ajax_model->getLastId();
                                    for($i = 0; $i < 12; $i++){

                                        $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                        
                                        $pagamentos_param = array(
                                            'id_contrato' => $id_contrato,
                                            'valor' => $valor,
                                            'data_vencimento' => $data_vencimento
                                        );

                                        $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                        
                                        if(!$add_pagamento){
                                            die('Houve um erro! Contate o administrador do sistema!');
                                        }
                                    }
                                }elseif(isset($forma) && $forma == 'boleto'){
                                    $id_contrato = $ajax_model->getLastId();
                                    for($i = 0; $i < 12; $i++){

                                        $data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m')+$i, $data_cobranca, date('Y')));
                                        
                                        $pagamentos_param = array(
                                            'id_contrato' => $id_contrato,
                                            'valor' => $valor,
                                            'data_vencimento' => $data_vencimento
                                        );

                                        $add_pagamento = $ajax_model->add($ajax_configs->tablePrefix.'pagamentos', $pagamentos_param);
                                        
                                        if(!$add_pagamento){
                                            die('Houve um erro! Contate o administrador do sistema!');
                                        }
                                    }
                                }
                            }
                        }

                        $hash = $ajax_model->select($ajax_configs->tablePrefix.'usuarios', array('user_hash'), array('id' => $id))[0];
                        $user_hash = $hash->user_hash . $id . '#00';

                        $update_hash = $ajax_model->update($ajax_configs->tablePrefix.'usuarios', array('user_hash' => $user_hash), $id);
                    }
               
                    $response = $add;

                }else{

                    $add = 0;
                    
                }
                
            }
            
            if($add != 0){

                //var_dump($senha);
    
                $body  = '<html><head></head><body><table>';
                $body .= '<tr>';
                $body .= '<td><h2>Seja Bem-Vindo!</h2></td>';
                $body .= '</tr>';
                $body .= '<tr>';
                $body .= '<td><p>Seu cadastro no sistema da MedSerrana foi completado! Agora você pode acessar o seu perfil <a href="https://www.medserrana.com.br/sigms" target="_blank">AQUI</a> e acompanhar suas compras além de outros benefícios ligados ao seu plano!</p></td>';
                $body .= '</tr>';
                $body .= '<tr>';
                $body .= '<td><p><strong>Seu Login: </strong>'.$cpf_cnpj.'</p></td>';
                $body .= '</tr>';
                $body .= '<tr>';
                $body .= '<td><p><strong>Sua Senha: </strong>'.$senha.'</p></td>';
                $body .= '</tr>';
                $body .= '<tr>';
                $body .= '<td><p>Você pode alterar seus dados como senha e contatos dentro do seu perfil!</p></td>';
                $body .= '</tr>';
                $body .= '<tr>';
                $body .= '<td><h2>É um prazer ter você conosco, obrigado por escolher a MedSerrana!</h2></td>';
                $body .= '</tr>';
                $body .= '</table></body></html>';
                //$body = utf8_encode($body);
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
    
                //var_dump($body);
            }

        }elseif(isset($_POST) && isset($_POST['id_convenio'])){

            $valor = $ajax_model->select($ajax_configs->tablePrefix.'planos', array('valor'), array('id'=>$_POST['id_convenio']))[0];
            
            if(count($valor) > 0){
                $add = $valor;
            }

        }else{
            $add = 0;            
        }
        
        

        echo json_encode($add);
        
    }
}else{

    $levels = $model->select($config_vars->tablePrefix.'niveis', array('*'), array('ativo' => 1));
    $plans = $model->select($config_vars->tablePrefix.'planos', null, array('ativo' => 1));
    $sellers = $model->select($config_vars->tablePrefix.'usuarios', null, array('id_nivel' => 5, 'ativo' => 1));
    $contracts = $model->select($config_vars->tablePrefix.'contratos', null, array('ativo' => 0));

}
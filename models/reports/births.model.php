<?php

ini_set('display_errors', 'Off');
error_reporting(E_ALL);

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//the reports queries
$births = $model->select($config_vars->tablePrefix.'usuarios', NULL, array('ativo' => 1), 'data_nascimento', 'ASC'); #active users birthday reports

//adjustments for the birthdays query
foreach($births as $birth => $month){
    if(!is_null($month->data_nascimento)){
        if(date('m', strtotime($month->data_nascimento)) != date('m')){
            unset($births[$birth]);
        }
    }else{
        unset($births[$birth]);
    }    
}

//passing the data controllers
if(count($births) > 0){
    $data['births'] = $births;
}else{
    $data['births'] = 'Não há aniversariantes este mês!';
}
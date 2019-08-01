<?php 

//secure the script
if(!isset($config_vars)){
    die('Acesso negado.');
}

//initialize the $data[] param
$data = array();

//the general common configs to all the pages
$the_configs = (object)$model->select($config_vars->tablePrefix.'configs');

foreach($the_configs as $config){
    $data['configs'][$config->config_name] = $config->config_value;
}

//retrieve the pages set
$the_pages = (object)$model->select($config_vars->tablePrefix.'pages', array('published'=>1), null, 'ASC');

foreach($the_pages as $page){
    $data['pages'][$page->page_slug] = $page;
}

<?php

$the_page = $model->select($config_vars->tablePrefix."pages", array("page_type"=>"programs"));

foreach($the_page as $page){
    
    $page->content = html_entity_decode($page->page_value);
    
    $page->options = json_decode($page->page_options);       
 
    foreach ($page->options->aditional as $modules){
        
        $module = (object)$controller->getController('modules/'.$modules);
       
        if(isset($module) && $module->error == 0){
            include_once $module->controller;
        }else{
            $smarty->assign('module_error_message', 'No controller assigned to the current module "'.$modules.'". Please contact system admin.');
        }
        
    }
    
    $smarty->assign('page', $page);
    
}
<?php 

$the_staffs = $model->select($config_vars->tablePrefix.'posts', array('post_type'=>'staff', 'published'=>1));

if($the_staffs >= 1){
    
    if(!isset($accents)){
        $accents = array(
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
            'é'=>'e', 'è'=>'e', 'ê'=>'e', 'ë'=>'e',
            'í'=>'i', 'ì'=>'i', 'î'=>'i', 'ï'=>'i',
            'ó'=>'o', 'ò'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o',
            'ú'=>'u', 'ù'=>'u', 'û'=>'u', 'ü'=>'u',
            'ç'=>'c'
        );
    }
    
    foreach ($the_staffs as $staff){
        $image_ids = explode(',', preg_replace('/[{}]+/', '', $staff->post_images));
        
        foreach ($image_ids as $id){
            $the_image = $model->select($config_vars->tablePrefix.'media', array('ID'=>$id));
            $staff->image = $the_image[0]->media_url;
        }
        
        $link = preg_replace('/\s+/', '_', $staff->post_title);
        
        foreach($accents as $key=>$value){
            
            if(function_exists('mb_strtolower')){
                $link = mb_strtolower($link, 'UTF-8');
            }else{
                $link = strtolower($link);
            }
            
            $link = str_ireplace($key, $value, utf8_decode($link));
            
        }
        
        $staff->excerpt = substr($staff->post_value, 0, 150).'...';
        
        $staff->link = $link;
        
        $staffs[] = $staff;
    }
    
    $smarty->assign('staffs', $staffs);
    
}else{
    $smarty->assign('staffs', 'No staff registered yet!');
}

//retrieves the values and the configs for the page
$the_page = $model->select($config_vars->tablePrefix."pages", array("page_type"=>"staff"));

if(isset($the_page) && count($the_page) > 0){
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
    
}
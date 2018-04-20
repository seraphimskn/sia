<?php 

//secure check
if(!isset($config_vars)){
    die('Acesso negado.');
}

//the for the pages
$the_pages = (object)$model->select($config_vars->tablePrefix.'pages', array('published'=>1), null, 'ASC');

foreach($the_pages as $page){
    $data['pages'][$page->page_slug] = $page;
    $page_options = (object)json_decode($page->page_options);
    
    if(isset($page_options->extensions) && $page_options->extensions !== ''){
        
        $the_page_extensions = (object)$model->select($config_vars->tablePrefix.'extensions', array('ID'=>$page_options->extensions));
        
        foreach($the_page_extensions as $page_extension){
            
            $ext[$page_extension->extension_type] = (object)$page_extension; 
            
        }
        
        echo '<pre>';
        //var_dump($ext);
        echo '</pre>';
        
    }
    
}
<?php 

$articles = $model->select($config_vars->tablePrefix."posts", array("post_type"=>"post", "published"=>1), 'created_on', 'DESC');

if($articles >= 1){
    
    if(!isset($accents)){
        $accents = array(
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
            'é'=>'e', 'è'=>'e', 'ê'=>'e', 'ë'=>'e',
            'í'=>'i', 'ì'=>'i', 'î'=>'i', 'ï'=>'i',
            'ó'=>'o', 'ò'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o',
            'ú'=>'u', 'ù'=>'u', 'û'=>'u', 'ü'=>'u',
            'ç'=>'c'
        );
    };
    
    foreach($articles as $the_post){
        
        $the_post->post_images  = json_decode($the_post->post_images);
        $the_post->excerpt      = substr($the_post->post_value, 0, 150).'...';
        $the_post->date         = preg_replace('/[\/]+/', ' de ', date_format(date_create($the_post->created_on), 'd/M/Y - H:i:s'));
        $author                 = json_decode($the_post->created_by);
        $the_post->post_options = json_decode($the_post->post_options);
        $the_post->author       = $model->select($config_vars->tablePrefix.'posts', array('post_type'=>$author->author->post_type, 'ID'=>$author->author->post_ID));
        $the_post->author_name       = $the_post->author[0]->post_title;
        
        $the_post->link = preg_replace('/\s+/', '_', $the_post->post_title);
        $the_post->author_link = preg_replace('/\s+/', '_', $the_post->author[0]->post_title);
        
        foreach($accents as $key=>$value){
            
            if(function_exists('mb_strtolower')){
                $the_post->link = mb_strtolower($the_post->link, 'UTF-8');
                $the_post->author_link = mb_strtolower($the_post->author_link, 'UTF-8');
            }else{
                $the_post->link = strtolower($the_post->link);
                $the_post->author_link = strtolower($the_post->author_link);
            }
            
            $the_post->link = str_ireplace($key, $value, utf8_decode($the_post->link));
            $the_post->author_link = str_ireplace($key, $value, utf8_decode($the_post->author_link));
            
        }
        
    }
    
    $smarty->assign('posts', $articles);
    
}

$the_page = $model->select($config_vars->tablePrefix."pages", array("page_type"=>"blog"));

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
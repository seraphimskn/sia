<?php 

//calls the Facebook Javascript SDK
$load->setScript($config_vars->scripts_path, 'facebook-sdk', 'facebook');
$smarty->assign('facebookSDK', $load->getScript('facebook'));

//calls the Twitter Javascript SDK
$load->setScript($config_vars->scripts_path, 'twitter-sdk', 'twitter');
$smarty->assign('twitterSDK', $load->getScript('twitter'));

$params = $router->getActions();

$the_article = $model->select($config_vars->tablePrefix.'posts', array('slug'=>$params[1]));

foreach($the_article as $post){
   
   $post->options               = json_decode($post->post_options);
   $post->date                  = preg_replace('/[\/]+/', ' de ', date_format(date_create($post->created_on), 'd/M/Y - H:i:s'));
   $author                      = json_decode($post->created_by);
   $post->author                = $model->select($config_vars->tablePrefix.'posts', array('post_type'=>$author->author->post_type, 'ID'=>$author->author->post_ID));
   $post->author_name           = $post->author[0]->post_title;
   $post->author_link           = $post->author[0]->slug;
   
   $smarty->assign('post', $post);
    
}

//the controller for the staffs module
$the_staffs = $model->select($config_vars->tablePrefix.'posts', array('post_type'=>'staff', 'published'=>1));

if($the_staffs >= 1){
    
    if(!isset($accents)){
        $accents = array(
            '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a',
            '�'=>'e', '�'=>'e', '�'=>'e', '�'=>'e',
            '�'=>'i', '�'=>'i', '�'=>'i', '�'=>'i',
            '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o',
            '�'=>'u', '�'=>'u', '�'=>'u', '�'=>'u',
            '�'=>'c'
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

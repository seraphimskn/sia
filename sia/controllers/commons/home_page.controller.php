<?php 

//calls the Facebook Javascript SDK
$load->setScript($config_vars->scripts_path, 'facebook-sdk', 'facebook');
$smarty->assign('facebookSDK', $load->getScript('facebook'));

//set the namespace Facebook
use Facebook\Facebook;

//calls the Facebook library
$load->setLibs('system/libs/facebook', 'autoload', 'facebook');

//include the Facebook library
require_once $load->getLib('facebook');

/** sets the Facebook object 
 *  
 *  TODO: create the facebook configs on the table
 * 
 * @var \Facebook\Facebook $fb
 */
$fb = new Facebook([
        'app_id' => '1915539438668479',
        'app_secret' => '9410bc8bf4829753a9d599942fba4ab6',
        'default_graph_version' => 'v2.12'
]);

//sets the API access token
$fb->setDefaultAccessToken($fb->getApp()->getAccessToken());

$streaming = $model->select($config_vars->tablePrefix.'configs', array('config_name'=>'streaming'));

if(count($streaming) >= 1){
    $smarty->assign('streamingUrl', $streaming->config_value);
    $smarty->assign('streamingButton', 'uploads/radio-listen-home.png');
}else{
    $smarty->assign('streamingUrl', '#');
    $smarty->assign('streamingButton', 'uploads/radio-listen-offair.png');
}

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

$the_posts = $model->select($config_vars->tablePrefix.'posts', array('post_type'=>'post', 'published'=>1), 'created_on', 'DESC');

if($the_posts >= 1){
    
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
    
    foreach($the_posts as $the_post){
        
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
    
    $smarty->assign('posts', $the_posts);
    
}

//retrieves the featured-video
$the_video = $model->select($config_vars->tablePrefix.'posts', array('post_type'=>'video'), 'created_on', 'DESC');

if($the_video >= 1){
    $smarty->assign('video', $the_video[0]);
}else{
    $smarty->assign('video', 'No videos subscribed!');
}

//retrieves the most_readed articles
$most_readed = $model->select($config_vars->tablePrefix.'posts', array('post_type'=>'post', 'published'=>1), 'post_clicks', 'DESC');

if($most_readed >= 1){
    foreach($most_readed as $news){
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
        
            $news->post_images  = json_decode($news->post_images);
            $news->excerpt      = substr($news->post_value, 0, 150).'...';
            $news->date         = preg_replace('/[\/]+/', ' de ', date_format(date_create($news->created_on), 'd/M/Y - H:i:s'));
            $news_author        = json_decode($news->created_by);
            $news->post_options = json_decode($news->post_options);
            $news->author       = $model->select($config_vars->tablePrefix.'posts', array('post_type'=>$news_author->author->post_type, 'ID'=>$news_author->author->post_ID));
            $news->author_name  = $news->author[0]->post_title;
            
            $news->link = preg_replace('/\s+/', '_', $news->post_title);
            $news->author_link = preg_replace('/\s+/', '_', $news->author[0]->post_title);
            
            foreach($accents as $key=>$value){
                
                if(function_exists('mb_strtolower')){
                    $news->link = mb_strtolower($news->link, 'UTF-8');
                    $news->author_link = mb_strtolower($news->author_link, 'UTF-8');
                }else{
                    $news->link = strtolower($news->link);
                    $news->author_link = strtolower($news->author_link);
                }
                
                $news->link = str_ireplace($key, $value, utf8_decode($news->link));
                $news->author_link = str_ireplace($key, $value, utf8_decode($news->author_link));
                
            }
            
    }
    
    $smarty->assign('most_readed', $most_readed);
}else{
    $smarty->assign('most_readed', 'No posts have most readers!');
}
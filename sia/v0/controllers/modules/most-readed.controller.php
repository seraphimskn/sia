<?php 

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
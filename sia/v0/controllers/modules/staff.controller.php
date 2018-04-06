<?php 

//the controller for the staffs module 
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
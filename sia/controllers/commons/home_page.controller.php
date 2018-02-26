<?php 

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
    foreach ($the_staffs as $staff){
        $image_ids = explode(',', preg_replace('/[{}]+/', '', $staff->post_images));
        //var_dump($image_ids);
        foreach ($image_ids as $id){
            $the_image = $model->select($config_vars->tablePrefix.'media', array('ID'=>$id));
            $staff->image = $the_image[0]->media_url;
        }
        
        $staffs[] = $staff;
    }
    
    $smarty->assign('staffs', $staffs);
    
}else{
    $smarty->assign('staffs', 'No staff registered yet!');
}
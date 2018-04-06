<?php 

//retrieves the video post
$the_video = $model->select($config_vars->tablePrefix.'posts', array('post_type'=>'video'), 'created_on', 'DESC');

if($the_video >= 1){
    $smarty->assign('video', $the_video[0]);
}else{
    $smarty->assign('video', 'No videos subscribed!');
}


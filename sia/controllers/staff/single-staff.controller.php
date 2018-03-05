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
   $image_id                    = preg_replace('/[{}]+/', '', $post->post_images);
   $post_image                  = $model->select($config_vars->tablePrefix.'media', array('ID'=>$image_id));
   $post->image                 = $post_image[0]->media_url;
   
   $smarty->assign('post', $post);    
}

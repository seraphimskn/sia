<?php 

//calls the Facebook Javascript SDK
$load->setScript($config_vars->scripts_path, 'facebook-sdk', 'facebook');
$smarty->assign('facebookSDK', $load->getScript('facebook'));
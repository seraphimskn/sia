<?php 

//retrieves the initial configs for the template
$the_configs = $model->select($config_vars->tablePrefix.'configs');

//assign the configs to the $configs variable
foreach ($the_configs as $config){
    $smarty->assign(str_ireplace('-', '_', $config->config_name), $config->config_value); #default template configs
}

$logo_title = $model->select($config_vars->tablePrefix.'media', array('media_name'=>'logo'));

if(count($logo_title) !== 0){
    $smarty->assign('logo_title', $logo_title[0]->media_title);
}else{
    $smarty->assign('logo_title', $the_configs->logo->config_value);
}

//load the headers variable
if(true === $styles->error){
    $smarty->assign('styles', 'Can\'t load the stylesheets! Contact the system administrator.');
}else{
    $smarty->assign('styles', $styles->styles); #styles
}
if(true === $scripts->error){
    $smarty->assign('scripts', 'Can\'t load the scripts! Contact the system administrator.');
}else{
    $smarty->assign('scripts', $scripts->scripts); #scripts
}

//set the base href
$smarty->assign('baseHREF', '/bandnews/site/');

//arrays with the portughese date translation
$pDay = array(
    'Domingo', 
    'Segunda-Feira',
    'Terça-Feira',
    'Quarta-Feira',
    'Quinta-Feira',
    'Sexta-Feira',
    'Sábado'
);

$pMonth = array(
    'Janeiro',
    'Fevereiro',
    'Março',
    'Abril',
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Novembro',
    'Dezembro'
);

//assign the translate to currents day and month
$l = $pDay[date('w')];
$m = $pMonth[date('m')-1];

//assing the tpl_var for date
$smarty->assign('date', $l.', '.date('d').' de '. $m .' de '.date('Y'));

//iterates and create the main_menu tpl_var
$the_menu = $model->select($config_vars->tablePrefix.'configs', array('config_name'=>'primary-menu'));

//check if there is records on the database
if(count($the_menu) !== 0){
    
    //pattern to replace on the slug
    $accents = array(
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
        'é'=>'e', 'è'=>'e', 'ê'=>'e', 'ë'=>'e',
        'í'=>'i', 'ì'=>'i', 'î'=>'i', 'ï'=>'i',
        'ó'=>'o', 'ò'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o',
        'ú'=>'u', 'ù'=>'u', 'û'=>'u', 'ü'=>'u',
        'ç'=>'c'
    );
    
    //retrieves the pages ID's from the menu config value
    $pages_id = explode(',', preg_replace('/[{}]/', '', $the_menu[0]->config_value));
    
    //retrieves the pages properties to construct the nav item
    foreach($pages_id as $id){
        
        foreach($model->select($config_vars->tablePrefix.'pages', array('ID'=>$id)) as $result){
            
            //starts the slugfy of the page link
            if(function_exists('mb_strtolower')){
                $pageLowCase = mb_strtolower($result->page_title, 'UTF-8');
            }else{
                $pageLowCase = strtolower($result->page_title);
            }
            
            $pageLowCase = preg_replace('/\s+/', '_', $pageLowCase);
            
            $pageLowCase = utf8_decode($pageLowCase);
            
            foreach($accents as $key => $value){
                
                $pageLowCase = str_replace($key, $value, $pageLowCase);
                
            }
            
            //creates the link object
            $link[$pageLowCase] = (object)array('page'=>$result->page_title, 'slug' => $pageLowCase);
            
        }
    
    }
    
    $smarty->assign('navItem', $link);

}else{
    
    $smarty->assign('navItem', 'There is no menu created for this site! Contact the system administrator.');
    
}

// retrieves the banner options for the homepage slidehshow banner
$the_banner = $model->select($config_vars->tablePrefix.'options', array('option_name'=>'slideshow', 'option_for'=>'home-page'));

// searchs for the medias to show on the slideshow
if(count($the_banner) !== 0){
    
    // crate an array of values to search for the medias
    $banner_image_ids = explode(',', preg_replace('/[{}]/', '', $the_banner[0]->option_value));
    
    // search the medias data on the database
    foreach($banner_image_ids as $id){
        
        foreach($model->select($config_vars->tablePrefix.'media', array('ID'=>$id)) as $image){
            
            // fetches all the images linked to the banner
            $images[$image->media_name] = (object)array(
                'the_name'  => $image->media_name, 
                'the_title' => $image->media_title,
                'the_path'  => $image->media_url,  
            );
              
        }
        
    }
    
    // create the banner images object
    $smarty->assign('bannerSlideImage', $images);
    
}else{
    
    $smarty->assign('bannerSlideImage', 'Theres no image assosciated with this banner.');
    
}

// retrieves the path to the radio livestream

$the_livestream = $model->select($config_vars->tablePrefix.'configs', array('config_name'=>'streaming'));

// assign the streaming url to a tpl_var
if(count($the_livestream) !== 0 ){
    
    $smarty->assign('streaming', $the_livestream[0]->config_value);
    
}else{
    
    $smarty->assign('streaming', '');
    
}


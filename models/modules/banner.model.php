<?php 

//secure check
if(!isset($config_vars)){
    die('Acesso negado.');
}

//retrieves the data source from the DB
//a static banner wiht one image
$static_banner = $model->select($config_vars->tablePrefix.'extensions', array('extension_type'=>'banner', 'published'=>1));

if(isset($static_banner) && $static_banner !== 0){
    foreach($static_banner as $banner){
        if(is_array($banner)){
            foreach($banner as $item){
                $data['banners'][] = $item;
            }
        }else{
            $data['banners'] = $banner;
        }
    }
}

//a slideshow banner
$slideshow_banner = $model->select($config_vars->tablePrefix.'extensions', array('extension_type'=>'slideshow', 'published'=>1));

if(isset($slideshow_banner) && $slideshow_banner !== 0){
    foreach($slideshow_banner as $slideshow){
        if(is_array($slideshow)){
            foreach($slieshow as $item){
                $data['slideshows'][] = $item;
            }
        }else{
            $data['slideshows'] = $slideshow;
        }
    }
}
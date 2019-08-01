<?php 

//secure the system
if(!isset($config_vars)){
    die('Acesso negado.');
}

//initialize the $data holder
$data = array();

$the_home = (object)$model->select($config_vars->tablePrefix.'pages', array('page_slug'=>'home_page'));

if(isset($the_home) && count($the_home) !== 0){
    
    foreach($the_home as $home){
        $data['home']['content'] = $home->page_value;
        $the_options = (object)json_decode($home->page_options);
    }
    
}

if(isset($the_options)){
    
    foreach($the_options as $option => $value){
        if($option == 'extensions'){
            
            //select the extensions
            if(is_array($value)){
                foreach($value as $extension_id){
                    $the_extensions[] = (object)$model->select($config_vars->tablePrefix.'extensions', array('ID'=>$extension_id));
                }
            }else{
                $the_extensions = (object)$model->select($config_vars->tablePrefix.'extensions', array('ID'=>$value));
            }
            
            //distribute the extensions in an array
            foreach($the_extensions as $extension){
                if(is_array($extension)){
                    
                }else{
                    if($extension->extension_type == 'banner' || $extension->extension_type == 'slideshow'){
                        $extension_link[$extension->extension_type] = (object)array('module'=>'banner', 'id'=>$extension->ID);                         
                    }else{
                        $extension_link[$extension->extension_type] = (object)array('link'=>$extension->extension_type,'id'=>$extension->ID);
                    }
                }
                $data['home']['extensions'] = (object)$extension_link;
            }            
        }else{
            $data['home'][$option] = $value;
        }
    }
    
}



<?php 

//secure check
if(!isset($config_vars)){
    die("Acesso negado.");
}

//start the $data
$data = array();

//selecting all medias
$the_medias = $model->select($config_vars->tablePrefix.'media', null, 'uploaded_on', 'DESC');

if(isset($the_medias) && $the_medias >= 1){
    foreach($the_medias as $media){
        $data['medias'][] = $media;
    }
}

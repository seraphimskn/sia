<?php 

//secure the system
if(!isset($config_vars)){
    die('Acesso negado.');
}

//makes the upload and retrieve the paths to publish on the database
if(isset($_POST['publish']) && count($_FILES) === 1){
    
    $img = (object)$upload->uploadFile($_FILES['media'], '../uploads');
    
    if($img->return === true){
     
        $the_file = $_FILES['media'];
        
        $file = array(
            'media_name'   => $the_file['name'],
            'media_title'  => $the_file['name'],
            'attached_to'  => 0,
            'media_url'    => $img->filepath,
            'uploaded_on'  => date('Y/m/d H:i:s'),
            'uploaded_by'  => $_SESSION['userID'],
            'updated_on'   => date('Y/m/d H:i:s'),
            'updated_by'   => $_SESSION['userID'],
            'last_user_IP' => $_SERVER['REMOTE_ADDR']
        );
        
        if($model->add($config_vars->tablePrefix.'media', $file) == 1){
            header('Location: add/success');
        }else{
            header('Location: add/fail');
        }
        
    }
    
}
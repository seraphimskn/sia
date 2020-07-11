<?php 

if(true !== $config_vars->ajax){
    
    //secure check
    if(!isset($config_vars)){
        die("Acesso negado.");
    };
  
}else{
    
    if($data['new_type'] == 'true'){
        
        if($data['option_name'] == '' || empty($data['option_name']) || is_null($data['option_name'])){
         
            echo 'Tipo de post inv&aacute;lido';
            return false;
            
        }else{
        
            $accents = array(
                '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a',
                '�'=>'e', '�'=>'e', '�'=>'e', '�'=>'e',
                '�'=>'i', '�'=>'i', '�'=>'i', '�'=>'i',
                '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o',
                '�'=>'u', '�'=>'u', '�'=>'u', '�'=>'u',
                '�'=>'c'
            );
            
            $option_value = mb_strtolower($data['option_name']);
            foreach($accents as $key => $value){
                $option_value = str_replace($key, $value, $option_value);
            }
            
            if($data['for'] == 'add_page'){
                $option_type = 'page_type';
            }elseif($data['for'] == 'add_post'){
                $option_type = 'post_type';
            }elseif($data['for'] == 'add_extension'){
                $option_type = 'extension_type';
            }
            
            $params = array(
            
              'option_name'  => $data['option_name'],
              'option_value' => $option_value,
              'option_for'   => 'types',
              'option_type'  => $option_type,
              'created_on'   => date('Y/m/d H:i:s'),
              'created_by'   => $data['userID'],
              'updated_on'   => date('Y/m/d H:i:s'),
              'updated_by'   => $data['userID'],
              'last_user_IP' => $_SERVER['REMOTE_ADDR']
        
            );
            
            if($model->add($config_vars->tablePrefix.'options', $params) == 1){
                $last_id = $model->getConn()->lastInsertId();
                $data['msg'] = $model->select($config_vars->tablePrefix.'options', array('option_type'=>$option_type, 'ID'=>$last_id));
                echo json_encode($data);
            }else{
                return false;
            }
        }
        
    }
    
}
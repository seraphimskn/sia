<?php

/*
 * General Model Class
 */

class Model{

    protected static $conn;
    protected static $dsn;
    protected static $username;
    protected static $password;
    protected $model;
    protected $error;
    protected $statement;
    protected $parameters = array();
    protected $fields     = array();
    
    static function getConn(){
        
        if(is_null(self::$conn)){
            self::$conn = new PDO(self::$dsn, self::$username, self::$password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }
    
    protected function setModel($model){
        
        if(file_exists("models/" . $model . ".model.php")){
            
            $this->model = "models/" . $model . ".model.php";
            
        }else{
            
            $this->model = null;
            $this->error = true;
        }
        
    }

    function getLastId(){
        $id = self::$conn->lastInsertId();
        return $id;
    }
    
    function getModel($model){
        
        self::setModel($model);
        
        return array('error' => $this->error, 'model' => $this->model);
        
    }   
    
    protected function setParameters($params = array()){
        
        foreach($params as $param=>$value){
            
            $the_fields[] = $param; 
            $the_params[':'.$param] = $value;
            
        }
        
        $this->parameters = $the_params;
        $this->fields     = $the_fields;
    }
    
    protected function preadd($table, $params){
        
        self::setParameters($params);
        
        $placeholders = array_keys($this->parameters);
        $this->statement = self::getConn()->prepare('INSERT INTO '.$table.' (`'.implode('`,`',$this->fields).'`) VALUES ('.implode(',', $placeholders).')');
        
    }
    
    function add($table, $params){
        
        self::preadd($table, $params);
        
        try{
        
            $this->statement->execute($this->parameters);
            
            return $this->statement->rowCount();
        
        }catch (PDOException $e){
            
            if(is_dir('system')){
                $file = fopen('system/logs/add_error_log.log', 'a+');
            }else{
                $file = fopen('../../system/logs/add_error_log.log', 'a+');
            }
            
            fwrite($file, '['.date('d/m/Y H:i:s').'] - Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
            
            fclose($file);
            
            return $e->getMessage();
            
        }
        
    }
    
    protected function preselect($table, $columns = null, $params = null, $order_by = null, $order = null){
        
        if(!isset($params) && !isset($order_by) && !isset($order)){
           
            //generic selection
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.'');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.'');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.'');
            }
        
        }elseif(!isset($params) && isset($order_by) && !isset($order)){
        
            //generic selection with ORDER BY statement
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){ 
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' ORDER BY '.$order_by.' DESC');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' ORDER BY '.$order_by.' DESC');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' ORDER BY '.$order_by.' DESC');
            }
        
        }elseif(!isset($params) && !isset($order_by) && isset($order)){
            
            //generic selection with ASC order statement
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){ 
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' '.$order.'');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' '.$order.'');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' '.$order.'');
            }
        
        }elseif(!isset($params) && isset($order_by) && isset($order)){
            
            //generic selection with ORDER BY and ASC statements
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){ 
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' ORDER BY '.$order_by.' '.$order.'');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' ORDER BY '.$order_by.' '.$order.'');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' ORDER BY '.$order_by.' '.$order.'');
            }
        
        }elseif(isset($params) && count($params) == 1 && isset($order_by) && !isset($order)){
            
            //specific selection with ORDER BY statement
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){ 
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' DESC');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' DESC');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' DESC');
            }
            
        }elseif(isset($params) && count($params) == 1 && !isset($order_by) && isset($order)){
            
            //specific selection with ASC order statement
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY id '.$order.'');    
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY id '.$order.'');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY id '.$order.'');
            }
        
        }elseif(isset($params) && count($params) == 1 && isset($order_by) && isset($order)){
            
            //specific selection with ORDER BY and ASC order statements
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' '.$order.'');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' '.$order.'');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' '.$order.'');
            }
                    
        }elseif(isset($params) && count($params) == 1 && !isset($order_by) && !isset($order)){
            
            //specific selection
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY id DESC');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY id DESC');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY id DESC');
            }
        
        }elseif(isset($params) && count($params) > 1 && !isset($order_by) && !isset($order)){
            
            //specific selection with plus than one WHERE statement
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where[] = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $where = implode(' AND ', $where);
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY id DESC');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY id DESC');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY id DESC');
            }
        
        }elseif(isset($params) && count($params) > 1 && isset($order_by) && !isset($order)){
            
            //specific selection with plus than one WHERE statement and ORDER BY statement
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where[] = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $where = implode(' AND ', $where);
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' DESC');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' DESC');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' DESC');
            }
        
        }elseif(isset($params) && count($params) > 1 && !isset($order_by) && isset($order)){
            
            //specific selection with plus than one WHERE statement and ASC order statement
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where[] = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $where = implode(' AND ', $where);
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY id '.$order.'');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY id '.$order.'');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY id '.$order.'');
            }
        
        }elseif(isset($params) && count($params) > 1 && isset($order_by) && isset($order)){
            
            //specific selection with plus than one WHERE statement and ORDER BY and ASC order statements
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where[] = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $where = implode(' AND ', $where);
            if(isset($columns) && count($columns) == 1 && !empty($columns[0])){
                $the_columns = implode('', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' '.$order.'');
            }elseif(isset($columns) && count($columns) > 1){
                $the_columns = implode(', ', $columns);
                $this->statement = self::getConn()->prepare('SELECT '.$the_columns.' FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' '.$order.'');
            }else{
                $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' '.$order.'');
            }
       
        }
        
    }
    
    function select($table, $columns = null, $params = null, $order_by = null, $order = null){
        
        self::preselect($table, $columns, $params, $order_by, $order);
        
        if(!isset($params)){
        
            try{
                
                $this->statement->execute();
                return $this->statement->fetchAll(PDO::FETCH_CLASS);
                
            } catch (PDOException $e) {
                
                if(is_dir('system')){
                    $file = fopen('system/logs/select_error_log.log', 'a+');
                }else{
                    $file = fopen('../../system/logs/select_error_log.log', 'a+');
                }
                
                fwrite($file, '['.date('d/m/Y H:i:s').'] - Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
                
                fclose($file);
                
                return $e->getMessage();
                
            }
        
        }else{
            
            try{
                
                $this->statement->execute($this->parameters);
                return $this->statement->fetchAll(PDO::FETCH_CLASS);
                
            } catch (PDOException $e) {
                
                if(is_dir('system')){
                    $file = fopen('system/logs/select_error_log.log', 'a+');
                }else{
                    $file = fopen('../../system/logs/select_error_log.log', 'a+');
                }
                
                fwrite($file, '['.date('d/m/Y H:i:s').'] - Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
                
                fclose($file);
                
                return $e->getMessage();
                
            }
            
        }
        
    }
    
    protected function preupdate($table, $params, $theID){
        
        self::setParameters($params);
        
        if($this->parameters == 1){
            
            for($index = 0; $index < count($this->parameters); $index++){
                $set = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
       
        }else{
         
            for($index = 0; $index < count($this->parameters); $index++){
                $set[] = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
        
        }
        
        if(is_array($set)){
            $set = implode(',', $set);
        }
        
        $this->statement = self::getConn()->prepare('UPDATE '.$table.' SET '.$set.' WHERE ID = '.$theID.'');
        
    }
    
    function update($table, $params, $theID){
        
        self::preupdate($table, $params, $theID);

        try{
            
            $this->statement->execute($this->parameters);
            return $this->statement->rowCount();
            
        }catch (PDOException $e){
            
            if(is_dir('system')){
                $file = fopen('system/logs/update_error_log.log', 'a+');
            }else{
                $file = fopen('../../system/logs/update_error_log.log', 'a+');
            }
            
            fwrite($file, '['.date('d/m/Y H:i:s').'] - Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
            
            fclose($file);
            
            return $e->getMessage();
            
        }
        
    }
    
    protected function predelete($table, $params){
        
        self::setParameters($params);
        
        if($this->parameters == 1){
            
            for($index = 0; $index < count($this->parameters); $index++){
                $delete = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            
        }else{
            
            for($index = 0; $index < count($this->parameters); $index++){
                $delete[] = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            
        }
        
        if(is_array($delete)){
            $delete = implode(' AND ', $delete);
        }
        
        $this->statement = self::getConn()->prepare('DELETE FROM '.$table.' WHERE '.$delete.'');
        
    }
    
    function delete($table, $params){
        
        self::predelete($table, $params);

        try{
            
            $this->statement->execute($this->parameters);
            return $this->statement->rowCount();
            
        }catch (PDOException $e){
            
            if(is_dir('system')){
                $file = fopen('system/logs/delete_error_log.log', 'a+');
            }else{
                $file = fopen('../../system/logs/delete_error_log.log', 'a+');
            }
                        
            fwrite($file, '['.date('d/m/Y H:i:s').'] - Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
            
            fclose($file);
            
            return $e->getMessage();
        }
        
    }

    protected function preSearchLike($table, $field = array(), $param){

        $this->statement = self::getConn()->prepare('SELECT '. implode(',', $field) .' FROM '. $table .' WHERE '. $param .' LIKE :search');

    }

    function searchLike($table, $field = array(), $param, $like){

        self::preSearchLike($table, $field, $param);

        try{

            $this->statement->execute(array(':search' => '%'.$like.'%'));
            return $this->statement->fetchAll(PDO::FETCH_CLASS);

        }catch(PDOException $e){


            if(is_dir('system')){
                $file = fopen('system/logs/search_error_log.log', 'a+');
            }else{
                $file = fopen('../../system/logs/search_error_log.log', 'a+');
            }
                        
            fwrite($file, '['.date('d/m/Y H:i:s').'] - Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
            
            fclose($file);
            
            return $e->getMessage();

        }

    }

    function setConnParams($dsn, $username, $password){
        self::$dsn = $dsn;
        self::$username = $username;
        self::$password = $password;
    }
  
}
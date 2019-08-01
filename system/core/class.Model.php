<?php

/*
 * General Model Class
 */

class Model{

    private static $conn;
    private static $dsn;
    private static $username;
    private static $password;
    private $model;
    private $error;
    private $statement;
    private $parameters = array();
    private $fields     = array();
    
    static function getConn(){
        
        if(is_null(self::$conn)){
            self::$conn = new PDO(self::$dsn, self::$username, self::$password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }
    
    private function setModel($model){
        
        if(file_exists("models/" . $model . ".model.php")){
            
            $this->model = "models/" . $model . ".model.php";
            
        }else{
            
            $this->model = null;
            $this->error = true;
        }
        
    }
    
    function getModel($model){
        
        self::setModel($model);
        
        return array('error' => $this->error, 'model' => $this->model);
        
    }   
    
    private function setParameters($params = array()){
        
        foreach($params as $param=>$value){
            
            $the_fields[] = $param; 
            $the_params[':'.$param] = $value;
            
        }
        
        $this->parameters = $the_params;
        $this->fields     = $the_fields;
    }
    
    private function preadd($table, $params){
        
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
            
            $file = fopen('../system/logs/add_error_log.txt', 'a+');
            
            fwrite($file, 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
            
            fclose($file);
            
            return $e->getMessage();
            
        }
        
    }
    
    private function preselect($table, $params = null, $order_by = null, $order = null){
        
        if(!isset($params) && !isset($order_by) && !isset($order)){
           
           //generic selection 
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' ORDER BY ID DESC');
        
        }elseif(!isset($params) && isset($order_by) && !isset($order)){
        
            //generic selection with ORDER BY statement
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' ORDER BY '.$order_by.' DESC');
        
        }elseif(!isset($params) && !isset($order_by) && isset($order)){
            
            //generic selection with ASC order statement
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' ORDER BY ID '.$order.'');
        
        }elseif(!isset($params) && isset($order_by) && isset($order)){
            
            //generic selection with ORDER BY and ASC statements
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' ORDER BY '.$order_by.' '.$order.'');
        
        }elseif(isset($params) && count($params) == 1 && isset($order_by) && !isset($order)){
            
            //specific selection with ORDER BY statement
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' DESC');
            
        }elseif(isset($params) && count($params) == 1 && !isset($order_by) && isset($order)){
            
            //specific selection with ASC order statement
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY ID '.$order.'');
        
        }elseif(isset($params) && count($params) == 1 && isset($order_by) && isset($order)){
            
            //specific selection with ORDER BY and ASC order statements
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' '.$order.'');
        
        }elseif(isset($params) && count($params) == 1 && !isset($order_by) && !isset($order)){
            
            //specific selection
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY ID DESC');
        
        }elseif(isset($params) && count($params) > 1 && !isset($order_by) && !isset($order)){
            
            //specific selection with plus than one WHERE statement
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where[] = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $where = implode(' AND ', $where);
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY ID DESC');
        
        }elseif(isset($params) && count($params) > 1 && isset($order_by) && !isset($order)){
            
            //specific selection with plus than one WHERE statement and ORDER BY statement
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where[] = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $where = implode(' AND ', $where);
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' DESC');
        
        }elseif(isset($params) && count($params) > 1 && !isset($order_by) && isset($order)){
            
            //specific selection with plus than one WHERE statement and ASC order statement
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where[] = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $where = implode(' AND ', $where);
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY ID '.$order.'');
        
        }elseif(isset($params) && count($params) > 1 && isset($order_by) && isset($order)){
            
            //specific selection with plus than one WHERE statement and ORDER BY and ASC order statements
            self::setParameters($params);
            for($index = 0; $index < count($this->fields); $index++){
                $where[] = '`'.$this->fields[$index].'` = :'.$this->fields[$index].'';
            }
            $where = implode(' AND ', $where);
            $this->statement = self::getConn()->prepare('SELECT * FROM '.$table.' WHERE '.$where.' ORDER BY '.$order_by.' '.$order.'');
       
        }
        
    }
    
    function select($table, $params = null, $order_by = null, $order = null){
        
        self::preselect($table, $params, $order_by, $order);
        
        if(!isset($params)){
        
            try{
                
                $this->statement->execute();
                return $this->statement->fetchAll(PDO::FETCH_CLASS);
                
            } catch (PDOException $e) {
                
                $file = fopen('../system/logs/select_error_log.txt', 'a+');
                
                fwrite($file, 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
                
                fclose($file);
                
                return $e->getMessage();
                
            }
        
        }else{
            
            try{
                
                $this->statement->execute($this->parameters);
                return $this->statement->fetchAll(PDO::FETCH_CLASS);
                
            } catch (PDOException $e) {
                
                $file = fopen('../system/logs/select_error_log.txt', 'a+');
                
                fwrite($file, 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
                
                fclose($file);
                
                return $e->getMessage();
                
            }
            
        }
        
    }
    
    private function preupdate($table, $params, $theID){
        
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
            
            $file = fopen('../system/logs/update_error_log.txt', 'a+');
            
            fwrite($file, 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
            
            fclose($file);
            
            return $e->getMessage();
            
        }
        
    }
    
    private function predelete($table, $params){
        
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
            
            $file = fopen('../system/logs/delete_error_log.txt', 'a+');
            
            fwrite($file, 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().PHP_EOL);
            
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
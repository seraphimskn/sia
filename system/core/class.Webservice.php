<?php 

class WebService extends Model{

    
    public function __construct($dsn, $user, $pass)
    {
        parent::$dsn  = $dsn;
        parent::$username = $user;
        parent::$password = $pass;
            
    }

    public function checkUser($user, $pass){

        return parent::select('usuarios', array('id'), array('cpf_cnpj' => $user, 'senha' => $pass, 'ativo' => '1'));

    }

    public function getUserInfo($user_id){

        $result = parent::select('usuarios', null, array('id' => $user_id))[0];

        return $result;

    }

    public function insertAuthClient($params = array()){

        $stmt = 'INSERT INTO oauth_clients (`client_id`, `client_secret`, `redirect_uri`, `user_id`) VALUES (?, ?, ?, ?)';
        $query = parent::getConn()->prepare($stmt);

        try{

            $exec = $query->execute($params);
            return $exec;

        }catch(PDOException $e){

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

    public function getUserStats($params){

        $stmt = 'SELECT `u`.`id` as `id`, 
                        `u`.`nome` as `usuario`, 
                        `u`.`cpf_cnpj` as `login`,
                        `u`.`categoria` as `categoria`,
                        `n`.`id` as `nivel_id`,
                        `n`.`nome` as `nivel`,
                        `oa`.`access_token` as `token`,
                        `oa`.`user_id` as `oa_id`
                        FROM usuarios as u 
                        INNER JOIN 
                        oauth_access_tokens as oa ON u.id = oa.user_id 
                        INNER JOIN 
                        niveis as n ON n.id = u.id_nivel 
                        WHERE oa.access_token = ?';
        $query = parent::getConn()->prepare($stmt);

        try{
            $query->execute(array($params));
            $sth = $query->fetch(PDO::FETCH_ASSOC);
            return $sth;

        }catch(PDOException $e){

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

    public function getUserId($token){
       
       return $token->user_id;

    }

    public function getUserInfos($token){

        $userId = $this->getUserId($token);

        $return = parent::select('userInfosApp', null, array('id' => $userId));

        return $return;

    }

    public function getUserBuys($token){

        $userId = $this->getUserId($token);

        $return = parent::select('userBuysApp', null, array('id' => $userId));

        return $return;

    }

    public function getSellers(){

        $nivel = (object)parent::select('niveis', array('id'), array('nome' => 'Parceiro'))[0];

        return parent::select('usuarios', array('nome', 'endereco', 'cidade', 'estado', 'categoria'), array('id_nivel'=>$nivel->id, 'ativo' => 1));

    }

    public function getSellersByCategory($categoria){

        $nivel = (object)parent::select('niveis', array('id'), array('nome' => 'Parceiro'))[0];

        return parent::select('usuarios', array('nome', 'endereco', 'cidade', 'estado', 'categoria'), array('id_nivel'=>$nivel->id, 'categoria' => strtolower($categoria), 'ativo' => 1));

    }

    public function getProducts(){

        return parent::select('produtos', null, array('ativo' => 1), 'pontos', 'ASC'); 

    }

    public function getAvaliations($token){

        $userId = $this->getUserId($token);

        $return = parent::select('userAvalApp', null, array('id' => $userId));

        return $return;

    }

}
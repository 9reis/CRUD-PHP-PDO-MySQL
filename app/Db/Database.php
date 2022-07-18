<?php 

namespace App\Db;

use PDO;
use PDOException;

class Database{

    const HOST= "localhost";
    const NAME = "wdev_vagas";
    const USER = "root";
    const PASS = "";
    
    private $table;
     
    private $connection;

    public function __contruct($table = null){
        $this->table = $table;
        $this-> setConnection();
    }

    private function setConnection(){
        try{
            $this->connection = new \PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    // Metodo responsavel por executar queries dentro do banco de dados
    public function execute($query,$params = []){   
        try{
            $statement = $this->connection->prepare($query);
            $statement -> execute($params);
            return $statement;
        }catch(\PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    // Metodo responsavel por inserir dados no banco
    public function insert($values){
        //dados da query
        $fields =  array_keys($values);
        $binds = array_pad([],count($fields),'?');

        //monta a query
        $query = 'INSERT INTO'. $this->table. '('.implode(',',$fields).') VALUES('.implode(',',$binds).')';
        
        //Executa o insert
        $this->execute($query,array_values($values));

        //Retorna o id inserido 
        return $this->connection->lastInsertId();
    }

    //Metodo responsavel por executar um consulta no banco 
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //dados da query
        $where = strlen($where) ? 'WHERE ' .$where : '';
        $order = strlen($order) ? 'ORDER BY' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' .$limit  : '';

        //monta aquery
        $query = 'SELECT '.$fields.' FROM ' .$this->table. ' ' .$where. ' ' .$order. ' ' .$limit; 
        
        //executa a query
        return $this->execute($query);
    } 

   

    //metodo responsavel por executar atuazações no banco de dados
    public function update($where,$values){

         //Dados da query
        $fields = array_keys($values);

        //Monta a query
        $query = 'UPDATE ' .$this->table. 'SET' .implode('=?,',$fields). '=? WHERE' .$where;
        exit;

        //Executa a query
        $this -> execute($query, array_values($values));

        //Retorna sucesso
        return true;
    }

    //Metodo responsável por excluir dados do banco
    public function delete($where){

        //Monta a query
        $query = 'DELETE FROM ' .$this->table. ' WHERE ' .$where;

        //Executa a Query 
        $this->execute($query);

        //retorna sucesso
        return true;
    }
}


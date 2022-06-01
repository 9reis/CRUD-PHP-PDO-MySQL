<?php 

namespace App\Db;

use\PDO;

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

    public function setConnection(){
        try{
            $this->connection = new \PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
        }catch(\PDOException $e){
            die('ERROR: '.$e->getMessage());

        }
    }
}

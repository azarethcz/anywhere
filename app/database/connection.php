<?php

namespace CMS\Database;

/*
 * Database connection class
 */
class Connection {
    
    /*
     * 
     */
    private $pdo;
    
    public function __construct() {
        $this->pdo = $this->connect();
    }
    
    /*
     * 
     */
    public function connect() {
        try {
            $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/cms/app/config/config.ini');
            $this->pdo = new \PDO($config['dbtype'].":host=".$config['dbhost'].";dbname=".$config['dbname'], $config['dbuser'], $config['dbpass']);
            $this->pdo->exec('SET NAMES utf8');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // echo "Připojení k databázi proběhlo úspěšně";
        } catch (\Exception $e) {
            echo 'Připojení k databazi se nezdařilo: '.$e->getMessage();
        }
        return $this->pdo;
    }
    
    public function disconnect() {
        $this->pdo = null;
    }
    
    public function run($sql) {
        return $this->pdo->query($sql);
    }
    
    public function query($sql,$params = []) {        
        $result = $this->pdo->prepare($sql);
        return $result->execute($params);
    }
    
    public function fetch($sql,$params = []) {
        $result = $this->pdo->prepare($sql);
        $result->execute($params);
        return $result->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function fetchAll($sql,$params = []) {
        $result = $this->pdo->prepare($sql);
        $result->execute($params);
        return $result->fetchAll();
    }
    
    public function rowCount($sql,$params = []){
        $result = $this->pdo->prepare($sql);
        $result->execute($params);
        return $result->rowCount();
    }
}

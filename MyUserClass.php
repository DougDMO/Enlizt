<?php

class MyUserClass {
    
    private $dbconn;
    private $results;
    
    public function __construct() {
        
        try {
        $this->dbconn = DatabaseConnection("localhost","user","senha");
        }catch{
            echo "Erro: " . $this->dbconn->connect_error;
        }
    }

    public function getUserList() {

        $this->results = $this->dbconn->query('select name from user');
        sort($this->results);
    }
    
    public function __toString() {
    
        return json_encode($this->results);
    }

}

/* CLASSE ORIGINAL
class MyUserClass {

    public function getUserList() {
        $dbconn = new DatabaseConnection('localhost','user','password');
        $results = $dbconn->query('select name from user');
        sort($results);
        return $results;
    }

}*/

<?php

class MyUserClass {
    
    private $dbconn;
    private $results;
    
    public function __construct() {
        $this->dbconn = DatabaseConnection("localhost","user","senha");
        if($this->dbconn->connect_error){
            echo "Erro: " . $this->dbconn->connect_error;
            exit;
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

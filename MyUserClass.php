<?php

class MyUserClass {

    public function getUserList($servidor, $usuario, $pass) {

        $dbconn = new DatabaseConnection($servidor, $usuario, $pass);

        if($dbconn->connect_error){
            echo "Erro: " . $dbconn->connect_error;
            exit;
        }

        $results = array();
        $data = $dbconn->query('select name from user');

        while($row = $data->fetch_array()){
            array_push($results,$row);
        }

        sort($results);
        return json_encode($results);

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
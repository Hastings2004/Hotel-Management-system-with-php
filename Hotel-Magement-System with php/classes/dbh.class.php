<?php

class Dbh{
    
public function connect(){
    try{
        $username = "root";
        $password = "";
        $dbh = new PDO('mysql:host=localhost;dbname=hms_db', $username, $password);
        return $dbh;
        
    } catch(PDOException $e){
        echo 'error'.$e->getMessage() .'</br>';
        die();
    }
}
}
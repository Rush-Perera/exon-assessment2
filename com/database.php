<?php

class Database{

    public static $connection;

    public static function setUpConnection(){
        if(!isset(Database::$connection)){
            try {
                Database::$connection = new mysqli("localhost","root","Sudeera$21","platinum_db","3307");
            } catch (\Throwable $th) {
                echo "Error: " . $th->getMessage();
            }
        }
    }

    public static function push($q){
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function pull($q){
        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }

}

?>
<?php

class Db {

    protected static $con = null;

    public static function connect(){

        if( Db::$con != null ){
            return;
        }

        try{
            Db::$con = new PDO('mysql:host='. DB_HOST .';dbname='. DB_DBNAME .';', DB_USERNAME , DB_PASSWORD);
            Db::$con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function runQuery($query,$values = []){
        if( Db::$con != null ){
            $stmt = Db::$con->prepare($query);
            $stmt->execute($values);
            return $stmt;
        }else {
            return null;
        }
    }


}
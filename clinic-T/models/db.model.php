<?php

class DB {

    protected static $con = null;

    public static function connect(){

        if( DB::$con != null ){
            return;
        }

        try{
            DB::$con = new PDO('mysql:host='. DB_HOST .';dbname='. DB_DBNAME .';', DB_USERNAME , DB_PASSWORD);
            DB::$con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function runQuery($query,$values = []){
        if( DB::$con != null ){
            $stmt = DB::$con->prepare($query);
            $stmt->execute($values);
            return $stmt;
        }else {
            return null;
        }
    }


}
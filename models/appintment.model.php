<?php

class Appointment extends DB {

    function __construct($rowID = null){


        if($rowID != null){
            
            $stmt = DB::runQuery('SELECT * FROM `appointments`  WHERE id = :id', [ ':id' => $rowID ] );
            if($stmt){
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                foreach($data as $key => $value){
                    $this->{$key} = $value;
                }
            }else {
                throw new Exception("Item not found");
            }

        }else {
            return;
        }

    }

    public function getById($id){
        return new Appointment($id);
    }

    public static function getByPatId($id){
        $stmt = DB::runQuery('SELECT * FROM `appointments`  WHERE pat_id = :id ORDER BY `date` DESC', [ ':id' => $id ] );
        if($stmt){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else {
            throw new Exception("Item not found");
        }
    }
    
    public static function getByDrId($id){
        $stmt = DB::runQuery('SELECT * FROM `appointments`  WHERE dr_id = :id ORDER BY `date` DESC', [ ':id' => $id ] );
        if($stmt){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else {
            throw new Exception("Item not found");
        }
    }

    public static function addToDb($date,$clinic_id,$dr_id,$pat_id){
        $stmt = Db::runQuery('INSERT INTO `appointments` (pat_id,dr_id,clinic_id,date) values (:pid,:did,:cid,:dat)'
                                , [ ':pid'=> $pat_id , ':did'=>$dr_id , ':cid'=>$clinic_id , ':dat'=>$date ] );
        return DB::$con->lastInsertId();
    }

    public static function removeById($id){
        $stmt = Db::runQuery('DELETE FROM `appointments` WHERE id = :id'
                                , [ ':id'=> $id ] );
        if($stmt){
            return true;
        } else {
            return false;
        }
    }

}
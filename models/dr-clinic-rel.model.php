<?php

class DrToClinics extends DB {

    public static function getClinicsOfDrs($drid){
        $stmt = DB::runQuery('SELECT * FROM `drs_clinics_rel`  WHERE dr_id = :drid', [ ':drid' => $drid ] );
        if($stmt){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else {
            throw new Exception("Item not found");
        }
    }

    public static function createRel($dr_id,$clinic_id){
        $stmt = Db::runQuery('INSERT INTO `drs_clinics_rel` (`dr_id`,`clinic_id`) values (:dr_id,:clinic_id)'
                                , [ ':dr_id'=> $dr_id , ':clinic_id'=>$clinic_id] );
        return DB::$con->lastInsertId();
    }

    public static function getClinicById($clinicId){
        $stmt = DB::runQuery('SELECT * FROM `clinics`  WHERE id = :id', [ ':id' => $clinicId ] );
        if($stmt){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }else {
            throw new Exception("Item not found");
        }
    }

}
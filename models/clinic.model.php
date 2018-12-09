<?php

class Clinic extends DB {

    function __construct($rowID = null){


        if($rowID != null){
            
            $stmt = DB::runQuery('SELECT * FROM `clinics`  WHERE id = :id', [ ':id' => $rowID ] );
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
        return new Clinic($id);
    }

    public static function getAll(){
        $stmt = DB::runQuery('SELECT * FROM `clinics` ORDER BY `id` DESC', [] );
        if($stmt){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else {
            throw new Exception("Item not found");
        }
    }

    public static function addToDb($name,$address,$phone,$description){
        $stmt = Db::runQuery('INSERT INTO `clinics` (`name`,`description`,`phone`,`address`) values (:name,:desc,:phone,:address)'
                                , [ ':name'=> $name , ':desc'=>$description , ':phone'=>$phone , ':address'=>$address ] );
        return DB::$con->lastInsertId();
    }

    public static function removeById($id){
        $stmt = Db::runQuery('DELETE FROM `clinics` WHERE id = :id'
                                , [ ':id'=> $id ] );
        if($stmt){
            return true;
        } else {
            return false;
        }
    }


}